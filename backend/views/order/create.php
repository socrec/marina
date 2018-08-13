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

    <div class="panel panel-info">
        <div class="panel-heading">
            <?php echo $this->title ?>
        </div>
        <div class="panel-body">
            <div class="col-md-12">
                <!-- Tab panes -->
                <div>
<!--                    --><?//= $form->field($model, 'total') ?>
<!--                    --><?//= $form->field($model, 'shipping_fee') ?>
                    <?= $form->field($model, 'customer_name') ?>
                    <?= $form->field($model, 'customer_phone') ?>
                    <?= $form->field($model, 'customer_facebook') ?>
                    <?= $form->field($model, 'customer_address') ?>
<!--                    --><?//= $form->field($model, 'customer_ward') ?>
<!--                    --><?//= $form->field($model, 'customer_district') ?>
<!--                    --><?//= $form->field($model, 'customer_city') ?>
                    <?= $form->field($model, 'memo')->textarea() ?>
                </div>
                <div class="form-group">
                    <?= Html::submitButton('Tạo mới', ['class' => 'btn btn-success']) ?>
                </div>
            </div>
        </div>
    </div>
    <?php ActiveForm::end() ?>
</div>
