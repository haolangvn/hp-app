<?php

namespace common\utils;

use common\utils\UShort;

/**
 * Description of GoogleCaptcha
 *
 * @author HAO
 */
class GoogleCaptcha extends \yii\validators\Validator {

    public static $js_file = 'https://www.google.com/recaptcha/api.js?hl=vi';
    public static $api_url = 'https://www.google.com/recaptcha/api/siteverify';
    public static $site_key = '';
    public static $secret_key = '';

    /**
     * Validate Google captcha
     * @param type $model
     * @param type $attribute
     * @return 
     */
    public function validateAttribute($model, $attribute) {
        if (self::checkKey()) {

            $message = 'Vui lòng xác nhận captcha';
            $site_key_post = isset($_POST['g-recaptcha-response']) ? $_POST['g-recaptcha-response'] : false;

            if (!$site_key_post) {
                $this->addError($model, $attribute, $message);
                return;
            }

            if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
                $remoteip = $_SERVER['HTTP_CLIENT_IP'];
            } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                $remoteip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            } else {
                $remoteip = $_SERVER['REMOTE_ADDR'];
            }

            // Tao link ket noi
            $api_url = self::$api_url . '?secret=' . self::$secret_key . '&response=' . $site_key_post . '&remoteip=' . $remoteip;
            // Lay ket qua tra ve tu google
            $response = file_get_contents($api_url);
            $response = json_decode($response);

            if (!isset($response->success) || $response->success != true) {
                $this->addError($model, $attribute, $message);
            }
        }
        return true;
    }

    /**
     * 
     * @return type
     */
    public static function showCaptcha() {
        if (self::checkKey()) {
            UShort::controller()->getView()->registerJsFile(self::$js_file, [
                'depends' => \yii\web\JqueryAsset::className(),
                'async' => '',
                'defer' => ''
            ]);
            return '<div class="g-recaptcha" data-sitekey="' . self::$site_key . '"></div>';
        }
    }

    public static function checkKey() {
        self::$site_key = UShort::getParams('g_site_key');
        self::$secret_key = UShort::getParams('g_serect_key');

        if (self::$site_key && self::$secret_key) {
            return true;
        }
        return false;
    }

}
