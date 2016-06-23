<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<body class="gray-bg">

<div class="middle-box loginscreen  animated fadeInDown">

        <div>
            <div>
                <h1 class="logo-name">Ihg</h1>
            </div>
            <div class="ibox float-e-margins">

                    <div class="ibox-title">

                        <h5>Login</h5>

                        <div class="ibox-tools">

                            <a class="collapse-link">

                                <i class="fa fa-chevron-up"></i>

                            </a>

                        </div>

                    </div>

                    <div class="ibox-content">
                           <?php $form = ActiveForm::begin(['id' => 'login-form', 'class' => 'm-t']); ?>
                        <?= $form->field($model, 'username')->textInput(array('placeholder' => 'admin@admin.com', 'value' => 'admin@admin.com'))->label(false) ?>
                        <?= $form->field($model, 'password')->passwordInput(array('placeholder' => 'admin', 'value' => 'admin'))->label(false) ?>
                        <?= $form->field($model, 'rememberMe')->checkbox() ?>
                        <?= Html::submitButton('Login', ['class' => 'btn btn-primary btn-block', 'name' => 'login-button']) ?>
                       <br/>
                        <a class="btn btn-sm btn-white btn-block" href="javascript:void(0)">Create an account</a>

                    </div>
                 </div>
             </div>
        </div>
 <link href="css/bootstrap.css" rel="stylesheet">
 <link href="css/style.css" rel="stylesheet">
<script src="js/bootstrap.min.js"></script>
