<?php

namespace hp\validators;

use hp\utils\UShort;

/**
 * Params Main config
 * ```php
 * [
 *      'g_site_key' => SITE_KEY
 *      'g_serect_key' => SERECT KEY
 * ]
 * ```
 * 
 * Validate In Model
 * ```php
 * ['captcha', GCaptcha::class, 'skipOnEmpty' => !GCaptcha::checkKey()]
 * ```
 * 
 * In View
 * ```php
 * GCaptcha::viewCaptcha();
 * ```
 *
 * @author HAO
 */
class GCaptcha extends \yii\validators\Validator {

    const JS_URL = 'https://www.google.com/recaptcha/api.js?hl=vi';
    const API_URL = 'https://www.google.com/recaptcha/api/siteverify';

    public static $site_key = null;
    public static $secret_key = null;

    /**
     * Validate Google captcha
     * @param type $model
     * @param type $attribute
     * @return 
     */
    public function validateAttribute($model, $attribute) {
        if (self::checkKey()) {
            $message = 'Please confirm captcha';
            $site_key_post = UShort::request()->post('g-recaptcha-response', false);

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
            $api_url = self::API_URL . '?secret=' . self::$secret_key . '&response=' . $site_key_post . '&remoteip=' . $remoteip;
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
     * Hiển thị captcha
     * @return html captcha
     */
    public static function viewCaptcha() {
        if (self::checkKey()) {
            UShort::controller()->getView()->registerJsFile(self::JS_URL, [
                'depends' => \yii\web\JqueryAsset::className(),
                'async' => '',
                'defer' => ''
            ]);
            echo '<div class="g-recaptcha" data-sitekey="' . self::$site_key . '"></div>';
        }
    }

    /**
     * Key được khai báo trong config
     * Check validate key
     * @return boolean
     */
    public static function checkKey() {
        self::$site_key = UShort::getParams('g_site_key');
        self::$secret_key = UShort::getParams('g_serect_key');

        if (self::$site_key && self::$secret_key) {
            return true;
        }
        return false;
    }

}
