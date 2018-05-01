					<div class="form-group form-group-sm">
						{!! Form::label('name','Nombre', ['class'=>'col-sm-2 control-label']) !!}
						<div class="col-sm-10">
						{!! Form::text('name', null, ['class'=>'form-control uppercase']) !!}
						</div>
					</div>
					<div class="form-group form-group-sm">
						{!! Form::label('sub_category_id','SubCategoría', ['class'=>'col-sm-2 control-label']) !!}
						<div class="col-sm-2">
						{!! Form::select('sub_category_id', $sub_categories, ((isset($model->sub_category_id)) ? $model->sub_category_id : null),['class'=>'form-control', 'id'=>'lstSubCategories']); !!}
						</div>
						{!! Form::label('unit_id','Unidad', ['class'=>'col-sm-2 control-label']) !!}
						<div class="col-sm-2">
						{!! Form::select('unit_id', $units, ((isset($model->unit_id)) ? $model->unit_id : null),['class'=>'form-control', 'id'=>'lstUnit']) !!}
						</div>
						{!! Form::label('status','Status', ['class'=>'col-sm-2 control-label']) !!}
						<div class="col-sm-2">
						{!! Form::select('status', config('options.product_status'), ((isset($model->status)) ? $model->status : null),['class'=>'form-control', 'id'=>'lstUnit']); !!}
						</div>
					</div>
					<div class="form-group form-group-sm">
						{!! Form::label('intern_code','Codigo Interno', ['class'=>'col-sm-2 control-label']) !!}
						<div class="col-sm-2">
						{!! Form::text('intern_code', null, ['class'=>'form-control uppercase']) !!}
						</div>
						{!! Form::label('provider_code','Codigo de Proveedor', ['class'=>'col-sm-2 control-label']) !!}
						<div class="col-sm-2">
						{!! Form::text('provider_code', null, ['class'=>'form-control uppercase']) !!}
						</div>
						{!! Form::label('manufacturer_code','Codigo de Fabricante', ['class'=>'col-sm-2 control-label']) !!}
						<div class="col-sm-2">
						{!! Form::text('manufacturer_code', null, ['class'=>'form-control uppercase']) !!}
						</div>
					</div>
					<div class="form-group form-group-sm">
						{!! Form::label('currency_id','Moneda', ['class'=>'col-sm-2 control-label']) !!}
						<div class="col-sm-2">
							{!! Form::select('currency_id', $currencies, null, ['class'=>'form-control']); !!}
						</div>
						{!! Form::label('name','Costo', ['class'=>'col-sm-2 control-label']) !!}
						<div class="col-sm-2">
							{!! Form::text('last_purchase', null, ['class'=>'form-control']) !!}
						</div>
						{!! Form::label('profit_margin','Utilidad (%)', ['class'=>'col-sm-2 control-label']) !!}
						<div class="col-sm-2">
						{!! Form::text('profit_margin', null, ['class'=>'form-control']) !!}
						</div>
					</div>
					<div class="form-group form-group-sm">
						{!! Form::label('price','Precio Automático', ['class'=>'col-sm-2 control-label']) !!}
						<div class="col-sm-2">
							{!! Form::text('price', null, ['class'=>'form-control']) !!}
						</div>
						{!! Form::label('price','Precio Asignado', ['class'=>'col-sm-2 control-label']) !!}
						<div class="col-sm-2">
								<div class="input-group">
									<span class="input-group-addon">
										{!! Form::checkbox('use_set_price', '1', null) !!}
									</span>
									{!! Form::text('set_price', null, ['class'=>'form-control']) !!}
								</div>
						</div>
					</div>
					<div class="form-group form-group-sm">
						{!! Form::label('description','Descripción', ['class'=>'col-sm-2 control-label']) !!}
						<div class="col-sm-10">
						{!! Form::textarea('description', null, ['class'=>'form-control', 'rows' => 3]) !!}
						</div>
					</div>

					@if(isset($model))
						@include('storage.products.partials.accordion')
					@endif
