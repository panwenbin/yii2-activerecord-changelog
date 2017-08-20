<?php
/**
 * @author Pan Wenbin <panwenbin@gmail.com>
 */

namespace panwenbin\yii2\activerecord\changelog\assets;


use yii\web\AssetBundle;

class JsonViewerAsset extends AssetBundle
{
    public $sourcePath = '@panwenbin/yii2/activerecord/changelog/assets/json-viewer';
    public $css = [
        'json-viewer.css',
    ];
    public $js = [
        'json-viewer.js',
        'json-viewer-init.js',
    ];
    public $depends = [
        'yii\web\JqueryAsset',
    ];
}