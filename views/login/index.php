<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<?php $form = ActiveForm::begin(
    [
        'action'=>['login/list'],
        'method'=>'post',
    ]
); ?>
    <?= $form->field($model, 'name') ?>
    <?= $form->field($model, 'email') ?>
    <?= Html::submitButton('提交') ?>
<?php ActiveForm::end(); ?>



