<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var backend\models\Product $model
 */

$this->title = Yii::t('app', 'Create Product');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Products'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ibox float-e-margins">

                    <div class="ibox-title">

                        <h5><?php echo Yii::t ( 'app', 'Create' ); ?><small class="m-l-sm"><?php echo Yii::t ( 'app', 'Product' ); ?></small></h5>

                        <div class="ibox-tools">

						    <a class="collapse-link">

                                <i class="fa fa-chevron-up"></i>

                            </a>

                            <a class="close-link">

                                <i class="fa fa-times"></i>

                            </a>

                        </div>

                    </div>

                    <div class="ibox-content">
							<?= $this->render('_form', [

								'model' => $model,

							]) ?>

                    </div>

                </div>
