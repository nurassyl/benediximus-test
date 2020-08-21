<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Student */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="student-form">

	<?php $form = ActiveForm::begin(); ?>

	<?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'middle_name')->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'status')->dropDownList([
		'active' => 'Active',
		'inactive' => 'Inactive',
	], [ 'prompt' => 'Select status' ]) ?>

	<div class="form-group">
		<?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
	</div>

	<?php ActiveForm::end(); ?>

</div>
