<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\InvoiceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Invoices';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="invoice-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Invoice', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_invoice',
            'date',
            'summary',
            'fk_customer',
          //  'parent_host_id.name',
        [
            'label' => 'Name',
            'value' => 'customer.lastname',
        ],
            [
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, app\models\Invoice $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_invoice' => $model->id_invoice]);
                 }
            ],
        ],
    ]); ?>


</div>
