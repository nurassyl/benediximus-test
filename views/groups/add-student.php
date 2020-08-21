<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Group */

$this->title = 'Add student';
$this->params['breadcrumbs'][] = ['label' => 'Groups', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $group->name, 'url' => ['groups/view', 'id' => $group->id]];
$this->params['breadcrumbs'][] = ['label' => 'Students', 'url' => ['groups/students', 'id' => $group->id]];
$this->params['breadcrumbs'][] = 'Add';
?>
<div class="student-add">

    <h1><?= Html::encode($this->title) ?></h1>

	<div class="form">

		<?php $form = ActiveForm::begin(); ?>

		<?= $form->field($model, 'student_id')->dropDownList($students, [ 'prompt' => 'Select student' ]) ?>

		<?= Html::hiddenInput('GroupStudent[group_id]', $group->id) ?>

		<div class="form-group">
			<?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
		</div>

		<?php ActiveForm::end(); ?>

	</div>

</div>
