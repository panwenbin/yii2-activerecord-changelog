<?php

use panwenbin\yii2\activerecord\changelog\assets\JsonViewerAsset;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel panwenbin\yii2\activerecord\changelog\ActiveRecordChangeLogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('ar_change_log', 'Active Record Change Logs');
$this->params['breadcrumbs'][] = $this->title;
JsonViewerAsset::register($this);
?>
<div class="active-record-change-log-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'event',
            'route',
            'model',
            'pk',
            'log_at:datetime',

            ['class' => 'yii\grid\ActionColumn', 'template' => '{view} {model}', 'buttons' => [
                'model' => function ($url, $model, $key) {
                    return Html::a('<span class="glyphicon glyphicon-map-marker"></span>', ['model', 'id' => $model->id]);
                },
            ]],
        ],
    ]); ?>
</div>
