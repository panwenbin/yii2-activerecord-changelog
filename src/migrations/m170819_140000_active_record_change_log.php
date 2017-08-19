<?php
/**
 * @author Pan Wenbin <panwenbin@gmail.com>
 */

class m170819_140000_active_record_change_log extends \yii\db\Migration
{
    public function up()
    {
        $this->createTable('{{%active_record_change_log}}', [
            'id' => $this->primaryKey(),
            'model' => $this->string()->comment('Model Class'),
            'event' => $this->string()->comment('Event Name'),
            'old_attributes' => $this->text()->comment('Old Attributes Json'),
            'new_attributes' => $this->text()->comment('New Attributes Json'),
            'created_at' => $this->integer(),
        ]);
    }
}