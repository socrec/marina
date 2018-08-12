<?php

/* @var $this yii\web\View */

use yii\helpers\Url;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ListView;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;

$this->title = 'Sửa đơn: ' . str_pad($model->id, 5, '0', STR_PAD_LEFT);
$this->params['breadcrumbs'][] = ['label' => 'Đơn Hàng', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => str_pad($model->id, 5, '0', STR_PAD_LEFT), 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="order-form">
    <?php
    $form = ActiveForm::begin([
        'id' => 'customer-form',
        'action' => Url::to(['order/update', 'id' => $model->id]),
        'method' => 'POST',
    ]) ?>
<!--    <div class="panel panel-info">-->
<!--        <div class="panel-heading"><h4>Chi tiết đơn</h4></div>-->
<!--        <div class="panel-body">-->
<!--            <div class="col-md-12">-->
<!--                --><?//= $form->field($model, 'total')->label('Tiền Hàng') ?>
<!--                --><?//= $form->field($model, 'shipping_fee')->label('Phí Ship') ?>
<!--                --><?//= $form->field($model, 'memo')->textarea()->label('Ghi Chú') ?>
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->

    <div class="panel panel-info">
        <div class="panel-heading">
            <ul class="nav nav-pills" role="tablist">
                <li role="presentation" class="active"><a href="#old-customer" role="tab" data-toggle="tab">KH đã
                        tạo</a></li>
            </ul>
        </div>
        <div class="panel-body">
            <div class="col-md-12">
                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="old-customer">
                        <?= $form->field($model, 'customer_id')->dropdownList([
                            $model->customer_id => $model->customer->name
                        ],
                            [
                                'prompt' => 'Chọn khách hàng',
                                'id' => 'customer-load'
                            ])->label('Khách Hàng') ?>
                    </div>
                </div>
                <div class="form-group">
                    <?= Html::submitButton('Cập nhật', ['class' => 'btn btn-primary']) ?>
                </div>
            </div>
        </div>
    </div>
    <?php ActiveForm::end() ?>
</div>
<script>
    $(function () {
        $('#customer-load').select2({
            ajax: {
                dataType: 'json',
                url: "<?= Url::to(['customer/load']) ?>",
                minimumInputLength: 1,
                data: function (params) {
                    return {
                        term: params.term
                    }
                },
                processResults: function (data, page) {
                    return {
                        results: data
                    };
                },
            }
        });
    })
</script>
