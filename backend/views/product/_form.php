<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\datecontrol\DateControl;
use dosamigos\ckeditor\CKEditor;
/**
 * @var yii\web\View $this
 * @var backend\models\Product $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(['type'=>ActiveForm::TYPE_VERTICAL,

                        'options'=>['enctype'=>'multipart/form-data'] // important
                        ]); 
        echo Form::widget([

        'model' => $model,
        'form' => $form,
        'columns' => 2,
        'attributes' => [

            'product_code'=>['type'=> Form::INPUT_TEXT, 'options'=>['placeholder'=>Yii::t('app', 'Enter Product Code').'...', 'maxlength'=>100]],

            'product_name'=>['type'=> Form::INPUT_TEXT, 'options'=>['placeholder'=>Yii::t('app', 'Enter Product Name').'...', 'maxlength'=>150]],

            'supplier'=>['type'=> Form::INPUT_TEXT, 'options'=>['placeholder'=>Yii::t('app', 'Enter Supplier').'...', 'maxlength'=>100]],

            'price'=>['type'=> Form::INPUT_TEXT, 'options'=>['placeholder'=>Yii::t('app', 'Enter Price').'...', 'maxlength'=>11]],
            //'category'=>['type'=> Form::INPUT_TEXT, 'options'=>['placeholder'=>'Enter Category...', 'maxlength'=>100]],
            'category' => [ 
                                    'type' => Form::INPUT_DROPDOWN_LIST,
                                        'items'=>array('Wireless'=>'Wireless','Conferencing'=>'Conferencing','Video'=>'Video',
                                                        'Routers'=>'Routers','Security'=>'Security' ,'Switches'=>'Switches'),

                                        'options' => [ 

                                                'prompt' => '--'.Yii::t('app', 'Select Status').'--'

                                        ]

                                ],

        ]

    ]);
    echo '<input type="hidden" name="Product[updated_date]" value="'.date('Y-m-d H:i:s').'" class="form-control" id="product-updated_date-disp">';
    echo  '<input type="file" name="image"  />';
    echo Form::widget([

        'model' => $model,
        'form' => $form,
        'columns' => 1,
        'attributes' => [
                'description'=>['type'=> Form::INPUT_TEXTAREA,'columnOptions' => [ 

                                                'colspan' => 1 

                                        ], 'options'=>['placeholder'=>Yii::t('app', 'Enter Description').'...','rows'=> 6]],

        ]

    ]);
    $form->field ( $model, 'description' )->widget ( CKEditor::className (), [ 



                        'options' => [ 



                                'rows' => 10 



                        ],



                        'preset' => 'basic' 



                ] );
    echo Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']);
    ActiveForm::end(); ?>

</div>
