<?php

namespace app\controllers;

use yii\web\Controller;
use yii\data\Pagination;
use app\models\Invoice;


class InvoiceController extends Controller
{
    public function actionIndex()
    {
        $query = Invoice::find();

        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);

        $invoices = $query->orderBy('date')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [
            'invoices' => $invoices,
            'pagination' => $pagination,
        ]);
    }

    public function actionRecap()
    {
        $query = Invoice::find();

        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);

        $invoices = $query->orderBy('date')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [
            'invoices' => $invoices,
            'pagination' => $pagination,
        ]);
    }
}
