<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use yii\helpers\Url;
AppAsset::register($this);
Yii::$app->assetManager->bundles['yii\web\JqueryAsset'] = false;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <!--<link href="css/bootstrap.min.css" rel="stylesheet">-->
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link rel="shortcut icon" href="http://www.ihg.com/hotels/images/6c/favicon.ico" />
    <!-- Morris -->
    <link href="css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">
    <link href="css/plugins/slick/slick.css" rel="stylesheet">
    <link href="css/plugins/slick/slick-theme.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <style>
        .modal-backdrop.in{
            height:100%;
            position:fixed
        }
        .nav-tabs .active{
            border-bottom:1px solid #fff  !important;
        }
        .nav-tabs > li.active > a, .nav-tabs > li.active > a:hover, .nav-tabs > li.active > a:focus{
            border-color:#dddddd #dddddd #fff !important
        }
        .theme-config {display:none !important}
        .skin-3 .navbar-static-top,.skin-3 #page-wrapper {
            background: #f5f5f5 !important;
        }
    </style>
     <!-- Mainly scripts -->
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
     <!-- Flot -->
    <script src="js/plugins/flot/jquery.flot.js"></script>
    <script src="js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="js/plugins/flot/jquery.flot.spline.js"></script>
    <script src="js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="js/plugins/flot/jquery.flot.pie.js"></script>
    <script src="js/plugins/flot/jquery.flot.symbol.js"></script>
    <script src="js/plugins/flot/curvedLines.js"></script>
    <script src="js/plugins/flot/jquery.flot.time.js"></script>
    <!-- Peity -->
    <script src="js/plugins/peity/jquery.peity.min.js"></script>
    <script src="js/demo/peity-demo.js"></script>
    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.dropdown-toggle').dropdown();
        });
    </script>
</head>
<?php if (!Yii::$app->user->isGuest){ ?>
<body class="fixed-navigation pace-done">
<?php $this->beginBody() ?>
<div id="wrapper">
    <?php
    function activeParentMenu($array){
        return  in_array($_GET['r'],$array)?'active':'';    
    }
    function activeMenu($link){

        return  !empty($_GET['r']) && $_GET['r']==$link?'active':'';  
    }
    ?>
<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="side-menu">
            <li class="nav-header" style="text-align: center">
                <div class="dropdown profile-element"> <span>
                    <img alt="image" class="img-circle" src="img/mts.jpg" />
                     </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">
                     <?php echo Yii::t('app', 'Alan Paul');?></strong>
                     </span> <span class="text-muted text-xs block">
                     <?php echo Yii::t('app', 'MTS');?>
                     <b class="caret"></b></span> </span> </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="#"><?php echo Yii::t('app', 'Profile');?></a></li>
                        <li><a href="#"><?php echo Yii::t('app', 'Contacts');?></a></li>
                        <li class="divider"></li>
                        <li><a href="<?= Url::to(['/site/logout'])?>" data-method="post"><?php echo Yii::t('app', 'Logout');?></a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    IHG
                </div>
            </li>
            <li class="<?= empty($_GET['r']) ? 'active':''?>">
                <a href="index.php">
                    <i class="fa fa-th-large"></i> 
                    <span class="nav-label"><?php echo Yii::t('app', 'My Dashboard');?></span>
                </a>
            </li>
            <li class="<?= activeMenu('demo/orders');?>">
                <a href="index.php?r=demo/orders">
                    <i class="fa fa-list-ul"></i> 
                    <span class="nav-label"><?php echo Yii::t('app', 'Orders');?></span>
                </a>
            </li>
        </ul>

    </div>
</nav>
<div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            <form role="search" class="navbar-form-custom" method="post" action="search_results.html">
                <div class="form-group">
                    <input type="text" placeholder="<?php echo Yii::t('app', 'Search for Something')?>..." class="form-control" name="top-search" id="top-search">
                </div>
            </form>
        </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <span class="m-r-sm text-muted welcome-message"><?php echo Yii::t('app', 'Welcome to IHG')?>.</span>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope"></i>  <span class="label label-warning">16</span>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <div class="dropdown-messages-box">
                                <a href="profile.html" class="pull-left">
                                    <img alt="image" class="img-circle" src="img/a7.jpg">
                                </a>
                                <div class="media-body">
                                    <small class="pull-right">46h ago</small>
                                    <strong>Mike Loreipsum</strong> started following <strong>Monica Smith</strong>. <br>
                                    <small class="text-muted">3 days ago at 7:58 pm - 10.06.2014</small>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="dropdown-messages-box">
                                <a href="profile.html" class="pull-left">
                                    <img alt="image" class="img-circle" src="img/a4.jpg">
                                </a>
                                <div class="media-body ">
                                    <small class="pull-right text-navy">5h ago</small>
                                    <strong>Chris Johnatan Overtunk</strong> started following <strong>Monica Smith</strong>. <br>
                                    <small class="text-muted">Yesterday 1:21 pm - 11.06.2014</small>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="dropdown-messages-box">
                                <a href="profile.html" class="pull-left">
                                    <img alt="image" class="img-circle" src="img/profile.jpg">
                                </a>
                                <div class="media-body ">
                                    <small class="pull-right">23h ago</small>
                                    <strong>Monica Smith</strong> love <strong>Kim Smith</strong>. <br>
                                    <small class="text-muted">2 days ago at 2:30 am - 11.06.2014</small>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="text-center link-block">
                                <a href="mailbox.html">
                                    <i class="fa fa-envelope"></i> <strong>Read All Messages</strong>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="<?= Url::to(['/site/logout'])?>" data-method="post">
                        <i class="fa fa-sign-out"></i> <?php echo Yii::t('app', 'Log out');?>
                    </a>
                </li>
            </ul>

        </nav>
        </div>
                
            
              <!-- lets make this configuration user preferenace if wants to show the title & breadcrump -->

         
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2><?php echo Yii::t('app', 'Home') ?> </h2>
                    <ol class="breadcrumb">
                       <?php  echo Breadcrumbs::widget ( [
                        'homeLink' => [
                            'label' => '<i class="fa fa-home"></i> ' . Yii::t('app', 'Home'),
                            'url' => Yii::$app->homeUrl,
                            'encode' => false// Requested feature
                        ],
                        'links' => isset ( $this->params ['breadcrumbs'] ) ? $this->params ['breadcrumbs'] : [ ] ] ) ?>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
            

          <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                     <div class="col-lg-12">
                        <?= $content?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
     }else{ ?>
       <?= $content?>
    <?php } ?> 
    <?php $this->endBody() ?>   
    </body>
</html>
<?php $this->endPage() ?>
