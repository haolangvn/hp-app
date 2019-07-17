<?php

namespace hp\widget;

use hp\utils\UShort;
use hp\utils\UFormat;

/**
 * Description of DatePicker
 *
 * @author HAO
 */
class DatePicker extends \kartik\date\DatePicker {

    public $convertFormat = true;
    public $pluginOptions = [
        'todayHighlight' => true,
        'autoclose' => true,
    ];

    public function init() {
        parent::init();

        $this->language = UShort::app()->language;
        $this->pluginOptions['format'] = UFormat::f()->dateFormat;

        if ($this->value) {
            $this->value = UFormat::date($this->value);
        }
        if ($this->value2) {
            $this->value2 = UFormat::date($this->value2);
        }
        
        if ($this->hasModel() && $this->attribute && $this->model->{$this->attribute}) {
            $this->options['value'] = UFormat::datetime($this->model->{$this->attribute});
        }
    }

}
