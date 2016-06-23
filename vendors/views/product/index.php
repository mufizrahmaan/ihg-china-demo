<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var backend\models\search\Product $searchModel
 */

$this->title = Yii::t('app', 'Products');
$this->params['breadcrumbs'][] = $this->title;
?>
<style type="text/css">
    .product-imitation{
        background:#fff;
    }
    .product-name{
        font-size:14px;
        white-space: nowrap;
        width: 100%;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    .product-desc{
        white-space: nowrap;
        width: 100%;
        overflow: hidden;
        text-overflow: ellipsis;
    }
</style>
<div class="row">
    <?php foreach ($products as $index => $product) {  ?>
        <div class="col-md-3">
            <div class="ibox">
                <div class="ibox-content product-box">
                     <div class="product-imitation" style="padding: 0px">
                        <img src="img/products/<?= $product->id?>.jpg" class="img-responsive">
                    </div>
                    <div class="product-desc">
                        <span class="product-price">
                            $<?= $product->price?>
                        </span>
                        <small class="text-muted"><?= Yii::t('app', $product->category)?></small>
                        <a href="index.php?r=product/product-detail" class="product-name">
                            <?= Yii::t('app', $product->product_name); ?> 
                        </a>
                        <div class="small m-t-xs product-desc">
                           <?= substr($product->description,0,30); ?>
                           <?php if(strlen($product->description) > 30) echo "..."; ?>
                        </div>
                        <div class="m-t text-righ">
                            <a href="index.php?r=product/product-detail" class="btn btn-xs btn-primary pull-left"><?= Yii::t('app', 'View');?> <i class="fa fa-long-arrow-right"></i> </a>
                            <a href="#" class="btn btn-xs btn-primary pull-right"><?= Yii::t('app', 'Add to cart');?> <i class="fa fa-cart-arrow-down"></i> </a>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
    