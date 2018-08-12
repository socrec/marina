<?php

/* @var $this yii\web\View */

use yii\helpers\Url;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ListView;
use yii\widgets\DetailView;

$this->title = str_pad($model->id, 5, '0', STR_PAD_LEFT);
$this->params['breadcrumbs'][] = ['label' => 'Đơn Hàng', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="order-view">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        &nbsp;<?= Html::a('Sửa', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Xóa', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Bạn có chắc muốn xóa đơn hàng này?',
                'method' => 'post',
            ],
        ]) ?>
        <button class="btn btn-warning pull-left " onclick="print()"><span class="glyphicon glyphicon-print"
                                                                           aria-hidden="true"></span> In Hóa Đơn
        </button>
    </p>

    <div id="print-area">
        <h2 class="text-center">
            Marina - 0935131841
        </h2>
        <h5 class="text-center">
            Địa chỉ: 192 Phan Văn Hân - Phường 17 - Quận Bình Thạnh - HCM
        </h5>
        <br>
        <?php
        echo DetailView::widget([
            'model' => $model,
            'attributes' => [
                [
                    'label' => 'Mã Đơn Hàng',
                    'format' => 'raw',
                    'value' => str_pad($model->id, 5, '0', STR_PAD_LEFT)
                ],
                'total',
                'shipping_fee',
                'customer_name',
                'customer_phone',
                'customer_facebook',
                'customer_address',
                'customer_ward',
                'customer_district',
                'customer_city',
            ],
        ]);
        ?>
    </div>
    <div>
        <?php
        echo DetailView::widget([
            'model' => $model,
            'attributes' => [
                'memo'
            ],
        ]);
        ?>
    </div>
    <script>
        //    $(function () {
        //        function print() {
        //            var mode = 'iframe'; //popup
        //            var close = mode == "popup";
        //            var options = { mode : mode, popClose : close};
        //            $("#order").printArea( { mode : 'iframe', popClose : false} );
        //        }
        //    })
    </script>
</div>