<?php
/**
 * @author Pan Wenbin <panwenbin@gmail.com>
 */

namespace panwenbin\yii2\activerecord\changelog;


use yii\db\ActiveRecord;

/**
 * Class ActiveRecordChangeLog
 * @property integer $id
 * @property string $model
 * @property string $event
 * @property string $old_attributes
 * @property string $new_attributes
 * @property integer $created_at
 * @package panwenbin\yii2
 */
class ActiveRecordChangeLog extends ActiveRecord
{

}