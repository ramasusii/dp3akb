<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset; 
use johnitvn\ajaxcrud\BulkButtonWidget;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FotoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Fotos';
$this->params['breadcrumbs'][] = $this->title;

CrudAsset::register($this);

?>

<style>
.modal-dialog {
  width: 100%;
  height: 100%;
  margin: 0;
  padding: 0;
}

.modal-content {
  height: auto;
  min-height: 100%;
  border-radius: 0;
}

.select2-search__field{
     width: 200px!important; 
}

.cke_top {
    background-image: -moz-linear-gradient(top,#f5f5f5,#ffffff)!important;
    background-image: -webkit-linear-gradient(top,#f5f5f5,#ffffff)!important;
    background-image: -o-linear-gradient(top,#f5f5f5,#ffffff)!important;
    background-image: -ms-linear-gradient(top,#f5f5f5,#ffffff);
    background-image: linear-gradient(top,#f5f5f5,#ffffff)!important;
}

.cke_bottom {
    background-image: -moz-linear-gradient(top,#f5f5f5,#ffffff)!important;
    background-image: -webkit-linear-gradient(top,#f5f5f5,#ffffff)!important;
    background-image: -o-linear-gradient(top,#f5f5f5,#ffffff)!important;
    background-image: -ms-linear-gradient(top,#f5f5f5,#ffffff);
    background-image: linear-gradient(top,#f5f5f5,#ffffff)!important;
}

.cke_button_on {
    box-shadow: 0 1px 5px rgb(255 255 255 / 60%) inset, 0 1px 0 rgb(0 0 0 / 20%);
    background-image: -moz-linear-gradient(top,#e9e9e9,#ffffff);
    background-image: -webkit-linear-gradient(top,#e9e9e9,#ffffff);
    background-image: -o-linear-gradient(top,#e9e9e9,#ffffff);
    background-image: -ms-linear-gradient(top,#e9e9e9,#ffffff);
    background-image: linear-gradient(top,#e9e9e9,#ffffff);
}

</style>
<div class="foto-index">
    <div id="ajaxCrudDatatable">
        <?=GridView::widget([
            'id'=>'crud-datatable',
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'pjax'=>true,
            'columns' => require(__DIR__.'/_columns.php'),
            'toolbar'=> [
                ['content'=>
                    Html::a('<i class="glyphicon glyphicon-plus"></i> Tambah Foto', ['create'],
                    ['role'=>'modal-remote','title'=> 'Tambah foto baru','class'=>'btn btn-blue']).
                    Html::a('<i class="glyphicon glyphicon-repeat"></i>', [''],
                    ['data-pjax'=>1, 'class'=>'btn btn-default', 'title'=>'Reset Grid']).
                    '{toggleData}'.
                    '{export}'
                ],
            ],          
            'striped' => true,
            'condensed' => true,
            'responsive' => true,          
            'panel' => [
                'type' => 'default', 
                'heading' => Html::a('<i class="fa fa-arrow-left"></i> Kembali ke Media', ['content/media', 'id' => $model->id], ['class' => 'btn btn-default']). '&nbsp; <a class="btn btn-blue" href="#">Foto</a>',
            ]
        ])?>
    </div>
</div>
<?php Modal::begin([
     "id"=>"ajaxCrudModal",
    //  'size' => 'modal-sm',
    //  'size' => 'modal-lg',
     'size' => 'modal-lg',
     "footer"=>"",// always need it for jquery plugin
])?>
<?php Modal::end(); ?>
