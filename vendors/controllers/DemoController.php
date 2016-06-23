<?php

namespace backend\controllers;

use Yii;
use backend\models\Product;
use backend\models\search\Product as ProductSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class DemoController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }
    public function actionIndex(){
         return $this->render('index');
    }
    public function actionVendors() {
        return $this->render('vendors');
    }
    public function actionOrders() {
        return $this->render('orders');
    }
    public function actionOrderDetail() {
        return $this->render('order-detail');
    }
    public function actionHotel() {
        return $this->render('hotel');
    }
   
}
