<?php
/**
 * @author Pan Wenbin <panwenbin@gmail.com>
 */

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $log panwenbin\yii2\activerecord\changelog\ActiveRecordChangeLog */
/* @var $model yii\db\ActiveRecord */

$this->title = $log->model . ' : ' . $log->pk;
$this->params['breadcrumbs'][] = ['label' => Yii::t('ar_change_log', 'Active Record Change Logs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$attributes = method_exists($model, 'viewAttributes') ? $model->viewAttributes() : $model->attributes();
?>
<div class="active-record-change-log-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => $attributes,
    ]) ?>

</div>
