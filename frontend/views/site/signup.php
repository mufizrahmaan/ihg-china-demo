<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<style type="text/css">
   
    body{
    	background:#E25F27!important;
    }
</style>
<div class="col-sm-6 col-sm-offset-3">
	<div class="site-signup">
	    <h1><?= Html::encode($this->title) ?></h1>

	    <p>Please fill out the following fields to signup:</p>

	    <div class="row">
	        <div class="col-lg-5">
	            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

	                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

	                <?= $form->field($model, 'email') ?>

	                <?= $form->field($model, 'password')->passwordInput() ?>

	                <div class="form-group">
	                    <?= Html::submitButton('Signup', ['class' => 'btn btn-default', 'name' => 'signup-button']) ?>
	                </div>

	            <?php ActiveForm::end(); ?>
	        </div>
	    </div>
	</div>
</div>

