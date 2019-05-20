<?php

namespace app\widgets;

use yii\helpers\Html;
use hp\utils\UShort;

/**
 * Description of Alert
 *
 * @author HAO
 */
class Alert extends \yii\base\Widget {

    public $body = null;

    public function init() {
        parent::init();

        foreach (UShort::session()->getAllFlashes(true) as $key => $message) {
            $this->body .= '<div class="text-' . $key . '">' . $message . '</div>';
        }
    }

    public function run() {
        $modal = '';
        if ($this->body) {
            $modal = Html::beginTag('div', ['id' => 'alert-modal', 'class' => 'modal fade bs-example-modal-sm', 'tabindex' => -1, 'role' => 'dialog']);
            $modal .= Html::beginTag('div', ['class' => 'modal-dialog modal-sm', 'role' => 'document']);
            $modal .= Html::beginTag('div', ['class' => 'modal-content']);

            // modal header
            $modal .= Html::beginTag('div', ['class' => 'modal-header']);
            $modal .= '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>';
            $modal .= Html::tag('strong', 'Thông báo');
            $modal .= Html::endTag('div');
            // modal body
            $modal .= Html::beginTag('div', ['class' => 'modal-body']);
            $modal .= $this->body;
            $modal .= Html::endTag('div');

            $modal .= Html::endTag('div');
            $modal .= Html::endTag('div');
            $modal .= Html::endTag('div');
            $this->getView()->registerJs("$('#alert-modal').modal();");
        }
        return $modal;
    }

}
