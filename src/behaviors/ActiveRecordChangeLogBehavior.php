<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2017/8/19
 * Time: 12:03
 */

namespace panwenbin\yii2\activerecord\changelog\behaviors;


use panwenbin\yii2\activerecord\changelog\ActiveRecordChangeLog;
use yii\base\Behavior;
use yii\base\Event;
use yii\db\ActiveRecord;
use yii\db\AfterSaveEvent;

class ActiveRecordChangeLogBehavior extends Behavior
{
    public $ignoreAttributes = [];

    public function events()
    {
        return [
            ActiveRecord::EVENT_AFTER_INSERT => 'logChange',
            ActiveRecord::EVENT_AFTER_UPDATE => 'logChange',
            ActiveRecord::EVENT_AFTER_DELETE => 'logChange',
        ];
    }

    /**
     * Log Active Record Changes
     * @param Event $event
     */
    public function logChange(Event $event)
    {
        /* @var \yii\db\ActiveRecord $model */
        $model = $this->owner;
        if ($model instanceof ActiveRecord == false) {
            return;
        }
        if ($model instanceof ActiveRecordChangeLog) {
            return;
        }
        $log = new ActiveRecordChangeLog();
        if ($event instanceof AfterSaveEvent) {
            $oldAttributes = $event->changedAttributes;
            $newAttributes = array_intersect_key($model->attributes, $oldAttributes);
            $log->old_attributes = json_encode($oldAttributes);
            $log->new_attributes = json_encode($newAttributes);
        }
        $log->model = $model::className();
        $log->event = $event->name;
        $log->created_at = time();
        $log->save();
    }
}