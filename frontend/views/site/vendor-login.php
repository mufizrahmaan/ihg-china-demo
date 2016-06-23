<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = Yii::t('app', 'IHG Home');
$this->params['breadcrumbs'][] = $this->title;
$hasError = count($model->errors);
?>
<style>
.landing-page .carousel-caption {
    background: rgba(144,113,57,0.50) !important;
}
@media (min-width: 800px){
    .carousel-caption{
        right:32% !important;
    }
}
.landing-page .contact{
    margin:0px;
}
.landing-page .carousel{
    height: 445px !important;
}
</style>
<div id="inSlider" class="carousel carousel-fade" data-ride="carousel">
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <div class="container">
                <div class="carousel-caption">
                    <div class="form-horizontal">
                        <div class="pull-left">
                            <h3><?php echo Yii::t('app', 'Vendor Login')?></h3>
                            <p style="font-size:10px;forn-weight:normal"><?php echo Yii::t('app', 'Enter username and password to log on')?>:</p>
                        </div>
                        <div class="pull-right">
                            <i class="fa fa-lock"></i>
                        </div>
                        <div class="clearfix"></div>
                        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                            <?= $form->field($model, 'username')->textInput(['autofocus' => true,'placeholder'=>Yii::t('app', 'Username').'..','class' => 'form-control input-lg'])->label(false) ?>

                            <?= $form->field($model, 'password')->passwordInput(['placeholder'=>Yii::t('app', 'Password').'..','class' => 'form-control input-lg'])->label(false) ?>

                            <?= $form->field($model, 'rememberMe')->checkbox() ?>

                            <div style="color:#fff;margin:1em 0">
                               <?php echo Yii::t('app', 'If you forgot your password you can')?> <?= Html::a(Yii::t('app', 'reset it'), ['site/request-password-reset']) ?>.
                            </div>
                            <div class="form-group">

                                <?= Html::submitButton(Yii::t('app', 'Login'), ['class' => 'btn btn-primary btn-block', 'name' => 'login-button']) ?>
                            </div>
                        <?php ActiveForm::end(); ?>
                    </div>
                </div>

            </div>
            <!-- Set background for slide in css -->
            <div class="header-back one"></div>
         </div>
    </div>
</div>


<section id="contact" class="gray-section contact">
    <div class="container">
        <div class="row m-b-lg">
            <div class="col-lg-12 text-center">
                <div class="navy-line"></div>
                <h1><?php echo Yii::t('app', "Contact Us")?></h1>
                <p><?php echo Yii::t('app', "Reach us with any questions or issues")?></p>
            </div>
        </div>
        <div class="row m-b-lg">
            <div class="col-lg-3 col-lg-offset-3">
                <address>
                    <strong><span class="navy"><?php echo Yii::t('app', "InterContinental Hotels Group")?></span></strong><br/>
                    <?php echo Yii::t('app', "22nd Floor, Citigroup Tower")?><br/>
                    <?php echo Yii::t('app', "No. 33, Huayuanshiqiao Road")?><br/>
                    <?php echo Yii::t('app', "Pudong New Area 200120")?><br/>
                    <?php echo Yii::t('app', "Shanghai")?><br/>
                    <?php echo Yii::t('app', "PR China")?><br/>
                    <abbr title="Phone">P:</abbr>86 (21) 2893 3388
                </address>
            </div>
            <div class="col-lg-4">
                <p class="text-color">
                    <?php echo Yii::t('app', "Be our eyes and ears on the road. If our hotels are not performing to the quality you've come to expect from our family of brands, let us know and we will address your concerns")?>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <a href="mailto:test@email.com" class="btn btn-primary"><?php echo Yii::t('app', "Send us mail")?></a>
                <p class="m-t-sm">
                   <?php echo Yii::t('app', "Or follow us on social platform")?> 
                </p>
                <ul class="list-inline social-icon">
                    <li><a href="#"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li><a href="#"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 text-center m-t-lg m-b-lg">
                <p><strong>&copy; <?php echo Yii::t('app', "2016 IHG. All rights reserved")?></strong><br/>
                <?php echo Yii::t('app', "Most hotels are independently owned and operated")?>.</p>
            </div>
        </div>
    </div>
</section>