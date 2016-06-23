<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var backend\models\search\Product $searchModel
 */

$this->title = Yii::t('app', 'Orders');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-lg-12">
        <div class="ibox">
            <div class="ibox-title">
                <h5><?php echo Yii::t('app', 'Orders History');?></h5>
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
                <table class="footable table table-stripped toggle-arrow-tiny" data-page-size="15">
                    <thead>
                    <tr>

                        <th><?php echo Yii::t('app', 'Order ID');?></th>
                        <th data-hide="phone"><?php echo Yii::t('app', 'Vendor');?></th>
                        <th data-hide="phone"><?php echo Yii::t('app', 'Amount');?></th>
                        <th data-hide="phone"><?php echo Yii::t('app', 'Date added');?></th>
                        <th data-hide="phone,tablet" ><?php echo Yii::t('app', 'Date modified');?></th>
                        <th data-hide="phone"><?php echo Yii::t('app', 'Status');?></th>
                        <th class="text-right"><?php echo Yii::t('app', 'Action');?></th>

                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                           3214
                        </td>
                        <td>
                            <?php echo Yii::t('app', 'MTS');?>
                        </td>
                        <td>
                            $500.00
                        </td>
                        <td>
                            03/04/2015
                        </td>
                        <td>
                            03/05/2015
                        </td>
                        <td>
                            <span class="label label-primary"><?php echo Yii::t('app', 'Pending');?></span>
                        </td>
                        <td class="text-right">
                            <div class="btn-group">
                                <button class="btn-white btn btn-xs"><?php echo Yii::t('app', 'View');?></button>
                                <button class="btn-white btn btn-xs"><?php echo Yii::t('app', 'Edit');?></button>
                                <button class="btn-white btn btn-xs"><?php echo Yii::t('app', 'Delete');?></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            324
                        </td>
                        <td>
                            <?php echo Yii::t('app', 'MTS');?>
                        </td>
                        <td>
                            $320.00
                        </td>
                        <td>
                            12/04/2015
                        </td>
                        <td>
                            21/07/2015
                        </td>
                        <td>
                            <span class="label label-primary"><?php echo Yii::t('app', 'Pending');?></span>
                        </td>
                        <td class="text-right">
                            <div class="btn-group">
                                <button class="btn-white btn btn-xs"><?php echo Yii::t('app', 'View');?></button>
                                <button class="btn-white btn btn-xs"><?php echo Yii::t('app', 'Edit');?></button>
                                <button class="btn-white btn btn-xs"><?php echo Yii::t('app', 'Delete');?></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            546
                        </td>
                        <td>
                            <?php echo Yii::t('app', 'MTS');?>
                        </td>
                        <td>
                            $2770.00
                        </td>
                        <td>
                            06/07/2015
                        </td>
                        <td>
                            04/08/2015
                        </td>
                        <td>
                            <span class="label label-primary"><?php echo Yii::t('app', 'Pending');?></span>
                        </td>
                        <td class="text-right">
                            <div class="btn-group">
                                <button class="btn-white btn btn-xs"><?php echo Yii::t('app', 'View');?></button>
                                <button class="btn-white btn btn-xs"><?php echo Yii::t('app', 'Edit');?></button>
                                <button class="btn-white btn btn-xs"><?php echo Yii::t('app', 'Delete');?></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            6327
                        </td>
                        <td>
                            <?php echo Yii::t('app', 'MTS');?>
                        </td>
                        <td>
                            $8560.00
                        </td>
                        <td>
                            01/12/2015
                        </td>
                        <td>
                            05/12/2015
                        </td>
                        <td>
                            <span class="label label-primary"><?php echo Yii::t('app', 'Pending');?></span>
                        </td>
                        <td class="text-right">
                            <div class="btn-group">
                                <button class="btn-white btn btn-xs"><?php echo Yii::t('app', 'View');?></button>
                                <button class="btn-white btn btn-xs"><?php echo Yii::t('app', 'Edit');?></button>
                                <button class="btn-white btn btn-xs"><?php echo Yii::t('app', 'Delete');?></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            642
                        </td>
                        <td>
                            <?php echo Yii::t('app', 'MTS');?>
                        </td>
                        <td>
                            $6843.00
                        </td>
                        <td>
                            10/04/2015
                        </td>
                        <td>
                            13/07/2015
                        </td>
                        <td>
                            <span class="label label-success"><?php echo Yii::t('app', 'Shipped');?></span>
                        </td>
                        <td class="text-right">
                            <div class="btn-group">
                                <button class="btn-white btn btn-xs"><?php echo Yii::t('app', 'View');?></button>
                                <button class="btn-white btn btn-xs"><?php echo Yii::t('app', 'Edit');?></button>
                                <button class="btn-white btn btn-xs"><?php echo Yii::t('app', 'Delete');?></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            7435
                        </td>
                        <td>
                            <?php echo Yii::t('app', 'Michael Zimber');?>
                        </td>
                        <td>
                            $750.00
                        </td>
                        <td>
                            04/04/2015
                        </td>
                        <td>
                            14/05/2015
                        </td>
                        <td>
                            <span class="label label-success"><?php echo Yii::t('app', 'Shipped');?></span>
                        </td>
                        <td class="text-right">
                            <div class="btn-group">
                                <button class="btn-white btn btn-xs"><?php echo Yii::t('app', 'View');?></button>
                                <button class="btn-white btn btn-xs"><?php echo Yii::t('app', 'Edit');?></button>
                                <button class="btn-white btn btn-xs"><?php echo Yii::t('app', 'Delete');?></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            3214
                        </td>
                        <td>
                            <?php echo Yii::t('app', 'Sandra Smith');?>
                        </td>
                        <td>
                            $500.00
                        </td>
                        <td>
                            03/04/2015
                        </td>
                        <td>
                            03/05/2015
                        </td>
                        <td>
                            <span class="label label-primary"><?php echo Yii::t('app', 'Pending');?></span>
                        </td>
                        <td class="text-right">
                            <div class="btn-group">
                                <button class="btn-white btn btn-xs"><?php echo Yii::t('app', 'View');?></button>
                                <button class="btn-white btn btn-xs"><?php echo Yii::t('app', 'Edit');?></button>
                                <button class="btn-white btn btn-xs"><?php echo Yii::t('app', 'Delete');?></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            324
                        </td>
                        <td>
                            <?php echo Yii::t('app', 'Janet Carton');?>
                        </td>
                        <td>
                            $320.00
                        </td>
                        <td>
                            12/04/2015
                        </td>
                        <td>
                            21/07/2015
                        </td>
                        <td>
                            <span class="label label-primary"><?php echo Yii::t('app', 'Pending');?></span>
                        </td>
                        <td class="text-right">
                            <div class="btn-group">
                                <button class="btn-white btn btn-xs"><?php echo Yii::t('app', 'View');?></button>
                                <button class="btn-white btn btn-xs"><?php echo Yii::t('app', 'Edit');?></button>
                                <button class="btn-white btn btn-xs"><?php echo Yii::t('app', 'Delete');?></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            546
                        </td>
                        <td>
                            <?php echo Yii::t('app', 'Alex Johnatan');?>
                        </td>
                        <td>
                            $2770.00
                        </td>
                        <td>
                            06/07/2015
                        </td>
                        <td>
                            04/08/2015
                        </td>
                        <td>
                            <span class="label label-danger"><?php echo Yii::t('app', 'Canceled');?></span>
                        </td>
                        <td class="text-right">
                            <div class="btn-group">
                                <button class="btn-white btn btn-xs"><?php echo Yii::t('app', 'View');?></button>
                                <button class="btn-white btn btn-xs"><?php echo Yii::t('app', 'Edit');?></button>
                                <button class="btn-white btn btn-xs"><?php echo Yii::t('app', 'Delete');?></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            6327
                        </td>
                        <td>
                             <?php echo Yii::t('app', 'John Smith');?>
                        </td>
                        <td>
                            $8560.00
                        </td>
                        <td>
                            01/12/2015
                        </td>
                        <td>
                            05/12/2015
                        </td>
                        <td>
                            <span class="label label-primary"> <?php echo Yii::t('app', 'Pending');?></span>
                        </td>
                        <td class="text-right">
                            <div class="btn-group">
                                <button class="btn-white btn btn-xs"><?php echo Yii::t('app', 'View');?></button>
                                <button class="btn-white btn btn-xs"><?php echo Yii::t('app', 'Edit');?></button>
                                <button class="btn-white btn btn-xs"><?php echo Yii::t('app', 'Delete');?></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            642
                        </td>
                        <td>
                            <?php echo Yii::t('app', 'Monica Smith');?>
                        </td>
                        <td>
                            $6843.00
                        </td>
                        <td>
                            10/04/2015
                        </td>
                        <td>
                            13/07/2015
                        </td>
                        <td>
                            <span class="label label-success"><?php echo Yii::t('app', 'Shipped');?></span>
                        </td>
                        <td class="text-right">
                            <div class="btn-group">
                                <button class="btn-white btn btn-xs"><?php echo Yii::t('app', 'View');?></button>
                                <button class="btn-white btn btn-xs"><?php echo Yii::t('app', 'Edit');?></button>
                                <button class="btn-white btn btn-xs"><?php echo Yii::t('app', 'Delete');?></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            7435
                        </td>
                        <td>
                           <?php echo Yii::t('app', 'Michael Zimber');?>
                        </td>
                        <td>
                            $750.00
                        </td>
                        <td>
                            04/04/2015
                        </td>
                        <td>
                            14/05/2015
                        </td>
                        <td>
                            <span class="label label-primary"><?php echo Yii::t('app', 'Pending');?></span>
                        </td>
                        <td class="text-right">
                            <div class="btn-group">
                                <button class="btn-white btn btn-xs"><?php echo Yii::t('app', 'View');?></button>
                                <button class="btn-white btn btn-xs"><?php echo Yii::t('app', 'Edit');?></button>
                                <button class="btn-white btn btn-xs"><?php echo Yii::t('app', 'Delete');?></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            324
                        </td>
                        <td>
                            <?php echo Yii::t('app', 'Sandra Smith');?>
                        </td>
                        <td>
                            $320.00
                        </td>
                        <td>
                            12/04/2015
                        </td>
                        <td>
                            21/07/2015
                        </td>
                        <td>
                            <span class="label label-warning"><?php echo Yii::t('app', 'Expired');?></span>
                        </td>
                        <td class="text-right">
                            <div class="btn-group">
                                <button class="btn-white btn btn-xs"><?php echo Yii::t('app', 'View');?></button>
                                <button class="btn-white btn btn-xs"><?php echo Yii::t('app', 'Edit');?></button>
                                <button class="btn-white btn btn-xs"><?php echo Yii::t('app', 'Delete');?></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            546
                        </td>
                        <td>
                            <?php echo Yii::t('app', 'Janet Carton');?>
                        </td>
                        <td>
                            $2770.00
                        </td>
                        <td>
                            06/07/2015
                        </td>
                        <td>
                            04/08/2015
                        </td>
                        <td>
                            <span class="label label-primary"><?php echo Yii::t('app', 'Pending');?></span>
                        </td>
                        <td class="text-right">
                            <div class="btn-group">
                                <button class="btn-white btn btn-xs"><?php echo Yii::t('app', 'View');?></button>
                                <button class="btn-white btn btn-xs"><?php echo Yii::t('app', 'Edit');?></button>
                                <button class="btn-white btn btn-xs"><?php echo Yii::t('app', 'Delete');?></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            6327
                        </td>
                        <td>
                            <?php echo Yii::t('app', 'Janet Carton');?>
                        </td>
                        <td>
                            $8560.00
                        </td>
                        <td>
                            01/12/2015
                        </td>
                        <td>
                            05/12/2015
                        </td>
                        <td>
                            <span class="label label-primary"><?php echo Yii::t('app', 'Pending');?></span>
                        </td>
                        <td class="text-right">
                            <div class="btn-group">
                                <button class="btn-white btn btn-xs"><?php echo Yii::t('app', 'View');?></button>
                                <button class="btn-white btn btn-xs"><?php echo Yii::t('app', 'Edit');?></button>
                                <button class="btn-white btn btn-xs"><?php echo Yii::t('app', 'Delete');?></button>
                            </div>
                        </td>
                    </tr>





                    <tr>
                        <td>
                            642
                        </td>
                        <td>
                           <?php echo Yii::t('app', 'John Smith');?>
                        </td>
                        <td>
                            $6843.00
                        </td>
                        <td>
                            10/04/2015
                        </td>
                        <td>
                            13/07/2015
                        </td>
                        <td>
                            <span class="label label-success"> <?php echo Yii::t('app', 'Shipped');?></span>
                        </td>
                        <td class="text-right">
                            <div class="btn-group">
                                <button class="btn-white btn btn-xs"><?php echo Yii::t('app', 'View');?></button>
                                <button class="btn-white btn btn-xs"><?php echo Yii::t('app', 'Edit');?></button>
                                <button class="btn-white btn btn-xs"><?php echo Yii::t('app', 'Delete');?></button>
                            </div>
                        </td>
                    </tr>
                    <!--===-->
                    <tr>
                        <td>
                           3214
                        </td>
                        <td>
                            <?php echo Yii::t('app', 'Janet Carton');?>
                        </td>
                        <td>
                            $500.00
                        </td>
                        <td>
                            03/04/2015
                        </td>
                        <td>
                            03/05/2015
                        </td>
                        <td>
                            <span class="label label-primary"><?php echo Yii::t('app', 'Pending');?></span>
                        </td>
                        <td class="text-right">
                            <div class="btn-group">
                                <button class="btn-white btn btn-xs"><?php echo Yii::t('app', 'View');?></button>
                                <button class="btn-white btn btn-xs"><?php echo Yii::t('app', 'Edit');?></button>
                                <button class="btn-white btn btn-xs"><?php echo Yii::t('app', 'Delete');?></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                           3214
                        </td>
                        <td>
                            <?php echo Yii::t('app', 'Janet Carton');?>
                        </td>
                        <td>
                            $500.00
                        </td>
                        <td>
                            03/04/2015
                        </td>
                        <td>
                            03/05/2015
                        </td>
                        <td>
                            <span class="label label-primary"><?php echo Yii::t('app', 'Pending');?></span>
                        </td>
                        <td class="text-right">
                            <div class="btn-group">
                                <button class="btn-white btn btn-xs"><?php echo Yii::t('app', 'View');?></button>
                                <button class="btn-white btn btn-xs"><?php echo Yii::t('app', 'Edit');?></button>
                                <button class="btn-white btn btn-xs"><?php echo Yii::t('app', 'Delete');?></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            324
                        </td>
                        <td>
                            <?php echo Yii::t('app', 'Alex Johnatan');?>
                        </td>
                        <td>
                            $320.00
                        </td>
                        <td>
                            12/04/2015
                        </td>
                        <td>
                            21/07/2015
                        </td>
                        <td>
                            <span class="label label-primary"><?php echo Yii::t('app', 'Pending');?></span>
                        </td>
                        <td class="text-right">
                            <div class="btn-group">
                                <button class="btn-white btn btn-xs"><?php echo Yii::t('app', 'View');?></button>
                                <button class="btn-white btn btn-xs"><?php echo Yii::t('app', 'Edit');?></button>
                                <button class="btn-white btn btn-xs"><?php echo Yii::t('app', 'Delete');?></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            546
                        </td>
                        <td>
                            <?php echo Yii::t('app', 'John Smith');?>
                        </td>
                        <td>
                            $2770.00
                        </td>
                        <td>
                            06/07/2015
                        </td>
                        <td>
                            04/08/2015
                        </td>
                        <td>
                            <span class="label label-primary"><?php echo Yii::t('app', 'Pending');?></span>
                        </td>
                        <td class="text-right">
                            <div class="btn-group">
                                <button class="btn-white btn btn-xs"><?php echo Yii::t('app', 'View');?></button>
                                <button class="btn-white btn btn-xs"><?php echo Yii::t('app', 'Edit');?></button>
                                <button class="btn-white btn btn-xs"><?php echo Yii::t('app', 'Delete');?></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            6327
                        </td>
                        <td>
                            <?php echo Yii::t('app', 'Alex Johnatan');?>
                        </td>
                        <td>
                            $8560.00
                        </td>
                        <td>
                            01/12/2015
                        </td>
                        <td>
                            05/12/2015
                        </td>
                        <td>
                            <span class="label label-primary"><?php echo Yii::t('app', 'Pending');?></span>
                        </td>
                        <td class="text-right">
                            <div class="btn-group">
                                <button class="btn-white btn btn-xs"><?php echo Yii::t('app', 'View');?></button>
                                <button class="btn-white btn btn-xs"><?php echo Yii::t('app', 'Edit');?></button>
                                <button class="btn-white btn btn-xs"><?php echo Yii::t('app', 'Delete');?></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            642
                        </td>
                        <td>
                            <?php echo Yii::t('app', 'Monica Smith');?>
                        </td>
                        <td>
                            $6843.00
                        </td>
                        <td>
                            10/04/2015
                        </td>
                        <td>
                            13/07/2015
                        </td>
                        <td>
                            <span class="label label-success"><?php echo Yii::t('app', 'Shipped');?></span>
                        </td>
                        <td class="text-right">
                            <div class="btn-group">
                                <button class="btn-white btn btn-xs"><?php echo Yii::t('app', 'View');?></button>
                                <button class="btn-white btn btn-xs"><?php echo Yii::t('app', 'Edit');?></button>
                                <button class="btn-white btn btn-xs"><?php echo Yii::t('app', 'Delete');?></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            7435
                        </td>
                        <td>
                            <?php echo Yii::t('app', 'Michael Zimber');?>
                        </td>
                        <td>
                            $750.00
                        </td>
                        <td>
                            04/04/2015
                        </td>
                        <td>
                            14/05/2015
                        </td>
                        <td>
                            <span class="label label-success"><?php echo Yii::t('app', 'Shipped');?></span>
                        </td>
                        <td class="text-right">
                            <div class="btn-group">
                                <button class="btn-white btn btn-xs"><?php echo Yii::t('app', 'View');?></button>
                                <button class="btn-white btn btn-xs"><?php echo Yii::t('app', 'Edit');?></button>
                                <button class="btn-white btn btn-xs"><?php echo Yii::t('app', 'Delete');?></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            3214
                        </td>
                        <td>
                            <?php echo Yii::t('app', 'Sandra Smith');?>
                        </td>
                        <td>
                            $500.00
                        </td>
                        <td>
                            03/04/2015
                        </td>
                        <td>
                            03/05/2015
                        </td>
                        <td>
                            <span class="label label-primary"><?php echo Yii::t('app', 'Pending');?></span>
                        </td>
                        <td class="text-right">
                            <div class="btn-group">
                                <button class="btn-white btn btn-xs"><?php echo Yii::t('app', 'View');?></button>
                                <button class="btn-white btn btn-xs"><?php echo Yii::t('app', 'Edit');?></button>
                                <button class="btn-white btn btn-xs"><?php echo Yii::t('app', 'Delete');?></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            324
                        </td>
                        <td>
                            <?php echo Yii::t('app', 'Janet Carton');?>
                        </td>
                        <td>
                            $320.00
                        </td>
                        <td>
                            12/04/2015
                        </td>
                        <td>
                            21/07/2015
                        </td>
                        <td>
                            <span class="label label-primary"><?php echo Yii::t('app', 'Pending');?></span>
                        </td>
                        <td class="text-right">
                            <div class="btn-group">
                                <button class="btn-white btn btn-xs"><?php echo Yii::t('app', 'View');?></button>
                                <button class="btn-white btn btn-xs"><?php echo Yii::t('app', 'Edit');?></button>
                                <button class="btn-white btn btn-xs"><?php echo Yii::t('app', 'Delete');?></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            546
                        </td>
                        <td>
                            <?php echo Yii::t('app', 'Alex Johnatan');?>
                        </td>
                        <td>
                            $2770.00
                        </td>
                        <td>
                            06/07/2015
                        </td>
                        <td>
                            04/08/2015
                        </td>
                        <td>
                            <span class="label label-danger"><?php echo Yii::t('app', 'Canceled');?></span>
                        </td>
                        <td class="text-right">
                            <div class="btn-group">
                                <button class="btn-white btn btn-xs"><?php echo Yii::t('app', 'View');?></button>
                                <button class="btn-white btn btn-xs"><?php echo Yii::t('app', 'Edit');?></button>
                                <button class="btn-white btn btn-xs"><?php echo Yii::t('app', 'Delete');?></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            6327
                        </td>
                        <td>
                             <?php echo Yii::t('app', 'John Smith');?>
                        </td>
                        <td>
                            $8560.00
                        </td>
                        <td>
                            01/12/2015
                        </td>
                        <td>
                            05/12/2015
                        </td>
                        <td>
                            <span class="label label-primary"> <?php echo Yii::t('app', 'Pending');?></span>
                        </td>
                        <td class="text-right">
                            <div class="btn-group">
                                <button class="btn-white btn btn-xs"><?php echo Yii::t('app', 'View');?></button>
                                <button class="btn-white btn btn-xs"><?php echo Yii::t('app', 'Edit');?></button>
                                <button class="btn-white btn btn-xs"><?php echo Yii::t('app', 'Delete');?></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            642
                        </td>
                        <td>
                            <?php echo Yii::t('app', 'Monica Smith');?>
                        </td>
                        <td>
                            $6843.00
                        </td>
                        <td>
                            10/04/2015
                        </td>
                        <td>
                            13/07/2015
                        </td>
                        <td>
                            <span class="label label-success"><?php echo Yii::t('app', 'Shipped');?></span>
                        </td>
                        <td class="text-right">
                            <div class="btn-group">
                                <button class="btn-white btn btn-xs"><?php echo Yii::t('app', 'View');?></button>
                                <button class="btn-white btn btn-xs"><?php echo Yii::t('app', 'Edit');?></button>
                                <button class="btn-white btn btn-xs"><?php echo Yii::t('app', 'Delete');?></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            7435
                        </td>
                        <td>
                           <?php echo Yii::t('app', 'Michael Zimber');?>
                        </td>
                        <td>
                            $750.00
                        </td>
                        <td>
                            04/04/2015
                        </td>
                        <td>
                            14/05/2015
                        </td>
                        <td>
                            <span class="label label-primary"><?php echo Yii::t('app', 'Pending');?></span>
                        </td>
                        <td class="text-right">
                            <div class="btn-group">
                                <button class="btn-white btn btn-xs"><?php echo Yii::t('app', 'View');?></button>
                                <button class="btn-white btn btn-xs"><?php echo Yii::t('app', 'Edit');?></button>
                                <button class="btn-white btn btn-xs"><?php echo Yii::t('app', 'Delete');?></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            324
                        </td>
                        <td>
                            <?php echo Yii::t('app', 'Sandra Smith');?>
                        </td>
                        <td>
                            $320.00
                        </td>
                        <td>
                            12/04/2015
                        </td>
                        <td>
                            21/07/2015
                        </td>
                        <td>
                            <span class="label label-warning"><?php echo Yii::t('app', 'Expired');?></span>
                        </td>
                        <td class="text-right">
                            <div class="btn-group">
                                <button class="btn-white btn btn-xs"><?php echo Yii::t('app', 'View');?></button>
                                <button class="btn-white btn btn-xs"><?php echo Yii::t('app', 'Edit');?></button>
                                <button class="btn-white btn btn-xs"><?php echo Yii::t('app', 'Delete');?></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            546
                        </td>
                        <td>
                            <?php echo Yii::t('app', 'Janet Carton');?>
                        </td>
                        <td>
                            $2770.00
                        </td>
                        <td>
                            06/07/2015
                        </td>
                        <td>
                            04/08/2015
                        </td>
                        <td>
                            <span class="label label-primary"><?php echo Yii::t('app', 'Pending');?></span>
                        </td>
                        <td class="text-right">
                            <div class="btn-group">
                                <button class="btn-white btn btn-xs"><?php echo Yii::t('app', 'View');?></button>
                                <button class="btn-white btn btn-xs"><?php echo Yii::t('app', 'Edit');?></button>
                                <button class="btn-white btn btn-xs"><?php echo Yii::t('app', 'Delete');?></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            6327
                        </td>
                        <td>
                            <?php echo Yii::t('app', 'Janet Carton');?>
                        </td>
                        <td>
                            $8560.00
                        </td>
                        <td>
                            01/12/2015
                        </td>
                        <td>
                            05/12/2015
                        </td>
                        <td>
                            <span class="label label-primary"><?php echo Yii::t('app', 'Pending');?></span>
                        </td>
                        <td class="text-right">
                            <div class="btn-group">
                                <button class="btn-white btn btn-xs"><?php echo Yii::t('app', 'View');?></button>
                                <button class="btn-white btn btn-xs"><?php echo Yii::t('app', 'Edit');?></button>
                                <button class="btn-white btn btn-xs"><?php echo Yii::t('app', 'Delete');?></button>
                            </div>
                        </td>
                    </tr>



                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="7">
                            <ul class="pagination pull-right"></ul>
                        </td>
                    </tr>
                    </tfoot>
                </table>

            </div>
        </div>
    </div>
</div>
<!-- FooTable -->
    <script src="js/plugins/footable/footable.all.min.js"></script>

<!-- Page-Level Scripts -->
<script>
    $(document).ready(function() {
        $('.btn-group button:first-child').click(function(event) {
            window.location.href='index.php?r=demo/order-detail';
        });
        $('.footable').footable();

        $('#date_added').datepicker({
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            calendarWeeks: true,
            autoclose: true
        });

        $('#date_modified').datepicker({
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            calendarWeeks: true,
            autoclose: true
        });

    });

</script>