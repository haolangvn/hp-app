<?php

namespace hp\traits;

use luya\admin\models\Lang;
use luya\helpers\Json;
use luya\helpers\Html;
use luya\helpers\ArrayHelper;

/**
 *
 * @author hao
 */
trait I18nFormTrait {

    /**
     * 
     * @param type $attribute
     * @param type $type
     * @return string
     */
    public function formI18N($attribute, $type = 'text') {
        $html = '';
        if ($this->isI18n($attribute)) {
            $lang = Lang::find()
                            ->select('short_code, name')->all();
            $i18n = Json::decode($this->getOldAttribute($attribute));


//            $html .= $form->field($this, "name[{$node->short_code}]")
//                                    ->textInput(['maxlength' => true, 'value' => \luya\helpers\ArrayHelper::getValue($i18n, $node->short_code)])
//                                    ->label($this->getAttributeLabel($attribute) . ' - ' . $node->name);

            $html .= '<div class="row">';
            foreach ($lang as $node) {
                $html .= '<div class="col-md-6">';
                $html .= '<label>' . $this->getAttributeLabel($attribute) . ' (' . $node->name . ')</label>';
                switch ($type) {
                    case 'text' :
                        $html .= Html::activeTextInput($this, "{$attribute}[{$node->short_code}]", [
                                    'maxlength' => true,
                                    'value' => ArrayHelper::getValue($i18n, $node->short_code),
                                    'class' => 'form-control'
                        ]);

                        break;
                    case 'textarea' :
                        $html .= Html::activeTextarea($this, "{$attribute}[{$node->short_code}]", [
                                    'maxlength' => true,
                                    'value' => ArrayHelper::getValue($i18n, $node->short_code),
                                    'class' => 'form-control',
                                    'rows' => 4
                        ]);
                        break;
                }
                $html .= '</div>';
            }
            $html .= '</div>';
        }

        return $html;
    }

}
