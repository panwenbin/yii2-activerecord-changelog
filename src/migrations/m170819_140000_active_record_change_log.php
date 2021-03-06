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
            'event' => $this->string()->comment('Event Name'),
            'route' => $this->string()->comment('Route'),
            'model' => $this->string()->comment('Model Class'),
            'pk' => $this->string()->comment('Primary Key Condition'),
            'old_attributes' => $this->text()->comment('Old Attributes Json'),
            'new_attributes' => $this->text()->comment('New Attributes Json'),
            'log_at' => $this->integer(),
        ]);
        $this->createIndex('model', '{{%active_record_change_log}}', ['model']);
    }

    public function down()
    {
        $this->dropTable('{{%active_record_change_log}}');
    }
}