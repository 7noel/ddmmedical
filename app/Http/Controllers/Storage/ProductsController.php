<?php namespace App\Http\Controllers\Storage;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Modules\Storage\UnitRepo;
use App\Modules\Storage\SizeRepo;
use App\Modules\Storage\ColorRepo;
use App\Modules\Storage\MaterialRepo;
use App\Modules\Base\UnitTypeRepo;
use App\Modules\Storage\CategoryRepo;
use App\Modules\Storage\SubCategoryRepo;
use App\Modules\Storage\ProductRepo;
use App\Modules\Storage\Product;
use App\Modules\Base\CurrencyRepo;

use App\Http\Requests\Logistics\FormProductRequest;
use App\Modules\Storage\Stock;

class ProductsController extends Controller {

	protected $repo;
	protected $categoryRepo;
	protected $subCategoryRepo;
	protected $unitRepo;
	protected $unitTypeRepo;
	protected $currencyRepo;

	public function __construct(ProductRepo $repo, SubCategoryRepo $subCategoryRepo, CategoryRepo $categoryRepo, UnitRepo $unitRepo, UnitTypeRepo $unitTypeRepo, CurrencyRepo $currencyRepo) {
		$this->repo = $repo;
		$this->categoryRepo = $categoryRepo;
		$this->subCategoryRepo = $subCategoryRepo;
		$this->unitRepo = $unitRepo;
		$this->unitTypeRepo = $unitTypeRepo;
		$this->currencyRepo = $currencyRepo;
	}

	public function index()
	{
		$models = $this->repo->index('name', \Request::get('name'));
		return view('partials.index',compact('models'));
	}

	public function create()
	{
		$sub_categories = $this->subCategoryRepo->getListGroup('category');
		$units = $this->unitRepo->getListGroup('unit_type');
		$currencies = $this->currencyRepo->getList('symbol');
		
		return view('partials.create', compact('sub_categories', 'units', 'currencies', 'sizes', 'colors', 'materials'));
	}

	public function store(FormProductRequest $request)
	{
		$this->repo->save(\Request::all());
		return \Redirect::route('products.index');
	}

	public function show($id)
	{
		//
	}

	public function edit($id)
	{
		$model = $this->repo->findOrFail($id);
		//$ac = $this->repo->findOrFail($id)->accesories;
		//$ac = Product::with('accesories.accessory')->find($id);

		//dd($ac);
		$currencies = $this->currencyRepo->getList('symbol');
		$sub_categories = $this->subCategoryRepo->getListGroup('category');
		$units = $this->unitRepo->getListGroup('unit_type');
		return view('partials.edit', compact('model', 'sub_categories', 'units', 'currencies'));
	}

	public function update($id, FormProductRequest $request)
	{
		$data = $request->all();
		$data['id']=$id;
		$data = $this->repo->prepareData($data);
		$this->repo->save($data,$id);
		//dd($data);
		return \Redirect::route('products.index');
	}

	public function destroy($id)
	{
		$model = $this->repo->destroy($id);
		if (\Request::ajax()) {	return $model; }
		return redirect()->route('products.index');
	}

	public function ajaxAutocomplete()
	{
		$term = \Input::get('term');
		ini_set('memory_limit','1024M');
		$models = $this->repo->autocomplete($term);
		$result=[];
		foreach ($models as $model) {
			$result[]=[
				'value' => $model->name,
				'id' => $model,
				'label' => $model->intern_code.'  '.$model->name
			];
		}
		return \Response::json($result);
	}

	public function ajaxAutocompleteVProducts()
	{
		$term = \Input::get('term');
		$models = $this->repo->autocomplete_vproducts($term);
		$result=[];
		foreach ($models as $model) {
			$result[]=[
				'value' => $model->name,
				'id' => $model,
				'label' => $model->code_cut.'  '.$model->name
			];
		}
		return \Response::json($result);
	}
	public function ajaxGetData($warehouse_id,$product_id)
	{
		$term = \Input::get('term');
		$result = $this->repo->ajaxGetData($warehouse_id,$product_id);
		return \Response::json($result);
	}
	public function ajaxGetById($id)
	{
		$result = $this->repo->getById($id);
		return \Response::json($result);
	}
}
