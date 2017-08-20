<?php
/**
 * @author Pan Wenbin <panwenbin@gmail.com>
 */

namespace panwenbin\yii2\activerecord\changelog;


use Yii;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'panwenbin\yii2\activerecord\changelog\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        if (!isset(Yii::$app->i18n->translations['ar_change_log'])) {
            Yii::$app->i18n->translations['ar_change_log'] = [
                'class' => 'yii\i18n\PhpMessageSource',
                'sourceLanguage' => 'en',
                'basePath' => '@panwenbin/yii2/activerecord/changelog/messages',
            ];
        }
    }
}