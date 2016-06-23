<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var backend\models\search\Product $searchModel
 */

$this->title = Yii::t('app', 'Hotel');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="widget yellow-bg p-lg text-center col-sm-6 col-sm-offset-3">
    <div class="m-b-md">
        <i class="fa fa-warning fa-4x"></i>
        <h3 class="font-bold no-margins">
            <?= Yii::t('app', 'Content in progress');?>..
        </h3>
    </div>
</div>