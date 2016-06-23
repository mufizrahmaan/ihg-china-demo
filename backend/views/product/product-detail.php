<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var backend\models\Product $model
 */

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Products'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', 'Indoor access point');//$this->title;
?>
<style type="text/css">
    .image-imitation{
        background:#fff;
        padding:0px;
    }
</style>
<div class="row">
    <div class="col-lg-12">

        <div class="ibox product-detail">
            <div class="ibox-content">

                <div class="row">
                    <div class="col-md-5">


                        <div class="product-images">

                            <div>
                                <div class="image-imitation">
                                    <img src="img/products/slider1.jpg" class="img-responsive" />
                                </div>
                            </div>
                            <div>
                                <div class="image-imitation">
                                    <img src="img/products/slider2.jpg" class="img-responsive" />
                                </div>
                            </div>
                            <div>
                                <div class="image-imitation">
                                    <img src="img/products/slider3.jpg" class="img-responsive" />
                                </div>
                            </div>


                        </div>

                    </div>
                    <div class="col-md-7">

                        <h2 class="font-bold m-b-xs">
                            <?php echo Yii::t('app', 'Indoor access point');?>
                        </h2>
                        <small><?php echo Yii::t('app', 'Supplier');?> : <?php echo Yii::t('app', 'Mark Johnson');?></small>
                        <div class="m-t-md">
                            <h2 class="product-main-price">$1,340 <small class="text-muted"><?php echo Yii::t('app', 'Exclude Tax');?></small> </h2>
                        </div>
                        <hr>

                        <h4><?php echo Yii::t('app', 'Product description');?></h4>

                        <div class="small text-muted">
                            <p>&nbsp;<?php echo Yii::t('app', 'Provide highly secure and reliable wireless connections');?><br />
                            &nbsp;<?php echo Yii::t('app', 'Support the latest 802.11ac standard');?><br />
                            &nbsp;<?php echo Yii::t('app', 'Use Cisco CleanAir Technology to provide a self-optimizing network that avoids RF interference');?><br />
                            &nbsp;<?php echo Yii::t('app', 'Use Cisco ClientLink to improve reliability and coverage for existing clients');?></p>
                            <p>
                                <?php echo Yii::t('app', 'The Cisco AIR-LAP1142N-A-K9 is a business ready, indoor access point designed for simple deployment and energy efficiency. This is a dual-band, 802.11n access point with integrated antennas. It may also be ordered with a single-band 802.11g/n (2.4-GHz) radio for use in regulatory domains that do not allow 802.11a (5-GHz) operation');?>
                            </p>
                        </div>
                        <dl class="small m-t-md">
                            <dt><?php echo Yii::t('app', 'Product Code');?></dt>
                            <dd><?php echo Yii::t('app', 'P01');?></dd>
                            <dt><?php echo Yii::t('app', 'Category');?></dt>
                            <dd><?php echo Yii::t('app', 'Wireless');?></dd>
                            <dt><?php echo Yii::t('app', 'Supplier');?></dt>
                            <dd><?php echo Yii::t('app', 'Mark Johnson');?></dd>
                        </dl>
                        <hr>

                        <div>
                            <div class="btn-group">
                                <button class="btn btn-primary btn-sm"><i class="fa fa-cart-plus"></i> <?php echo Yii::t('app', 'Add to cart');?></button>
                                <button class="btn btn-white btn-sm"><i class="fa fa-star"></i> <?php echo Yii::t('app', 'Add to favourite');?> </button>
                            </div>
                        </div>



                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
<!-- slick carousel-->
<script src="js/plugins/slick/slick.min.js"></script>

<script>
    $(document).ready(function(){


        $('.product-images').slick({
            dots: true
        });

    });

</script>
