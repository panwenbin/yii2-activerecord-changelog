<?php

use panwenbin\yii2\activerecord\changelog\assets\JsonViewerAsset;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model panwenbin\yii2\activerecord\changelog\ActiveRecordChangeLog */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('ar_change_log', 'Active Record Change Logs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
JsonViewerAsset::register($this);
?>
<div class="active-record-change-log-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'event',
            'route',
            'model',
            [
                'attribute' => 'pk',
                'format' => 'ntext',
                'contentOptions' => ['class' => 'json-viewer'],
            ],
            [
                'attribute' => 'old_attributes',
                'format' => 'ntext',
                'contentOptions' => ['class' => 'json-viewer'],
            ],
            [
                'attribute' => 'new_attributes',
                'format' => 'ntext',
                'contentOptions' => ['class' => 'json-viewer'],
            ],
            'log_at:datetime',
        ],
    ]) ?>

</div>
