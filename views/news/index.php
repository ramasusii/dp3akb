<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset; 
use johnitvn\ajaxcrud\BulkButtonWidget;

/* @var $this yii\web\View */
/* @var $searchModel app\models\NewsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'News';
$this->params['breadcrumbs'][] = $this->title;

CrudAsset::register($this);

// echo  "@web : ".Yii::getAlias('@web') . '/web/uploads/berita';  
// echo  "</br>";    
// echo  "@webroot : ".Yii::getAlias('@webroot') . '/web/uploads/berita';
// echo  "</br>";
// echo  "baseUrl : ".Yii::$app->request->baseUrl . '/web/uploads/berita'; 
// echo  "</br>";
// echo  "__DIR__ : ".__DIR__ . '/web/uploads/berita'; 

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
<div class="news-index">
    <div id="ajaxCrudDatatable">
        <?=GridView::widget([
            'id'=>'crud-datatable',
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'pjax'=>true,
            'columns' => require(__DIR__.'/_columns.php'),
            'toolbar'=> [
                ['content'=>
                    Html::a('<i class="glyphicon glyphicon-plus"></i>', ['create'],
                    ['role'=>'modal-remote','title'=> 'Create new News','class'=>'btn btn-default']).
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
                'type' => 'primary', 
                'heading' => '<i class="glyphicon glyphicon-list"></i> News listing',
                'before'=>'<em>* Resize table columns just like a spreadsheet by dragging the column edges.</em>',
                'after'=>BulkButtonWidget::widget([
                            'buttons'=>Html::a('<i class="glyphicon glyphicon-trash"></i>&nbsp; Delete All',
                                ["bulk-delete"] ,
                                [
                                    "class"=>"btn btn-danger btn-xs",
                                    'role'=>'modal-remote-bulk',
                                    'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                                    'data-request-method'=>'post',
                                    'data-confirm-title'=>'Are you sure?',
                                    'data-confirm-message'=>'Are you sure want to delete this item'
                                ]),
                        ]).                        
                        '<div class="clearfix"></div>',
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
