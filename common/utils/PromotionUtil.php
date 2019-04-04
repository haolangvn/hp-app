<?php

namespace common\utils;

use Yii;
use yii\helpers\ArrayHelper;
use yii\caching\DbDependency;
use common\utils\UShort;
use common\models\Promotion;
use common\utils\UDate;
use common\components\Cart;
use common\models\PromotionFreeitem;
use common\models\PromotionSellingitem as PromotionSelling;
use common\models\PromotionTotalselling as PromotionTotal;

/**
 * Description of Promotion
 *
 * @author HAO
 */
class PromotionUtil {

    public static $promotion = false;
    public static $loyalty = false;

    /**
     * Kiểm tra có km hay kg
     * @param type $id
     * @return boolean
     */
    public static function hasPromotion() {
        if (self::$promotion === false) {
            self::$promotion = self::_get();
        }
        return self::$promotion ? true : false;
    }

    /**
     * Trả về CTKM hiện hành
     * @param type $id
     * @return Object
     */
    public static function getPromotion() {
        if (self::$promotion === false) {
            self::$promotion = self::_get();
        }
        return self::$promotion;
    }

    private static function _get() {
        $id = '';
        $today = UDate::getString(time(), 'ymdHi');
        $query = Promotion::find();

        // Nêu DEBUG kiểm tra Cookie ưu tiên Preview Promotion
        if (YII_DEBUG) {
            $cookies = UShort::request()->cookies;
            $id = $cookies->getValue('PREVIEW_PROMOTION');
            if ($id) {
                Yii::info('PREVIEW PROMOTION ' . $id, 'PROMOTION');
                $query->where(['id' => $id]);
            }
        }

        if (!YII_DEBUG) {
            $query->where(['status' => 1])
                    ->andWhere(['>=', 'priority', 0])
                    ->andWhere(['<=', 'from_date', $today])
                    ->andWhere(['>=', 'to_date', $today]);
        }

        $model = $query->orderBy('priority desc, id asc')
                ->asArray()
                ->one();

//        Yii::info(ArrayHelper::getValue($model, 'id', 0), 'PROMOTION');
//        Yii::info(ArrayHelper::getValue($model, 'updated_at', 0), 'PROMOTION');

        $promotion = UShort::cache()->getOrSet([
            'PROMOTION',
            'id' => $id,
            'update' => ArrayHelper::getValue($model, 'updated_at', 0)
                ], function() use ($id, $today) {
            $promotion = null;

            // kiểm tra điều kiện promotion
            $promote = Promotion::find()->select('id, name, short_content, note, to_date');
            if ($id > 0) {
                $promote = $promote->where(['id' => $id])->asArray()->one();
            } else {

                $promote = $promote->where(['status' => 1])
                        ->andWhere(['<=', 'from_date', $today])
                        ->andWhere(['>=', 'to_date', $today])
                        ->andWhere(['>=', 'priority', 0])
                        ->orderBy('priority desc, id asc')
                        ->asArray()
                        ->one();
            }

            // có promtion
            if ($promote) {

                // promotion ID
                $promotion['id'] = $promote;

                // All Sellingitem table
                $query = PromotionSelling::find()->alias('selling')
                        ->where([
                            'promotion_id' => ArrayHelper::getValue($promote, 'id')
                        ])
                        ->select([
                            'selling.id combo_id',
                            'promotion_type',
                            'selling_type',
                            'selling_barcode barcode',
                            'selling_id',
                            'selling.price',
                            'selling.percent',
                            'selling.discount'
                        ])
                        ->asArray();

                $items = ArrayHelper::index($query->all(), 'selling_id', [function ($element) {
                                return $element['promotion_type'];
                            }, 'selling_type']);
                $promotion = ArrayHelper::merge($promotion, $items);


                // All free_item table
                $query = PromotionFreeitem::find()->alias('freeitem')
                        ->innerJoin('tbl_product_price price', 'price.id=freeitem.free_id')
                        ->innerJoin('tbl_product p', 'p.id=price.pid')
                        ->leftJoin('promotion_sellingitem selling', 'selling.id=freeitem.selling_id')
                        ->where([
                            'freeitem.status' => 1,
                            'freeitem.promotion_id' => ArrayHelper::getValue($promote, 'id'),
                            'freeitem.type' => PromotionFreeitem::FREE_LINE
                        ])
                        ->select([
                    'freeitem.id',
                    'freeitem.selling_id',
                    'selling.selling_id as price_id',
                    'freeitem.selling_quantity',
                    'freeitem.group_id',
                    'freeitem.block_name',
                    'freeitem.block2_name',
                    'freeitem.block2_quantity',
                    'freeitem.free_id',
                    'freeitem.free_barcode',
                    'freeitem.name',
                    'freeitem.note',
                    'freeitem.price',
                    'freeitem.percent',
                    'freeitem.discount',
                    'freeitem.quantity',
                    'freeitem.status',
                    'selling.promotion_type',
                    'if(LENGTH(price.image) > 0, price.image, p.thumb) as image',
                ]);

//                $items = ArrayHelper::index($query->asArray()->all(), null, 'selling_id');
                $promotion['FREE_TABLE'] = $query->asArray()->all();

                return $promotion;

//                $b = PromotionSellingitem::find()->alias('d')
//                        ->leftJoin('tbl_product_price price', 'price.id = d.selling_id')
//                        ->where(['promotion_id' => ArrayHelper::getValue($promote, 'id'), 'd.status' => 1])
//                        ->select('id, promotion_type, selling_type, selling_barcode code, selling_id, price, percent, discount')
//                        ->asArray()
//                        ->all();
//                $productCount = PromotionProduct::find()
//                                ->where(['promotion_id' => ArrayHelper::getValue($promote, 'id'), 'status' => 1])
//                                ->andWhere(['>', 'pid', 0])->count();
//                $brands = [];
//                $products = [];
//                if ($b) {
//                    foreach ($b as $node) {
//                        if ($node) {
//                            $bid = intval($node['bid']);
//                            $pid = intval($node['pid']);
//                            $discount = intval($node['discount']);
//                            if ($pid > 0 && $discount > 0) {
//                                $products[$pid][$node['code']] = [
//                                    'price' => $node['price'],
//                                    'percent' => $node['percent'],
//                                    'discount' => $node['discount']
//                                ];
//                            } else if ($bid > 0) {
//                                $brands[$bid] = $node['percent'];
//                            }
//                        }
//                    }
//                }
//                $details = PromotionDetail::find()
//                        ->where(['pid' => ArrayHelper::getValue($promote, 'id')])
//                        ->select('from_amount as from, to_amount as to, discount, voucher_code, voucher_num, voucher_use, combine, note')
//                        ->asArray()
//                        ->all();
//                $query = (new \yii\db\Query())
//                                ->from('tbl_promotion_product_freeitem km')
//                                ->innerJoin('tbl_product_price price', 'price.code=km.code')
//                                ->innerJoin('tbl_product p', 'km.pid=p.id')
//                                ->innerJoin('tbl_product_brand b', 'b.id=price.bid')
//                                ->where([
//                                    'km.promotion_id' => ArrayHelper::getValue($promote, 'id', 0),
//                                    'km.status' => 1
//                                ])->select([
//                    'price.id',
//                    'price.pid',
//                    'price.bid as b_id',
//                    'p.alias as alias',
//                    'p.name_seo as name_seo',
//                    'b.alias as b_alias',
//                    'b.name as b_name',
//                    'price.code',
//                    'price.name',
//                    'km.pp_code',
//                    'km.group_id',
//                    'km.price',
//                    'km.percent',
//                    'km.discount',
//                    'km.note',
//                    'if(LENGTH(price.image) > 0, price.image, p.thumb) as thumb'
//                ]);
//
//                $query2 = clone $query;
//                $free_item_selling = ArrayHelper::index($query->andWhere(['km.group_id' => 0])->all(), null, 'pp_code');
//                $query2->andWhere(['>', 'km.group_id', 0]);
//                $query2->andWhere(['km.pp_code' => 0]);
//                $query2->andWhere(['km.status' => 1]);
////                echo $query2->createCommand()->getRawSql();
//                $free_item_group = ArrayHelper::index($query2->all(), null, 'group_id');
//
//                $promotion = [
//                    'id' => $promote,
//                    'brand' => $brands,
//                    'product' => $products,
//                    'free_item_selling' => $free_item_selling,
//                    'free_item_group' => $free_item_group,
//                    'productCount' => $productCount,
////                    'detail' => $details
//                ];
            }
        }, UShort::getParams('cache_expire'));

        if (YII_DEBUG) {
            Yii::info($promotion, 'PROMOTION');
        }
        return $promotion;
    }

    /**
     * Kiểm tra Loyalty
     * @param type $id
     * @return boolean
     */
    public static function hasLoyalty() {
        if (self::$loyalty === false) {
            self::$loyalty = self::_loyalty();
        }
        return self::$loyalty ? true : false;
    }

    /**
     * Trả về CTKM Loyalty
     * @param type $id
     * @return Object
     */
    public static function getLoyalty() {
        if (self::$loyalty === false) {
            self::$loyalty = self::_loyalty();
        }
        return self::$loyalty;
    }

    private static function _loyalty() {
        $promotion = UShort::cache()->getOrSet('LOYALTY', function() {
            $promotion = null;

            // hard code
            // Tên CTKM trong bảng promotion
            $name = ['vip', 'gold', 'member'];
//            $promote = PromotionProduct::find()->alias('d')
////                    ->leftJoin('tbl_product_brand b', 'b.id = d.bid')
//                    ->innerJoin('tbl_promotion p', 'p.id = d.promotion_id')
//                    ->where(['p.name' => $name, 'p.status' => 1])
//                    ->andWhere(['<>', 'bid', 0])
//                    ->select('d.promotion_id,d.bid, percent, p.name')
//                    ->asArray()
//                    ->all();
//
//            if ($promote) {
//                foreach ($promote as $node) {
//                    $promotion[strtolower($node['name'])][$node['bid']] = $node['percent'];
//                }
//            }
            // All Sellingitem table
            $query = PromotionSelling::find()->alias('selling')
                    ->innerJoin('promotion pro', 'pro.id = selling.promotion_id')
                    ->where([
                        'pro.name' => $name
                    ])
                    ->select([
                        'pro.name',
                        'promotion_type',
                        'selling_type',
                        'selling_barcode barcode',
                        'selling_id',
                        'selling.price',
                        'selling.percent',
                        'selling.discount'
                    ])
                    ->asArray();

            $items = ArrayHelper::index($query->all(), 'name', 'selling_id');
            return $items;
        }, UShort::getParams('cache_expire'), (new DbDependency([
            'sql' => 'SELECT MAX(updated_at) FROM promotion'
        ])));

        if (YII_DEBUG) {
            Yii::info($promotion, 'LOYALTY');
        }
        return $promotion;
    }

    /**
     * Kiểm tra KM theo bill
     * @param type $total
     * @param type $discount
     * @return Cart Object (null if not promotion)
     */
    public static function checkPromotionByTotalBill($total, $discount) {

        if (self::hasPromotion()) {

            $promotion_id = ArrayHelper::getValue(self::getPromotion(), 'id.id');
            $model = PromotionTotal::find()->alias('total')
                    ->where(['total.promotion_id' => $promotion_id])
                    ->andWhere(['<=', 'total.from_amount', $total])
                    ->andWhere(['>=', 'total.to_amount', $total])
                    ->select('id, discount, total.free_coupon, total.note, free_item')
                    ->orderBy('priority');
            if ($discount > 0) {
                $model->andWhere(['promotion_combine' => 'YES']);
            }

            $model = $model->asArray()->one();
            if ($model) {
                $totalbill = Cart::checkItem($model, Cart::PROMOTION);
                $totalbill->name = 'Khuyến mãi theo bill';

                if ($model['free_item'] > 0) {
                    
                    $id = ArrayHelper::getValue($model, 'id');
                    $free_id = ArrayHelper::getValue($model, 'id');
                    
                    $all_items = PromotionTotal::find()->alias('total')
                            ->where(['total.promotion_id' => $promotion_id])
                            ->andWhere(['<>', 'total.id', $id])
                            ->andWhere(['<=', 'total.to_amount', $total])
                            ->select('id')
                            ->asArray()
                            ->all();
                    
                    if ($all_items) {
                        $tmp = ArrayHelper::getColumn($all_items, 'id');
                        $tmp[] = $free_id;
                        $free_id = $tmp;
                        
                        $id = implode('-', $tmp);
                    }

                    $items = PromotionFreeitem::find()->alias('freeitem')
                            ->innerJoin('tbl_product_price price', 'price.id = freeitem.free_id')
                            ->where([
                                'freeitem.type' => PromotionFreeitem::FREE_BILL,
                                'freeitem.selling_id' => $free_id,
                                'freeitem.promotion_id' => $promotion_id,
                            ])->select([
                                'price.id',
                                'concat("bill_", freeitem.selling_id, price.id) free_id',
                                'freeitem.quantity'
                            ])
                            ->asArray()
                            ->all();
                    if ($items) {
                        $totalbill->info = [
                            'id' => $id,
                            'free_item' => ArrayHelper::getValue($model, 'free_item'),
                            'type' => 'free_item',
//                            'key' => ArrayHelper::map($items, 'free_id', 'quantity'),
                            'combo' => ArrayHelper::map($items, 'id', 'quantity'),
                            'added' => 0
                        ];
                    }
                }

                // Coupon
                $freeStr = ArrayHelper::getValue($model, 'free_coupon');
                if (is_string($freeStr) && $freeStr !== null) {
                    $freeCoupon = \yii\helpers\Json::decode($freeStr);
                    ArrayHelper::setValue($totalbill->info, 'coupon', $freeCoupon);
                }

                return $totalbill;
            }
        }

        return null;
    }

}
