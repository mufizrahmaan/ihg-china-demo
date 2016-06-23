<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link rel="shortcut icon" href="http://www.ihg.com/hotels/images/6c/favicon.ico" />
    <?php $this->head() ?>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Animation CSS -->
    <link href="css/animate.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <!-- Toastr style -->
    <link href="css/plugins/toastr/toastr.min.css" rel="stylesheet">
    <style>
        .form-control:focus, .single-line:focus {
            border-color: transparent !important;
        }
        .landing-page .carousel-caption {
                padding: 15px;
                position: absolute;
                top: 100px;
                left: auto;
                bottom: auto;
                right: 0px;
                text-align: left;
                width: 400px;
                background: rgba(226, 95, 39, 0.25);
                border-radius: 5px;
                color: #fff;
                box-shadow: 0px 0px 5px #000;
            }
            .btn-warning{
                background:#e25f27 !important;
                border-color:#e25f27 !important;
            }
            .padded-input{
                padding:15px 7px !important;
            }
            .landing-page .navbar.navbar-scroll .navbar-brand{
                margin-top:0px !important;
            }
            .landing-page .navbar.navbar-scroll .navbar-brand img{
                width:70%;
            }
            .landing-page .carousel .item{height:448px}
            .landing-page .navbar-default .navbar-brand{padding:0px;background:none !important}
            .greenHeading{
                color:#1ab394;
            }
            #login-form .form-group{
                font-weight: normal;
            }
            #login-form .form-group input[type=text],#login-form .form-group input[type=password]{
                border-radius: 3px !important;
                color:#000 !important;
            }
            #login-form .form-group input[type=password]{
                margin-top:15px !important;
            }
            #login-form .form-group,#login-form .form-group p{
                margin:0px;
            }
            .help-block-error{
                font-size:10px !important;
                font-weight:normal !important;
                color:yellow !important;
            }
            .navbar-nav>li>.dropdown-menu a{
                color:#270b01 !important;
            }
            .has-error .control-label {
                color: yellow !important;
            }
            
            .landing-page .bubble{
                height:auto;
            }
        </style>
        <script type="text/javascript">
            function setCookie(cname, cvalue, exdays) {
                var d = new Date();
                d.setTime(d.getTime() + (exdays*24*60*60*1000));
                var expires = "expires="+ d.toUTCString();
                document.cookie = cname + "=" + cvalue + "; " + expires;
                window.location.href = window.location.href;
            }
        </script>
</head>
<body id="page-top" class="landing-page">
<?php $this->beginBody() ?>
<?php $this->endBody() ?>
<div class="navbar-wrapper">
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/"><img src="img/logo.png"></a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#page-top"><?php echo Yii::t('app', 'Home')?></a></li>
                        <li><a href="#aboutus"><?php echo Yii::t('app', 'About us')?></a></li>
                        <li><a href="#testimonials"><?php echo Yii::t('app', 'Testimonials')?></a></li>
                        <li><a href="#contact"><?php echo Yii::t('app', 'Contact')?></a></li>
                        <?php if(empty($_GET['r'])){ ?>
                            <li><a href="index.php?r=site/vendor-login"><?php echo Yii::t('app', 'Vendor');?></a></li>
                        <?php }else{?>
                            <li><a href="index.php"><?php echo Yii::t('app', 'Hotel')?></a></li>
                        <?php } ?>
                        <li class="dropdown">
                          <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo Yii::t('app', 'Language')?> <span class="caret"></span></a>
                          <ul class="dropdown-menu">
                            <li><a href="javascript:void(0)" onclick="setCookie('lang', 'en-US', 30)"><?php echo Yii::t('app', 'English')?></a></li>
                            <li><a href="javascript:void(0)" onclick="setCookie('lang', 'china', 30)"><?php echo Yii::t('app', 'Mandarin')?></a></li>
                          </ul>
                        </li>
                        
                    </ul>
                </div>
            </div>
        </nav>
</div>

<?= $content ?>

<!-- Mainly scripts -->
<script src="js/bootstrap.min.js"></script>
<script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="js/inspinia.js"></script>
<script src="js/plugins/pace/pace.min.js"></script>
<script src="js/plugins/wow/wow.min.js"></script>


<script>

    $(document).ready(function () {

        $('body').scrollspy({
            target: '.navbar-fixed-top',
            offset: 80
        });

        // Page scrolling feature
        $('a.page-scroll').bind('click', function(event) {
            var link = $(this);
            $('html, body').stop().animate({
                scrollTop: $(link.attr('href')).offset().top - 50
            }, 500);
            event.preventDefault();
            $("#navbar").collapse('hide');
        });
    });

    var cbpAnimatedHeader = (function() {
        var docElem = document.documentElement,
                header = document.querySelector( '.navbar-default' ),
                didScroll = false,
                changeHeaderOn = 200;
        function init() {
            window.addEventListener( 'scroll', function( event ) {
                if( !didScroll ) {
                    didScroll = true;
                    setTimeout( scrollPage, 250 );
                }
            }, false );
        }
        function scrollPage() {
            var sy = scrollY();
            if ( sy >= changeHeaderOn ) {
                $(header).addClass('navbar-scroll')
            }
            else {
                $(header).removeClass('navbar-scroll')
            }
            didScroll = false;
        }
        function scrollY() {
            return window.pageYOffset || docElem.scrollTop;
        }
        init();

    })();

    // Activate WOW.js plugin for animation on scrol
    new WOW().init();

</script>

</body>
</html>
<?php $this->endPage() ?>
