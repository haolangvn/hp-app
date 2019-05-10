<?php

namespace hp\behaviors;

use yii\base\Behavior;
use yii\db\ActiveRecord;

/**
 * Description of TimestampBehavior
 *
 * @author HAO
 */
class TimestampBehavior extends Behavior {

    public $insert = ['created_at', 'updated_at'];

    /**
     * @var array An array with all fields where the timestamp should be applied to on update.
     */
    public $update = ['updated_at'];

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
     * Insert the timestamp for all provided fields.
     *
     * @param \yii\base\Event $event Event object from Active Record.
     */
    public function beforeInsert($event) {
        $time = time();
        foreach ($this->insert as $field) {
            if ($event->sender->hasAttribute($field)) {
                $event->sender->$field = $time;
            }
        }
    }

    /**
     * Update the timestamp for all provided fields.
     *
     * @param \yii\base\Event $event Event object from Active Record.
     */
    public function beforeUpdate($event) {
        $time = time();
        foreach ($this->update as $field) {
            if ($event->sender->hasAttribute($field)) {
                $event->sender->$field = $time;
            }
        }
    }

}
