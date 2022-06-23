<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CustomerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Customers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Customer', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_customer',
            'firstname',
            'lastname',
            'mail:ntext',
            'adress1',
            //'adress2',
            //'zipcode',
            //'town',
            [
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, app\models\Customer $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_customer' => $model->id_customer]);
                 }
            ],
        ],
    ]); ?>


</div>
