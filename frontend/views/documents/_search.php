<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\DocumentsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="documents-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'number_doc') ?>

    <?= $form->field($model, 'date_doc') ?>

    <?= $form->field($model, 'id_users') ?>

    <?= $form->field($model, 'subject') ?>

    <?php // echo $form->field($model, 'resolution') ?>

    <?php // echo $form->field($model, 'opening_status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
