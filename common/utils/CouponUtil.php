<?php

namespace common\utils;

use yii\helpers\Json;
use yii\helpers\ArrayHelper;
use common\models\VoucherCode;
use common\utils\UShort;
use common\components\Cart;
use common\utils\UDate;

/**
 * Class to handle coupon operations
 * 
 * @author HAOLV
 */
class CouponUtil {

    /**
     * Kiểm tra code KM từ người dùng
     * @param type $code 
     * @param type $cart
     * @return Cart Object | string
     */
    public static function isValid($code, $cart) {
        try {
            $today = UDate::getString(time(), 'Ymd');
            $voucher = VoucherCode::find()
                    ->alias('vc')
                    ->innerJoin('tbl_voucher v', 'v.id = vc.vid')

                    // Kiểm tra validate serial KM
                    ->where('FROM_UNIXTIME(v.from_date, "%Y%m%d") <= :today AND FROM_UNIXTIME(v.to_date, "%Y%m%d") >= :today AND vc.code=:code AND v.status = 1 AND vc.status=1 AND used_at=0', [
                        ':today' => $today,
                        ':code' => $code
                    ])

                    // Kiểm tra code KM chung (v.code)
                    ->orWhere('FROM_UNIXTIME(v.from_date, "%Y%m%d") <= :today AND FROM_UNIXTIME(v.to_date, "%Y%m%d") >= :today AND v.code=:code AND v.status = 1 AND vc.status=1 AND used_at=0', [
                        ':today' => $today,
                        ':code' => $code
                    ])
                    ->orderBy('rand()')

                    // dữ liệu bind vào Cart Object (Coupon)
                    ->select([
                        'vc.code as code',
                        'v.value discount',
                        'v.min_amount',
                        'v.combine_promotion',
                        'v.name',
                        'v.brand_scope',
                        'v.type_scope'
                    ])
                    ->asArray()
                    ->one();

            if ($voucher) {

                // Nếu giá trị coupon > giá trị giỏ hàng
                if ($voucher['discount'] > $cart->getCost()) {
                    $voucher['discount'] = $cart->getCost();
                }

                // Kiểm tra điều kiện (giá trị bill) có áp dụng được coup kg?
                if ($voucher['min_amount'] > $cart->getCost()) {
                    return 'Mã giảm giá áp dụng cho đơn hàng >= ' . UNumber::f($voucher['min_amount']) . ' VNĐ';
                }

                // Kiểm tra coupon được áp dụng chung với KM khác
                if ($cart->getAllDiscount() && $voucher['combine_promotion'] == 0) {
                    return 'Mã giảm giá không áp dụng cho đơn hàng khuyến mãi';
                }

                // Nếu giá trị KM 1-99 thì quy về giá trị %
                if ($voucher['discount'] > 0 && $voucher['discount'] < 100) {
                    $total = ($cart->getCouponItem()) ? $cart->getCost() - $cart->getCouponItem()->getDiscount() : $cart->getCost();
                    $voucher['discount'] = UNumber::round($total * ($voucher['discount'] / 100));
                }

                // Kiểm tra các coupon áp dụng cho các thương hiêu
                $brands = Json::decode($voucher['brand_scope']);
                $brands = ($brands) ? $brands : [];
                foreach ($cart->getPositions() as $node) {

                    if (!$node->isItem()) {
                        continue;
                    }

                    $in = in_array($node->bid, $brands);
                    if (($voucher['type_scope'] === 'IN' && !$in) || ($voucher['type_scope'] === 'NOTIN' && $in)) {
                        return 'Mã giảm giá không áp dụng cho các sản phẩm trong giỏ hàng';
                    }
                }

//            UArray::dump($voucher);exit;
                // Coupon thỏa điều kiện
                $voucher['type'] = 'coupon';

                return Cart::checkItem($voucher, Cart::COUPON);
            }
        } catch (\Exception $ex) {
            return $ex->getMessage();
        }


        return 'Mã giảm giá không hợp lệ';
    }

    /**
     * Gen code promotion
     * @param type $id Voucher ID
     * @param type $num số lượng items
     * @param type $order Object Order
     * @return array serial 
     */
    public static function getCoupon($id, $num, $order) {

        $trans = UShort::db()->beginTransaction();
        try {

            // truy vấn code giảm giá
            $vouchers = VoucherCode::find()->joinWith(['voucher'])
                    ->andWhere([
                        'tbl_voucher.id' => $id,
                        'tbl_voucher_code.status' => 0,
                        'used_at' => 0
                    ])
                    ->orderBy('rand()')
                    ->limit($num)
                    ->all();

            // Thực hiện active code KM và trả kết quả
            if ($vouchers) {
                $serial = [];
                foreach ($vouchers as $voucher) {
                    if ($voucher->status != 1) {
                        $voucher->status = 1;
                        $voucher->note = $order->fullname . ' - ' . $order->phone;
                        $voucher->gen_id = $order->id;
                        $voucher->save();
                    }
                    $serial[] = $voucher->code;
                }
                $trans->commit();
                return $serial;
            }
        } catch (\yii\db\Exception $ex) {
            $trans->rollBack();
            UShort::setFlash($ex->getMessage(), 'error');
        } catch (\Exception $ex) {
            $trans->rollBack();
            UShort::setFlash($ex->getMessage(), 'error');
        }

        return null;
    }

    /**
     * 
     * @param type $order_id Mã đơn hàng
     * @return string Thông tin code km: hạn sữ dụng, brand áp dụng...
     */
    public static function getInfo($order_id) {

        $voucher = VoucherCode::find()
                ->alias('vc')
                ->innerJoin('tbl_voucher v', 'v.id = vc.vid')
                ->where(['vc.gen_id' => $order_id, 'vc.status' => 1, 'used_at' => 0, 'v.status' => 1])
                ->select([
                    'v.value',
                    'v.min_amount',
                    'v.combine_promotion',
                    'v.name',
                    'v.brand_scope',
                    'v.type_scope',
                    'v.from_date',
                    'v.to_date',
                    'vc.code',
                    'count(vc.code) as count',
                    'group_concat(vc.code separator " - ") as codes'
                ])
                ->groupBy('vc.gen_id')
                ->asArray()
                ->one();

//        UArray::dump($voucher);
        $msg = '';

        if ($voucher) {
            $msg .= '<div class="text-left">';
            $msg .= '<h5>';
            $msg .= "Bạn nhận được " . ArrayHelper::getValue($voucher, 'count') . " Code KM: <b>" . ArrayHelper::getValue($voucher, 'codes') . "</b>";
            $msg .= '</h5>';

            $scope = '';
            $brand = '';
            $brands = Json::decode(ArrayHelper::getValue($voucher, 'brand_scope'));

            if ($brands) {
                $scope = (ArrayHelper::getValue($voucher, 'type_scope') === 'IN') ? 'Nhãn hiệu áp dụng : ' : 'Nhãn hiệu loại trừ: ';
                $brand = ArrayHelper::map((new \yii\db\Query())->from('tbl_product_brand')
                                        ->where(['id' => $brands])
                                        ->select('id, name')
                                        ->all(), 'id', 'name');
                if ($brand) {
                    $brand = implode(' - ', $brand);
                }
            } else {
                $scope = (ArrayHelper::getValue($voucher, 'type_scope') === 'IN') ? '' : 'Áp dụng cho tất cả nhãn hiệu.';
            }
            $min_value = ArrayHelper::getValue($voucher, 'min_amount', 0);
            $combine = (ArrayHelper::getValue($voucher, 'combine_promotion') == 1) ? 'Được áp dụng chung với các CTKM khác.' : 'Không áp dụng đồng thời với các KM khác.';


            $msg .= '<br/><div><b>ĐIỀU KIỆN ÁP DỤNG:</b></div>';
            $msg .= '<ul>';
            $msg .= '<li>Code trị giá: <b>' . UNumber::f(ArrayHelper::getValue($voucher, 'value')) . ' đ.</b></li>';
            $msg .= '<li>Ngày hết hạn: <b>' . UDate::getString(ArrayHelper::getValue($voucher, 'to_date')) . '.</b></li>';
            $msg .= '<li>' . $scope . ' <b>' . $brand . '</b>.</li>';
            if ($min_value > 0) {
                $msg .= '<li>Áp dụng KM cho đơn hàng tối thiểu: <b>' . UNumber::f($min_value) . ' </b>đ.</li>';
            }
            $msg .= '<li>' . $combine . '</li>';

            $msg .= '</ul>';
            
            $msg .= '<br/><div><b><u>Lưu ý:</u></b></div>';
            $msg .= '<ul>';
            //$msg .= '<li>Code được áp dụng cho đơn hàng tiếp theo.</li>';
            $msg .= '<li>Nhập code tại bước Xác Nhận Thanh Toán để được khuyến mãi.</li>';
            $msg .= '<li>Code chỉ có hiệu thực khi đơn hàng hiện tại được xác nhận thành công.</li>';
            $msg .= '</ul>';
            
            $msg .= '</div>';
            
            

            return $msg;
        }
    }

    CONST MIN_LENGTH = 8;

    /**
     * MASK FORMAT [XXX-XXX]
     * 'X' this is random symbols
     * '-' this is separator
     *
     * @param array $options
     * @return string
     * @throws Exception
     */
    static public function generate($options = []) {
        $length = (isset($options['length']) ? filter_var($options['length'], FILTER_VALIDATE_INT, ['options' => ['default' => self::MIN_LENGTH, 'min_range' => 1]]) : self::MIN_LENGTH );
        $prefix = (isset($options['prefix']) ? self::cleanString(filter_var($options['prefix'], FILTER_SANITIZE_STRING)) : '' );
        $suffix = (isset($options['suffix']) ? self::cleanString(filter_var($options['suffix'], FILTER_SANITIZE_STRING)) : '' );
        $useLetters = (isset($options['letters']) ? filter_var($options['letters'], FILTER_VALIDATE_BOOLEAN) : true );
        $useNumbers = (isset($options['numbers']) ? filter_var($options['numbers'], FILTER_VALIDATE_BOOLEAN) : false );
        $useSymbols = (isset($options['symbols']) ? filter_var($options['symbols'], FILTER_VALIDATE_BOOLEAN) : false );
        $useMixedCase = (isset($options['mixed_case']) ? filter_var($options['mixed_case'], FILTER_VALIDATE_BOOLEAN) : false );
        $mask = (isset($options['mask']) ? filter_var($options['mask'], FILTER_SANITIZE_STRING) : false );
        $uppercase = ['Q', 'W', 'E', 'R', 'T', 'Y', 'U', 'I', 'O', 'P', 'A', 'S', 'D', 'F', 'G', 'H', 'J', 'K', 'L', 'Z', 'X', 'C', 'V', 'B', 'N', 'M'];
        $lowercase = ['q', 'w', 'e', 'r', 't', 'y', 'u', 'i', 'o', 'p', 'a', 's', 'd', 'f', 'g', 'h', 'j', 'k', 'l', 'z', 'x', 'c', 'v', 'b', 'n', 'm'];
        $numbers = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
        $symbols = ['`', '~', '!', '@', '#', '$', '%', '^', '&', '*', '(', ')', '-', '_', '=', '+', '\\', '|', '/', '[', ']', '{', '}', '"', "'", ';', ':', '<', '>', ',', '.', '?'];
        $characters = [];
        $coupon = '';
        if ($useLetters) {
            if ($useMixedCase) {
                $characters = array_merge($characters, $lowercase, $uppercase);
            } else {
                $characters = array_merge($characters, $uppercase);
            }
        }
        if ($useNumbers) {
            $characters = array_merge($characters, $numbers);
        }
        if ($useSymbols) {
            $characters = array_merge($characters, $symbols);
        }
        if ($mask) {
            for ($i = 0; $i < strlen($mask); $i++) {
                if ($mask[$i] === 'X') {
                    $coupon .= $characters[mt_rand(0, count($characters) - 1)];
                } else {
                    $coupon .= $mask[$i];
                }
            }
        } else {
            for ($i = 0; $i < $length; $i++) {
                $coupon .= $characters[mt_rand(0, count($characters) - 1)];
            }
        }
        return $prefix . $coupon . $suffix;
    }

    /**
     * @param int $maxNumberOfCoupons
     * @param array $options
     * @return array
     */
    static public function generate_coupons($maxNumberOfCoupons = 1, $options = []) {
        $coupons = [];
        for ($i = 0; $i < $maxNumberOfCoupons; $i++) {
            $temp = self::generate($options);
            $coupons[] = $temp;
        }
        return $coupons;
    }

    /**
     * @param int $maxNumberOfCoupons
     * @param $filename
     * @param array $options
     */
    static public function generate_coupons_to_xls($maxNumberOfCoupons = 1, $filename, $options = []) {
        $filename = (empty(trim($filename)) ? 'coupons' : trim($filename));
        header('Content-Type: application/vnd.ms-excel');
        echo 'Coupon Codes' . "\t\n";
        for ($i = 0; $i < $maxNumberOfCoupons; $i++) {
            $temp = self::generate($options);
            echo $temp . "\t\n";
        }
        header('Content-disposition: attachment; filename=' . $filename . '.xls');
    }

    /**
     * Strip all characters but letters and numbers
     * @param $string
     * @param array $options
     * @return string
     * @throws Exception
     */
    static private function cleanString($string, $options = []) {
        $toUpper = (isset($options['uppercase']) ? filter_var($options['uppercase'], FILTER_VALIDATE_BOOLEAN) : false);
        $toLower = (isset($options['lowercase']) ? filter_var($options['lowercase'], FILTER_VALIDATE_BOOLEAN) : false);
        $striped = preg_replace('/[^a-zA-Z0-9]/', '', $string);
        // make uppercase
        if ($toLower && $toUpper) {
            throw new Exception('You cannot set both options (uppercase|lowercase) to "true"!');
        } else if ($toLower) {
            return strtolower($striped);
        } else if ($toUpper) {
            return strtoupper($striped);
        } else {
            return $striped;
        }
    }

}
