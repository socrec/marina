<?php

/* @var $this yii\web\View */

use yii\helpers\Url;
use yii\grid\GridView;
use yii\helpers\Html;

$this->title = 'Đơn Hàng';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="order-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Tạo đơn', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <div class="row">
        <div class="col-md-12">

            <?php
            echo GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    [
                        'format' => 'raw',
                        'attribute' => 'customer_name'
                    ],
                    [
                        'format' => 'raw',
                        'attribute' => 'customer_phone'
                    ],
                    [
                        'format' => 'raw',
                        'attribute' => 'customer_address'
                    ],
                    [
                        'format' => 'raw',
                        'attribute' => 'memo'
                    ],
                    [
                        'class' => 'yii\grid\ActionColumn',
                    ]
                ],
            ]);
            ?>
        </div>
    </div>
</div>

