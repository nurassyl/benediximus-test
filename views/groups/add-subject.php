<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Group */

$this->title = 'Add subject';
$this->params['breadcrumbs'][] = ['label' => 'Groups', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $group->name, 'url' => ['groups/view', 'id' => $group->id]];
$this->params['breadcrumbs'][] = ['label' => 'subjects', 'url' => ['groups/subjects', 'id' => $group->id]];
$this->params['breadcrumbs'][] = 'Add';
?>
<div class="subject-add">

    <h1><?= Html::encode($this->title) ?></h1>

	<div class="form">

		<?php $form = ActiveForm::begin(); ?>

		<?= $form->field($model, 'subject_id')->dropDownList($subjects, [ 'prompt' => 'Select subject' ]) ?>

		<?= Html::hiddenInput('GroupSubject[group_id]', $group->id) ?>

		<div class="form-group">
			<?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
		</div>

		<?php ActiveForm::end(); ?>

	</div>

</div>
