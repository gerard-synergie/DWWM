<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\InvoiceItemsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Invoice Items';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="invoice-items-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Invoice Items', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_item',
            'fk_part',
            'fk_invoice',
            'qty',
            'price_row',
            [
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, \app\models\InvoiceItems $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_item' => $model->id_item]);
                 }
            ],
        ],
    ]); ?>


</div>
