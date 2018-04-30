<?php 

namespace App\Modules\Storage;

use App\Modules\Base\BaseRepo;
use App\Modules\Storage\Move;
use App\Modules\Storage\StockRepo;

class MoveRepo extends BaseRepo{

	public function getModel(){
		return new Move;
	}

	/**
	 * Guarda los movimientos de los productos.
	 * @param  array  $data Array con los datos para agregar un movimientos.
	 * @param  integer $id   Es el id de un movimiento, se usara para modificar un movimiento.
	 * @return Obj        Retorna un Obj que es modelo del movimiento despues de actualizar el stock.
	 */
	public function save($data, $id=0)
	{
		$data = $this->prepareData($data);
		$stockRepo = new StockRepo;
		$st_model = $stockRepo->firstOrCreate(['id' => $data['stock_id']], $data);
		dd($st_model->getMorphClass());
		dd($data);
		//$data[''] = $st_model->id;
		/**
		 * IF: Modificar un movimiento. FOREACH: itera con el movimiento a modificar y con los posteriores.
		 * ELSE: Agregar un movimiento
		 */
		if ($id > 0) {
			$moves_before = $this->model->where('id', '>=', $id)->where('stock_id', $data['stock_id'])->orderBy('id', 'asc')->get();
			foreach ($moves_before as $key => $move_before) {
				if ($move_before->id == $id) {
					$last_stock = $move_before->stock + $move_before->output - $move_before->input;
					$q = $data['input'] - $data['output'];
					$last_avarage = $move_before->avarage_value_before;
					$v = ($data['change_value']) ? $data['value'] : $last_avarage;
				} else {
					unset($data);
					$q = $move_before->input - $move_before->output;
					$v = ($move_before->change_value) ? $move_before->value : $last_avarage;
				}
				$data['id'] = $move_before->id;
				$data = array_merge($data, $this->calcAvarage($last_stock, $last_avarage, $q, $v));
				$last_stock = $data['stock'];
				$last_avarage =	$data['avarage_value_after'];
				$model = parent::save($data, $move_before->id);
			}
		} else {
			$move_before = $this->model->where('stock_id', $data['stock_id'])->orderBy('id', 'desc')->first();
			if ($move_before) {
				$last_stock = $move_before->stock;
				$last_avarage = $move_before->avarage_value_after;
			} else {
				$last_stock = 0;
				$last_avarage = $data['value'];
			}
			
			$q = $data['input'] - $data['output'];
			$v = ($data['change_value']) ? $data['value'] : $last_avarage;
			$data = array_merge($data, $this->calcAvarage($last_stock, $last_avarage, $q, $v));
			$last_stock = $data['stock'];
			$last_avarage =	$data['avarage_value_after'];
			$model = parent::save($data, 0);
		}
		$st_model->stock = $last_stock;
		$st_model->avarage_value = $last_avarage;
		$st_model->save();
		return $model;
	}

	/**
	 * Calcula el valor promedio.
	 * @param  decimal $q0 Stock antes del movimiento.
	 * @param  decimal $v0 Valor promedio antes del movimiento.
	 * @param  decimal $q  Cantidad de unidades en el movimiento actual.
	 * @param  decimal $v  Valor del producto en el movimiento actual.
	 * @return array     Devuelve el stock, Valor Promedio antes del movimiento y Valor Promedio despues del movimiento.
	 */
	protected function calcAvarage($q0,$v0,$q,$v)
	{
		$arr['stock'] = $q0 + $q;
		$arr['avarage_value_before'] = $v0;
		$arr['avarage_value_after'] = ($q0*$v0 + $q*$v) / ($q0 + $q);
		//$arr['avarage_value_after'] = round(($q0*$v0 + $q*$v) / ($q0 + $q), 2);
		return $arr;
	}

}