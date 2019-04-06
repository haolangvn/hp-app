<?php

namespace common\components;

use common\utils\UShort;
use common\utils\UFormat;

/**
 * Description of DatetimePicker
 *
 * @author HAO
 */
class DateTimePicker extends \kartik\datetime\DateTimePicker {

    public $convertFormat = true;
    public $pluginOptions = [
        'todayHighlight' => true,
        'autoclose' => true,
    ];

    public function init() {
        $this->language = UShort::app()->language;
        $this->pluginOptions['format'] = UFormat::f()->datetimeFormat;

        if ($this->value) {
            $this->value = UFormat::datetime($this->value);
        } else {
            $this->value = null;
        }
        if ($this->hasModel()) {
            $this->options['value'] = UFormat::datetime($this->model->{$this->attribute});
        }
        parent::init();
    }

}
