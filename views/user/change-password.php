<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = Yii::t('app', 'Ubah Password');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">

<div class="col-md-12">
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-unlock-alt"></i> Password</h3>
        </div>
        <div class="box-body">


    <div class="row">
        <div class="col-lg-7">
                <?php $form = ActiveForm::begin(
                    [
                        'fieldConfig' => 
                        [
                            'options' => [
                                'class' => '',
                            ],
                            'labelOptions'=>[
                                'class' => 'control-label col-sm-5',
                            ],
                            'inputOptions'=>[
                                'class'=>'form-control input-sm',
                            ],
                            'enableError' => true,
                            'template' => '
                                <div class="col-sm-12">
                                    {label}
                                    <div class="col-sm-7">
                                        {input}{error}        
                                    </div>
                                </div>
                            ',
                        ] 
                    ]); 
                ?>
                <?= $form->field($model, 'oldPassword')->passwordInput() ?>
                <?= $form->field($model, 'newPassword')->passwordInput() ?>
                <?= $form->field($model, 'retypePassword')->passwordInput() ?>
                
                <div class="col-md-12">
                    <div class="col-md-5"></div>
                    <div class="col-md-7">
                        <?= Html::submitButton('Simpan', ['class' => 'btn btn-primary btn-sm']) ?>
                    </div>
                </div>
            <?php ActiveForm::end(); ?>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
</div>
</div>
