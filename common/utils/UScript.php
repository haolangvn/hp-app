<?php

namespace common\utils;

use common\utils\UShort;
use common\utils\UString;

/**
 * Description of UScript
 *
 * @author Hao
 */
class UScript {

    public static function registerMetaTag($params = []) {
        $view = UShort::controller()->getView();

        foreach ($params as $key => $value) {
            $view->registerMetaTag([
                'name' => $key,
                'content' => $value
            ]);
        }
    }

    public static function registerJS($js, $position = \yii\web\View::POS_END, $key = null) {
        UShort::controller()->getView()->registerJs($js, $position, $key);
    }

    public static function registerSlider() {
        UShort::controller()->getView()->registerJsFile('@web/js/jssor.slider.min.js', ['depends' => \yii\web\JqueryAsset::className()]);
        $js = ' 
        jQuery(document).ready(function ($) {
            
            var jssor_1_SlideshowTransitions = [
              {$Duration:1200,$Opacity:2}
            ];
            
            var jssor_1_options = {
              $AutoPlay: true,
              $SlideshowOptions: {
                $Class: $JssorSlideshowRunner$,
                $Transitions: jssor_1_SlideshowTransitions,
                $TransitionsOrder: 1
              },
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
              },
              $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$
              }
            };
            
            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);
            
            /* responsive code begin */
            /* you can remove responsive code if you do not want the slider scales while window resizing */
            function ScaleSlider() {
                var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
                if (refSize) {
                    refSize = Math.min(refSize, 760);
                    jssor_1_slider.$ScaleWidth(refSize);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }
            ScaleSlider();
            $(window).bind("load", ScaleSlider);
            $(window).bind("resize", ScaleSlider);
            $(window).bind("orientationchange", ScaleSlider);
            /* responsive code end */
        });
';
        self::registerJS($js);
    }
    
    //put your code here
    public static function registerFacebookMetaTag($params = []) {

        $view = UShort::app()->controller->getView();
        
        foreach ($params as $key => $value) {
            $view->registerMetaTag([
                'property' => "og:".$key,
                'content' => $value
            ]);
        }
    }

}
