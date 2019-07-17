<?php

namespace app\widgets;

use hp\utils\UShort;
use app\common\models\EmailSubscribe;

/**
 * Description of Alert
 *
 * @author Phong
 */
class Top extends \yii\base\Widget {

    public function run() {
        $email = UShort::request()->post('email', 0);
        if ($email) {
            $newsletter = (UShort::request()->post('newsletter')) ? UShort::request()->post('newsletter') : 0;
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Email không đúng! Vui lòng nhập lại.";
                UShort::setFlash($emailErr);
            } else {
                $model = new EmailSubscribe();
                if (!$model->findEmail($email)) {
                    $model->email = $email;
                    $model->newsletter = $newsletter;
                    $model->created_at = time();
                    if ($model->save()) {
                        UShort::setFlash("Bạn đã đăng ký thành công!");
                    } else {
                        UShort::setFlash(\yii\helpers\Json::encode($model->getErrors()));
                    }
                } else {
                    UShort::setFlash("Email đã tồn tại!");
                }
            }
        }
        return $this->render('top');
    }

}
