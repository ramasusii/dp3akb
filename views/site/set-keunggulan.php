<?php
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\jui\AutoComplete;
use yii\web\JsExpression;
use app\models\Treatment;
use yii\helpers\Html;
use yii\grid\GridView;

/** @var yii\web\View $this */

$this->title = 'Keunggulan - LandingPage';
?>

<div class="site-index">
<div class="content-update">
        <?= Html::a('<i class="fa fa-edit"></i> Edit Sekarang', ['profil-list/update-keunggulan', 'id'=>$models->id], ['class' => 'btn btn-primary pull-right']) ?>
    <br>
    <div class="text-center" >
        <img src="<?= Yii::$app->request->baseUrl.'/'.$models->images; ?>" alt="Img Landing Page Gho Class" style="height: 250px;">
    </div>

    <div class="jumbotron bg-transparent" style="padding-top:10px">
        <div class="box box-solid">
            <div class="box-header with-border">
            <i class="fa fa-text-width"></i>
            <h3 class="box-title">Headline</h3>
            </div> 

            <div class="box-body">
                <p><?= $models->data; ?></p>
            </div>
        </div>

        <div class="jumbotron bg-transparent" style="padding-top:5px">
            <div class="box box-solid">
                <div class="box-header with-border">
                <i class="fa fa-braille"></i>
                <h3 class="box-title">List Icon</h3>
                </div> 

                <div class="box-body">
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        [
                            'attribute' => 'icon',
                            'format' => 'raw',
                            'value' => function ($data) {
                                return '<img src="'.Yii::$app->request->baseUrl.'/'.$data->icon.'" height="100px" />';
                            },
                    
                        ],
                        'name',
                        [
                            'class' => 'yii\grid\ActionColumn',
                            'template' => '{update}',
                            'buttons' => [
                                'update' => function ($url, $model, $key) {
                                    return Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['keunggulan/update', 'id' => $model->id], [
                                        'title' => Yii::t('yii', 'Edit'),
                                    ]);
                                },
                            ],
                        ],
                    ],
                ]); ?>
                </div>
        </div>
    </div>
</div>