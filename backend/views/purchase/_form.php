<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

use backend\models\Product;
use common\models\User;

/* @var $this yii\web\View */
/* @var $model backend\models\Purchase */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="purchase-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model,'user_id')->dropDownList(
    	ArrayHelper::map(User::find()->all(),'id','username'),
    	['prompt'=>'Select User']
    	) ?>

    <?= $form->field($model,'product_id')->dropDownList(
    	ArrayHelper::map(Product::find()->all(),'product_id','product_name'),
    	['prompt'=>'Select Product']
    	) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
