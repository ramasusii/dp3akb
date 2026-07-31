<?php
use yii\helpers\Url;
use yii\helpers\Html;

return [
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'name',
        'label'=>'Label Menu',
        'format'=>'raw',
        'value' => function($data) 
        {
            if($data->id==1){
                return Html::a($data->name, 
                [ 
                    'update-home', 
                    'id'  => $data->id,
                ],
                ['data-pjax' => 0]);
            }elseif($data->id==2){
                return Html::a($data->name, 
                [ 
                    'update-profil', 
                    'id'  => $data->id,
                ],
                ['data-pjax' => 0]);
            }elseif($data->id==11){
                return Html::a($data->name, 
                [ 
                    'update-tema', 
                    'id'  => $data->id,
                ],
                ['data-pjax' => 0]);
            }elseif($data->id==99){
                return Html::a($data->name, 
                [ 
                    'update-tentang', 
                    'id'  => $data->id,
                ],
                ['data-pjax' => 0]);
            }elseif($data->id==12){
                return Html::a($data->name, 
                [ 
                    'update-visimisi', 
                    'id'  => $data->id,
                ],
                ['data-pjax' => 0]);
            }elseif($data->id==13){
                return Html::a($data->name, 
                [ 
                    'update-struktur', 
                    'id'  => $data->id,
                ],
                ['data-pjax' => 0]);
            }elseif($data->id==14){
                return Html::a($data->name, 
                [ 
                    'update-tugasfungsi', 
                    'id'  => $data->id,
                ],
                ['data-pjax' => 0]);
            }elseif($data->id==15){
                return Html::a($data->name, 
                [ 
                    'update-maklumat', 
                    'id'  => $data->id,
                ],
                ['data-pjax' => 0]);
            }elseif($data->id==18){
                return Html::a($data->name, 
                [ 
                    'update-setting', 
                    'id'  => $data->id,
                ],
                ['data-pjax' => 0]);
            }else{
                return Html::a($data->name, 
                [ 
                    'update', 
                    'id'  => $data->id,
                ],
                ['data-pjax' => 0]);
            }
            
        },
    ],
];   