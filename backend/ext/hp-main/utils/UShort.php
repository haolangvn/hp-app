<?php

namespace hp\utils;

use Yii;

class UShort {

    public static function app() {
        return Yii::$app;
    }

    public static function user() {
        return Yii::$app->user;
    }

    public static function createUrl($params = []) {
        return Yii::$app->urlManager->createUrl($params);
    }

    public static function module() {
        return Yii::$app->module;
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

}
