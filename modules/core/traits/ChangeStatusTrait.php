<?php

namespace hp\traits;

use hp\utils\UShort;

/**
 *
 * @author hao
 */
trait ChangeStatusTrait {

    public function actionChangeStatus() {
        if (UShort::request()->isPost) {
            $key = UShort::request()->get();

            $attribute = 'is_hidden';
            if (isset($key['attribute'])) {
                $attribute = $key['attribute'];
                unset($key['attribute']);
            }


            if ($key) {

                $model = $this->findModel($key);
                if ($model) {
                    $value = ($model->$attribute == 1) ? 0 : 1;

                    if (is_array($key)) {
                        $key = implode('-', $key);
                    }

                    UShort::db()->createCommand()->update($model::tableName(), [$attribute => $value], 'id=:id', [':id' => $model->id])
                            ->execute();
                    UShort::setFlash("Record: #{$key} has been update successfull");
                }
            }
        }

        return $this->redirect(['index']);
    }

}
