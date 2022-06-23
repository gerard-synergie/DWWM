<?php
namespace app\data;

use \app\models\Invoice;
use \app\models\Customer;

class InvoiceReportProvider extends \yii\data\ArrayDataProvider
{
	/**
     * Initialize the dataprovider by filling allModels
     */
    public function init()
    {
        //Get all invoices with their customer
	    $query = Invoice::find()->with('customer');
		foreach($query->all() as $invoice) {
			//Add rows with the name of customers 
			$this->allModels[] = [
            'id_invoice' => 'Id Invoice',
            'date' => 'Date',
            'summary' => 'Summary',
            'fk_customer' => 'Fk Customer',
			Customer::find()->where(['id_customer' => 'fk_customer'])->one()->lastname => 'Nom',

            //$user = User::find()->where(['name' => 'CeBe'])->one();
				
			];
		}
	}
}