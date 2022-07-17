<?php

use common\grid\EnumColumn;
use common\models\User;
use kartik\date\DatePicker;
use yii\helpers\Html;
use yii\grid\GridView;
use rmrevin\yii\fontawesome\FAS;

/**
 * @var yii\web\View $this
 * @var backend\models\search\UserSearch $searchModel
 * @var yii\data\ActiveDataProvider $dataProvider
 */
$this->title = Yii::t('backend', 'Companies');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="card">
    <div class="card-header">
        <?php echo Html::a(Yii::t('backend', 'Add New company', [
            'modelClass' => 'User',
        ]), ['create'], ['class' => 'btn btn-success']) ?>
    </div>

    <div class="card-body p-0">
        <?php echo GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'layout' => "{items}\n{pager}",
            'options' => [
                'class' => ['gridview', 'table-responsive'],
            ],
            'tableOptions' => [
                'class' => ['table', 'text-nowrap', 'table-striped', 'table-bordered', 'mb-0'],
            ],
            'columns' => [
                [
                    'attribute' => 'id',
                    'options' => ['style' => 'width: 5%'],
                ],
                
                'username',
                'email:email',

                [
                    'attribute' => 'status',
                ],
                [
                    'attribute' => 'created_at',
                    'format' => 'datetime',
                ],
                ['class' => \yii\grid\ActionColumn::class],
            ],
        ]); ?>
    </div>


</div>
