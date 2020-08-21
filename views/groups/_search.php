<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\GroupSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="group-search">

	<?php $form = ActiveForm::begin([
		'action' => ['index'],
		'method' => 'get',
		'options' => [
			'data-pjax' => 1
		],
	]); ?>

	<?= $form->field($model, 'id') ?>

	<?= $form->field($model, 'name') ?>

	<?= $form->field($model, 'status')->dropDownList([
		'active' => 'Active',
		'inactive' => 'Inactive',
	], [ 'prompt' => 'Select status' ]) ?>

	<?= $form->field($model, 'type')->dropDownList([
		'remote' => 'Remote',
		'full-time' => 'Full time',
	], [ 'prompt' => 'Select type' ]) ?>

	<?= $form->field($model, 'entry_year') ?>

	<div class="form-group">
		<?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
		<?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
	</div>

	<?php ActiveForm::end(); ?>

</div>
