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

/**
 * Class ActiveRecordChangeLogBehavior
 * @package panwenbin\yii2\activerecord\changelog\behaviors
 */
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
            $oldAttributes = array_diff_key($oldAttributes, array_combine($this->ignoreAttributes, $this->ignoreAttributes));
            $newAttributes = array_intersect_key($model->attributes, $oldAttributes);
            $log->old_attributes = json_encode($oldAttributes);
            $log->new_attributes = json_encode($newAttributes);
        }
        $log->event = $event->name;
        $log->route = \Yii::$app->requestedRoute;
        $log->model = $model::className();
        $primaryKeys = $model::primaryKey();
        $log->pk = json_encode(array_intersect_key($model->attributes, array_combine($primaryKeys, $primaryKeys)));
        $log->log_at = time();
        $log->save();
    }
}