<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use frontend\models\Users;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model frontend\models\Documents */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="documents-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'number_doc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_users')->checkboxList(
                ArrayHelper::map(Users::find()->all(), 'id', 'name')) ?>

    <?= $form->field($model, 'subject')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'resolution')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
