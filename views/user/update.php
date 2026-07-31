<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

$this->title = Yii::t('app', 'Signup');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-signup">

   <?= Html::errorSummary($model)?>
    <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
  
        <?php
             $role = [
                'Super Admin'   => 'Super Admin',
                'Admin Website'   => 'Admin Website',
                'User'   => 'User',
            ];
        ?>
        <?= $form->field($model, 'role')->widget(Select2::classname(), [
            'data' => $role,
            'options' => ['placeholder' => 'Role'],
            'pluginOptions' => [
                'allowClear' => true,
            ],
        ]); 
        ?>

        <?php if (!Yii::$app->request->isAjax){ ?>
            <div class="form-group">
                <?= Html::submitButton(Yii::t('app', 'Signup'), ['class' => 'btn btn-primary']) ?>
            </div>
        <?php } ?>
    <?php ActiveForm::end(); ?>
</div>