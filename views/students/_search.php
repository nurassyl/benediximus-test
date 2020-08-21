<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\StudentSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="student-search">

	<?php $form = ActiveForm::begin([
		'method' => 'get',
		'options' => [
			'data-pjax' => 1
		],
	]); ?>

	<?= $form->field($model, 'id') ?>

	<?= $form->field($model, 'first_name') ?>

	<?= $form->field($model, 'last_name') ?>

	<?= $form->field($model, 'middle_name') ?>

	<?= $form->field($model, 'status')->dropDownList([
		'active' => 'Active',
		'inactive' => 'Inactive',
	], [ 'prompt' => 'Select status' ]) ?>

	<div class="form-group">
		<?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
		<?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
	</div>

	<?php ActiveForm::end(); ?>

</div>
