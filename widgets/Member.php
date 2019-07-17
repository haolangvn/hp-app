<?php

namespace app\widgets;

use luya\helpers\Url;
use hp\utils\UShort;

/**
 * Description of Member
 *
 * @author HAO
 */
class Member extends \yii\base\Widget {

    public function run() {
        
        $str = '<div class="register">';
//        if (!UShort::user()->isGuest) {
//            $str .= '<a href="' . Url::toRoute(['user/profile']) . '" class="">Tài khoản</a><a href="' . Url::toRoute(['user/logout']) . '">Thoát</a>';
//        } else {
//            $str .= '<a href="#fade" class="fade_open">Đăng nhập</a><a href="' . Url::toRoute(['user/registration']) . '" class="basic_open">Đăng ký</a>';
//        }
        $str .= '<a href="#fade" class="fade_open">Đăng nhập</a><a href="' . Url::toRoute(['user/registration']) . '" class="basic_open">Đăng ký</a>';
        $str .= '</div>';
        $str .= '<div class="button-search"><i class="fa fa-search"></i></div>
                <div class="cart"><a href="' . Url::toRoute(['cart/index']) . '"> <span class="icon-cart"></span> <span class="number">' . 0 . '</span>
                    </a>
                </div>';
        return $str;
    }

}
