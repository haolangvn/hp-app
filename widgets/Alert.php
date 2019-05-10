<?php

namespace app\widgets;

use hp\utils\UShort;
use yii\helpers\Html;

/**
 * Description of Alert
 *
 * @author Phong
 */
class Alert extends \yii\base\Widget {

    public function run() {
        $flashes = UShort::session()->getAllFlashes();
        if (!$flashes == null && (Ushort::controller()->action->id != 'notification')) {
            ?>
            <!-- Modal -->
            <div class="modal fade" id="alertModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title dark bold" id="exampleModalLongTitle">Thông Báo</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <?php
                            foreach ($flashes as $value) {
                                echo Html::tag('div', $value, ['class' => 'alert alert-dark', 'role' => 'alert']);
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                $jss = <<< JS
     $(function () {
        $('#alertModal').modal('toggle');
     });
JS;
            $this->getView()->registerJs($jss, \yii\web\View::POS_END);
        }
    }

}
