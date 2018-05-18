<?php namespace App\Http\Controllers\Sales;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Modules\Sales\OrderRepo;
use App\Modules\Finances\PaymentConditionRepo;
use App\Modules\Base\CurrencyRepo;
use App\Modules\HumanResources\EmployeeRepo;
class OrdersController extends Controller {

	protected $repo;
	protected $paymentConditionRepo;
	protected $currencyRepo;
	protected $employeeRepo;

	public function __construct(EmployeeRepo $employeeRepo, OrderRepo $repo, PaymentConditionRepo $paymentConditionRepo, CurrencyRepo $currencyRepo) {
		$this->repo = $repo;
		$this->paymentConditionRepo = $paymentConditionRepo;
		$this->currencyRepo = $currencyRepo;
		$this->employeeRepo = $employeeRepo;
	}

	public function index()
	{
		$models = $this->repo->index('name', \Request::get('name'));
		return view('partials.index',compact('models'));
	}

	public function create()
	{
		$payment_conditions = $this->paymentConditionRepo->getList();
		$currencies = $this->currencyRepo->getList('symbol');
		$sellers = $this->employeeRepo->getListSellers();
		return view('partials.create', compact('payment_conditions', 'currencies', 'sellers'));
	}

	public function store()
	{
		$this->repo->save(\Request::all());
		return \Redirect::route('orders.index');
	}

	public function show($id)
	{
		//
	}

	public function edit($id)
	{
		$model = $this->repo->findOrFail($id);
		$payment_conditions = $this->paymentConditionRepo->getList();
		$currencies = $this->currencyRepo->getList('symbol');
		$sellers = $this->employeeRepo->getListSellers();
		$details = [];
		return view('partials.edit', compact('model', 'payment_conditions', 'currencies', 'sellers'));
	}

	public function update($id)
	{
		//dd(\Request::all());
		$this->repo->save(\Request::all(), $id);
		return \Redirect::route('orders.index');
	}

	public function destroy($id)
	{
		$model = $this->repo->destroy($id);
		if (\Request::ajax()) {	return $model; }
		return redirect()->route('orders.index');
	}

	/**
	 * CREA UN PDF EN EL NAVEGADOR
	 * @param  [integer] $id [Es el id de la cotizacion]
	 * @return [pdf]     [Retorna un pdf]
	 */
	public function print($id)
	{
		$model = $this->repo->findOrFail($id);
		// dd($model);
		//return view('pdfs.order_pdf', compact('model'));
		\PDF::setOptions(['isPhpEnabled' => true]);
		$pdf = \PDF::loadView('pdfs.order_pdf', compact('model'));
		return $pdf->stream();
	}

}