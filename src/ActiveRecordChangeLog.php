<?php
/**
 * @author Pan Wenbin <panwenbin@gmail.com>
 */

namespace panwenbin\yii2\activerecord\changelog;


use Yii;
use yii\db\ActiveRecord;

/**
 * Class ActiveRecordChangeLog
 * @property integer $id
 * @property string $event
 * @property string $route
 * @property string $model
 * @property string $pk
 * @property string $old_attributes
 * @property string $new_attributes
 * @property integer $log_at
 * @package panwenbin\yii2\activerecord\changelog
 */
class ActiveRecordChangeLog extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%active_record_change_log}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['old_attributes', 'new_attributes'], 'string'],
            [['log_at'], 'integer'],
            [['event', 'route', 'model', 'pk'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('ar_change_log', 'ID'),
            'event' => Yii::t('ar_change_log', 'Event Name'),
            'route' => Yii::t('ar_change_log', 'Route'),
            'model' => Yii::t('ar_change_log', 'Model Class'),
            'pk' => Yii::t('ar_change_log', 'Primary Key Condition'),
            'old_attributes' => Yii::t('ar_change_log', 'Old Attributes Json'),
            'new_attributes' => Yii::t('ar_change_log', 'New Attributes Json'),
            'log_at' => Yii::t('ar_change_log', 'Log At'),
        ];
    }
}