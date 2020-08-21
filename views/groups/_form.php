<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Group */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="group-form">

	<?php $form = ActiveForm::begin(); ?>

	<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'status')->dropDownList([
		'active' => 'Active',
		'inactive' => 'Inactive',
	], [ 'prompt' => 'Select status' ]) ?>

	<?= $form->field($model, 'type')->dropDownList([
		'remote' => 'Remote',
		'full-time' => 'Full time',
	], [ 'prompt' => 'Select type' ]) ?>

	<?= $form->field($model, 'entry_year')->textInput() ?>

	<div class="form-group">
	<?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
	</div>

	<?php ActiveForm::end(); ?>

</div>
