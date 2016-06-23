<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var backend\models\search\Product $searchModel
 */

$this->title = Yii::t('app', 'Order Detail');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Orders'), 'url' => ['orders']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ibox">
    <div class="ibox-title">
        <h5><?php echo Yii::t('app', 'Order Id - 6327');?></h5>
        <div class="ibox-tools">
            <a class="collapse-link">
                <i class="fa fa-chevron-up"></i>
            </a>
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-wrench"></i>
            </a>
            <a class="close-link">
                <i class="fa fa-times"></i>
            </a>
        </div>
    </div>
    <div class="ibox-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="m-b-md">
                    <a href="#" class="btn btn-white btn-xs pull-right"><?php echo Yii::t('app', 'Edit Order');?></a>
                </div>
                <dl class="dl-horizontal">
                    <dt><?php echo Yii::t('app', 'Status');?>:</dt> <dd><span class="label label-primary"><?php echo Yii::t('app', 'Pending');?></span></dd>
                </dl>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-5 pull-left">
                <dl class="dl-horizontal">

                    <dt><?php echo Yii::t('app', 'Created by');?>:</dt> <dd><?php echo Yii::t('app', 'Alex Smith');?></dd>
                    <dt><?php echo Yii::t('app', 'Messages');?>:</dt> <dd>  162</dd>
                    <dt><?php echo Yii::t('app', 'Customer');?>:</dt> <dd><a href="#" class="text-navy"> <?php echo Yii::t('app', 'John Smith');?></a> </dd>
                    <dt><?php echo Yii::t('app', 'Order Id');?>:</dt> <dd>  6327</dd>
                </dl>
            </div>
            <div class="col-sm-5 pull-right" id="cluster_info">
                <dl class="dl-horizontal" >

                    <dt><?php echo Yii::t('app', 'Last Updated');?>:</dt> <dd>16.08.2014 12:15:57</dd>
                    <dt><?php echo Yii::t('app', 'Created');?>:</dt> <dd>  10.07.2014 23:36:57 </dd>
                    <dt><?php echo Yii::t('app', 'Amount');?>:</dt>
                    <dd class="project-people">
                        $2770.00
                    </dd>
                </dl>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <dl class="dl-horizontal">
                    <dt>Completed:</dt>
                    <dd>
                        <div class="progress progress-striped active m-b-sm">
                            <div style="width: 60%;" class="progress-bar"></div>
                        </div>
                        <small><?php echo Yii::t('app', 'Order completed in');?> <strong>60%</strong>. <?php echo Yii::t('app', 'Remaining close the order');?>.</small>
                    </dd>
                </dl>
            </div>
        </div>
        <div class="row m-t-sm">
            <div class="col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <?php echo Yii::t('app', 'Products');?>
                    </div>
                    <div class="panel-body">
                        <table class="footable table table-stripped toggle-arrow-tiny" data-page-size="15">
                            <thead>
                                <tr>
                                    <th><?php echo Yii::t('app', 'Product Code');?></th>
                                    <th data-hide="phone"><?php echo Yii::t('app', 'Product Name');?></th>
                                    <th data-hide="phone"><?php echo Yii::t('app', 'Supplier');?></th>
                                    <th data-hide="phone"><?php echo Yii::t('app', 'Quantity');?></th>
                                    <th data-hide="phone,tablet" ><?php echo Yii::t('app', 'Price');?></th>
                                </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td> P001 </td>
                                <td> <?php echo Yii::t('app', 'Indoor access point');?> </td>
                                <td> <?php echo Yii::t('app', 'Janet Carton');?> </td>
                                <td> 3 </td>
                                <td>  $500.00 </td>
                            </tr>
                            <tr>
                                <td> P002 </td>
                                <td> <?php echo Yii::t('app', 'Cisco Catalyst 3560-CX Series Switches');?> </td>
                                <td> <?php echo Yii::t('app', 'Alex Johnatan');?> </td>
                                <td> 7 </td>
                                <td>  $200.00 </td>
                            </tr>
                            <tr>
                                <td> P003 </td>
                                <td> <?php echo Yii::t('app', '4000 Series Integrated Services Routers');?> </td>
                                <td> <?php echo Yii::t('app', 'John Smith');?> </td>
                                <td> 1 </td>
                                <td>  $530.00 </td>
                            </tr>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>