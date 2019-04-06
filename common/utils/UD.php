<?php

namespace common\utils;

use yii\helpers\Html;

/**
 * Description of UD
 *
 * @author HAO
 */
class UD {

    public static function demo($title, $code, $desc = null) {

        echo Html::tag('h4', $title);
        if ($desc) {
            echo '<small>' . $desc . '</small>';
        }

        echo '<blockquote>';
        echo Html::tag('pre', Html::encode('<?php echo ' . $code . ' ?>'));
        echo Html::beginTag('div', [
            'overflow-y' => 'scroll',
            'max-height' => 150
        ]);

        echo '<small>';
        eval("echo $code; ");
        echo '</small>';

        echo Html::endTag('div');
        echo '</blockquote>';
    }

}
