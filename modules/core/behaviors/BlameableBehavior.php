<?php

namespace hp\behaviors;

use Yii;
use yii\base\Behavior;
use yii\db\ActiveRecord;

/**
 * Description of BlameableBehavior
 *
 * @author HAO
 */
class BlameableBehavior extends Behavior {

    public $insert = ['created_by', 'updated_by'];
    public $update = ['updated_by'];

    /**
     * Register event handlers before insert and update.
     *
     * @see \yii\base\Behavior::events()
     */
    public function events() {
        return [
            ActiveRecord::EVENT_BEFORE_INSERT => 'beforeInsert',
            ActiveRecord::EVENT_BEFORE_UPDATE => 'beforeUpdate',
        ];
    }

    /**
     * Insert the created_by for all provided fields.
     *
     * @param \yii\base\Event $event Event object from Active Record.
     */
    public function beforeInsert($event) {
        foreach ($this->insert as $field) {
            if ($event->sender->hasAttribute($field)) {
                $event->sender->$field = $this->getUserId();
            }
        }
    }

    /**
     * Update the updated_by for all provided fields.
     *
     * @param \yii\base\Event $event Event object from Active Record.
     */
    public function beforeUpdate($event) {
        foreach ($this->update as $field) {
            if ($event->sender->hasAttribute($field)) {
                $event->sender->$field = $this->getUserId();
            }
        }
    }

    protected function getUserId() {
        if (Yii::$app->has('adminuser') && Yii::$app->adminuser->getIdentity()) {
            return Yii::$app->adminuser->id;
        }

        return 0;
    }

}
