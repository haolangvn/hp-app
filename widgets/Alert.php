<?php

namespace app\widgets;

use luya\helpers\Html;
use luya\helpers\Json;
use hp\utils\UShort;
use hp\utils\UTranslate as UT;

/**
 * Description of Alert
 *
 * @author HAO
 */
class Alert extends \yii\base\Widget {

    public function run() {
        // Manage Notification        
        $modal = '';
        $flashes = UShort::session()->getAllFlashes();
        if ($flashes) {
            $modal .= Html::beginTag('div', ['id' => 'alert-modal', 'class' => 'modal fade', 'tabindex' => -1, 'role' => 'dialog']);
            $modal .= Html::beginTag('div', ['class' => 'modal-dialog', 'role' => 'document']);
            $modal .= Html::beginTag('div', ['class' => 'modal-content']);

            // modal header
            $modal .= Html::beginTag('div', ['class' => 'modal-header']);
            $modal .= '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>';
            $modal .= Html::tag('strong', UT::t('Notification'));
            $modal .= Html::endTag('div');
            // modal body
            $modal .= Html::beginTag('div', ['class' => 'modal-body']);
            foreach ($flashes as $key => $message) {
                $modal .= '<div class="text-' . $key . '">' . $message . '</div>';
            }
            $modal .= Html::endTag('div');

            $modal .= Html::endTag('div');
            $modal .= Html::endTag('div');
            $modal .= Html::endTag('div');
//            $this->getView()->registerJs("$('#alert-modal').modal();");
        }


        $html = '<div class="hidden" id="global_vars">';
        $vars = UShort::getParams('global_vars');
        if ($vars) {
            foreach ($vars as $key => $item) {
                $html .= Html::tag('span', '', ['key' => $key, 'class' => 'hidden', 'var' => (Json::isJson($item)) ? Json::encode($item) : $item]);
            }
        }

        $html .= '</div>';

        return $modal . $html;
    }

}
