<?php namespace App\Modules\Sales;

use App\Modules\Base\BaseRepo;
use App\Modules\Sales\Order;
use App\Modules\Sales\OrderDetailRepo;

class OrderRepo extends BaseRepo{

	public function getModel(){
		return new Order;
	}
	public function save($data, $id=0)
	{
		$gross_value = 0;
		$discount = 0;
		if (isset($data['details'])) {
			foreach ($data['details'] as $key => $detail) {
				$data['details'][$key]['total'] = round($detail['price']*$detail['quantity']*(100-$detail['discount']))/100;
				if (isset($detail['is_deleted'])) {
					unset($data['details'][$key]);
				} else {
					$gross_value += round($detail['price']*$detail['quantity'], 2);
					$discount += round($detail['price']*$detail['quantity']*$detail['discount'])/100;
				}
				$data['gross_value'] = $gross_value;
				$data['discount'] = $discount;
				$data['subtotal'] = $gross_value - $discount;
				$data['total'] = round(1.18*$data['subtotal'], 2);
				$data['tax'] = $data['total'] - $data['subtotal'];
			}
		}
		$model = parent::save($data, $id);
		//dd($data["details"]);
		if (isset($data['details'])) {
			$orderDetailRepo= new OrderDetailRepo;
			$orderDetailRepo->syncMany($data['details'], ['key' => 'order_id', 'value' => $model->id], 'product_id');
		}
		return $model;
	}
	public function prepareData($data)
	{
		$data['status'] = 'REGISTRADO';
		if (isset($data['approved_at'])) {
			if ($data['approved_at'] == "on") {
				$data['approved_at'] = date('Y-m-d H:i:s');
			}
			$data['status'] = 'APROBADO';
		} else {
			$data['approved_at'] = null;
		}
		if (isset($data['checked_at'])) {
			if ($data['checked_at'] == "on") {
				$data['checked_at'] = date('Y-m-d H:i:s');
			}
			$data['status'] = 'VERIFICADO';
		} else {
			$data['checked_at'] = null;
		}
		if (isset($data['invoiced_at'])) {
			if ($data['invoiced_at'] == "on") {
				$data['invoiced_at'] = date('Y-m-d H:i:s');
			}
			$data['status'] = 'FACTURADO';
		} else {
			$data['invoiced_at'] = null;
		}
		if (isset($data['sent_at'])) {
			if ($data['sent_at'] == "on") {
				$data['sent_at'] = date('Y-m-d H:i:s');
			}
			$data['status'] = 'ENVIADO';
		} else {
			$data['sent_at'] = null;
		}
		if (isset($data['canceled_at'])) {
			if ($data['canceled_at'] == "on") {
				$data['canceled_at'] = date('Y-m-d H:i:s');
			}
			$data['status'] = 'CANCELADO';
		} else {
			$data['canceled_at'] = null;
		}
		return $data;
	}
}