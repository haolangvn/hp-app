<?php

namespace common\behaviors;

use common\utils\UShort;
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
        if (UShort::app()->has('adminuser') && UShort::app()->adminuser->getIdentity()) {
            return UShort::app()->adminuser->id;
        }

        if (UShort::user()) {
            return UShort::user()->id;
        }
        
        return 0;
    }

}
