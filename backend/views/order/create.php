<?php

/* @var $this yii\web\View */

use yii\helpers\Url;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ListView;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;

$this->title = 'Tạo đơn';
$this->params['breadcrumbs'][] = ['label' => 'Đơn Hàng', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="order-form">
    <?php
    $form = ActiveForm::begin([
        'id' => 'customer-form',
        'action' => Url::to(['order/create']),
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
                <li role="presentation"><a href="#new-customer" role="tab" data-toggle="tab">KH mới</a></li>
            </ul>
        </div>
        <div class="panel-body">
            <div class="col-md-12">
                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="old-customer">
                        <?= $form->field($model, 'customer_id')->dropdownList([],
                            [
                                'prompt' => 'Chọn khách hàng',
                                'id' => 'customer-load'
                            ])->label('Khách Hàng') ?>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="new-customer">
                        <?= $form->field($customerModel, 'name')->label('Họ Tên') ?>
                        <?= $form->field($customerModel, 'phone')->label('Số Điện Thoại') ?>
<!--                        --><?//= $form->field($customerModel, 'facebook') ?>
                        <?= $form->field($customerModel, 'address')->label('Địa Chỉ') ?>
<!--                        --><?//= $form->field($customerModel, 'ward')->label('Phường/Xã') ?>
<!--                        --><?//= $form->field($customerModel, 'district')->label('Quận/Huyện') ?>
<!--                        --><?//= $form->field($customerModel, 'city')->label('Thành Phố') ?>
                    </div>
                </div>
                <div class="form-group">
                    <?= Html::submitButton('Tạo mới', ['class' => 'btn btn-success']) ?>
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
