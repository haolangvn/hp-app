<?php

namespace hp\utils;

use Yii;

/**
 * Shortcut Yii
 *
 * @author HAO
 */
class UShort {

    /**
     * Shortcut Yii
     * @return Yii::$app
     */
    public static function app() {
        return Yii::$app;
    }

    public static function user() {
        return Yii::$app->user;
    }

    public static function urlMana() {
        return Yii::$app->urlManager;
    }

    public static function createUrl($params = []) {
        return Yii::$app->urlManager->createUrl($params);
    }

    public static function module() {
        return Yii::$app->controller->module;
    }

    public static function controller() {
        return Yii::$app->controller;
    }

    public static function cache() {
        return Yii::$app->cache;
    }

    public static function setFlash($value, $key = 'success') {
        self::app()->session->setFlash($key, $value);
    }

    public static function isDeveloper() {
        return self::user()->id == 1;
    }

    public static function request() {
        return Yii::$app->request;
    }

    public static function response() {
        return Yii::$app->response;
    }

    public static function db() {
        return Yii::$app->db;
    }

    public static function session() {
        return Yii::$app->session;
    }

    public static function formater() {
        return Yii::$app->formatter;
    }

    public static function getParams($name, $default = null) {
        return \yii\helpers\ArrayHelper::getValue(Yii::$app->params, $name, $default);
    }

    public static function setParams($name, $value) {
        return Yii::$app->params[$name] = $value;
    }

}
