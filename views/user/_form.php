<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama')->textInput() ?>
    <?= $form->field($model, 'email')->textInput() ?>
    <?= $form->field($model, 'role')->dropDownList(
            [ 
                'Admin'=> 'Admin',
                'User'=> 'User', 
            ], 
            ['prompt' => '- Pilih Role -']
        ) ?>

    <div class="clearfix"></div>   
    <hr>
    <p style="color:red; font-weight:bold"> * Username yang akan digunakan adalah email Anda.</p>
    <br>
    <?= $form->field($model, 'xpassword')->passwordInput() ?>        
    <?= $form->field($model, 'retypePassword')->passwordInput() ?>
  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
