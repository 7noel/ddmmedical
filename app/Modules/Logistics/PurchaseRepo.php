<?php namespace App\Modules\Logistics;

use App\Modules\Base\BaseRepo;
use App\Modules\Logistics\Purchase;
use App\Modules\Logistics\PurchaseDetailRepo;
use App\Modules\Base\ExpenseRepo;

class PurchaseRepo extends BaseRepo{

	public function getModel(){
		return new Purchase;
	}
	public function index($filter = false, $search = false)
	{
		if ($filter and $search) {
			return Purchase::$filter($search)->with('company', 'document_type', 'payment_condition', 'currency', 'purchase_details')->orderBy("$filter", 'ASC')->paginate();
		} else {
			return Purchase::orderBy('id', 'DESC')->with('company', 'document_type', 'payment_condition', 'currency', 'purchase_details')->paginate();
		}
	}
	/*public function prepareData($data)
	{
		if (isset($data['purchase_details'])) {
			foreach ($data['purchase_details'] as $key => $value) {
				$data['purchase_details'][$key]['total'] = $data['purchase_details'][$key]['price'] * $data['purchase_details'][$key]['quantity'] * (100- $data['purchase_details'][$key]['discount']) / 100;
			}
		}
		return $data;
	}*/
	public function save($data, $id=0)
	{
		$gross_value = 0;
		$expenses = 0;
		$expenseCif = 0;
		if (isset($data['expenses'])) {
			foreach ($data['expenses'] as $key => $expense) {
				if ($key < 3) {
					$expenseCif += $expense['value'];
				}
				$expenses += $expense['value'];
				$data['expenses'][$key]['currency_id'] = 2;
			}
		}
		//dd($data['expenses']);
		if (isset($data['details'])) {
			foreach ($data['details'] as $key => $detail) {
				if (!isset($detail['is_deleted'])) {
					if (!isset($detail['discount'])) {
						$detail['discount'] = 0;
					}
					$data['details'][$key]['total'] = round($detail['price']*$detail['quantity']*(100-$detail['discount']))/100;
					$gross_value += $data['details'][$key]['total'];
				}
			}
		}
		//cacular factor
		$factor = 1;
		if ($gross_value>0) {
			$factor = ($gross_value + $expenses) / $gross_value;
		}
		if (isset($data['details'])) {
			foreach ($data['details'] as $key => $detail) {
				if (!isset($detail['is_deleted'])) {
					$data['cost'] = round(($detail['price']*$factor), 2);
				}
			}
		}
		$data['gross_value'] = $gross_value;
		$data['subtotal'] = $gross_value + $expenseCif;
		$data['total'] = round(1.18*$data['subtotal'], 2);
		$data['tax'] = $data['total'] - $data['subtotal'];

		$model = parent::save($data, $id);
		if (isset($data['details'])) {
			$detailRepo= new PurchaseDetailRepo;
			$detailRepo->syncMany($data['details'], ['key' => 'purchase_id', 'value' => $model->id], 'product_id');
		}
		if (isset($data['expenses'])) {
			$expenseRepo= new ExpenseRepo;
			$expenseRepo->syncMany($data['expenses'], ['key'=>'expense_id', 'value'=>$model->id], 'name', ['key'=>'expense_type', 'value' => $model->getMorphClass()]);
		}
		return $model;
	}
}