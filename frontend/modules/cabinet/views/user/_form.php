<?php

use common\models\User;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

if (!$model->isNewRecord) {
    $model->password_hash = '';
}
?>

<div class="user-form">
    <?php $form = ActiveForm::begin() ?>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                         <?php echo $form->field($model, 'username') ?>
                    </div>
                    <?php if (!$model->isNewRecord): ?>
                    <div class="col-6">
                        <?php echo $form->field($model, 'password')->passwordInput() ?>
                    </div>
                    <?php endif; ?>
                    <div class="col-6">
                        <?php echo $form->field($profile, 'first_name') ?>

                    </div>
                    <div class="col-6">
                        <?php echo $form->field($profile, 'last_name') ?>

                    </div>


                    <div class="col-12">
                        <?php echo $form->field($model, 'status')->dropDownList(User::statuses()) ?>
                    </div>


                </div>
                
            </div>
            <div class="card-footer">
                <?php echo Html::submitButton(Yii::t('backend', 'Save'), ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
            </div>
        </div>
    <?php ActiveForm::end() ?>
</div>
