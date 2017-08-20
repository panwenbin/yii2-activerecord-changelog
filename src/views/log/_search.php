<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model panwenbin\yii2\activerecord\changelog\ActiveRecordChangeLogSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="active-record-change-log-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
    <div class="row">
        <div class="col-md-3"><?= $form->field($model, 'event') ?></div>
        <div class="col-md-3"><?= $form->field($model, 'route') ?></div>
        <div class="col-md-3"><?= $form->field($model, 'model') ?></div>
        <div class="col-md-3"><?= $form->field($model, 'pk') ?></div>
    </div>

    <?php // echo $form->field($model, 'old_attributes') ?>

    <?php // echo $form->field($model, 'new_attributes') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('ar_change_log', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('ar_change_log', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
