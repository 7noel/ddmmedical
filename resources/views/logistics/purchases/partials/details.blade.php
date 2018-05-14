						<a href="#" id="btnAddProduct" class="btn btn-success btn-sm pull-left"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Agregar</a> Costo Expresado en : <div class="col-xs-2">{!! Form::select('currency_id',$currencies , 2, ['class'=>'col-sm-2 form-control input-sm']) !!}</div><br> <br>
						@php $i=0; @endphp
						<div class="table-responsive">
						<table class="table table-condensed">
							<thead>
								<tr>
									<th class="col-sm-1">#</th>
									<th class="col-sm-5">Descripción</th>
									<th class="col-sm-1">Cantidad</th>
									<th class="col-sm-1">V. Unit</th>
									<th class="col-sm-1">Costo</th>
									<th class="col-sm-1 import">V. Tot</th>
									<th class="col-sm-2">Acciones</th>
								</tr>
							</thead>
							<tbody id="tableItems">
							@if(isset($model->details))
							@foreach($model->details as $detail)
								<tr data-id="{{ $detail->id }}">
									{!! Form::hidden("details[$i][id]", $detail->id, ['class'=>'detailId','data-detailId'=>'']) !!}
									{!! Form::hidden("details[$i][product_id]", $detail->id, ['class'=>'productId','data-productid'=>'']) !!}
									{!! Form::hidden("details[$i][unit_id]", $detail->unit_id, ['class'=>'unitId','data-unitid'=>'']) !!}
									<td><span class='form-control input-sm intern_code text-right' data-labelid>{{ $detail->product->intern_code }}</span></td>
									<td>{!! Form::text("details[$i][txtProduct]", $detail->product->name, ['class'=>'form-control input-sm txtProduct', 'data-product'=>'', 'required'=>'required', 'disabled']); !!}</td>
									<td>{!! Form::text("details[$i][quantity]", $detail->quantity, ['class'=>'form-control input-sm txtCantidad text-right', 'data-cantidad'=>'']) !!}</td>
									<td>{!! Form::text("details[$i][price]", $detail->price, ['class'=>'form-control input-sm txtPrecio text-right', 'data-precio'=>'']) !!}</td>
									<td>{!! Form::text("details[$i][cost]", $detail->cost, ['class'=>'form-control input-sm txtCost text-right', 'data-cost'=>'']) !!}</td>
									<td> <span class='form-control input-sm txtTotal text-right import' data-total>{{ $detail->total }}</span> </td>
									<td class="text-center form-inline">
										<div class="checkbox">
											<label><input type="checkbox" name="details[{{$i}}][is_deleted]" data-isdeleted class="isdeleted"> <span class="glyphicon glyphicon-trash" aria-hidden="true"></span></label>
										</div>
									</td>
								</tr>
								@php $i++; @endphp
							@endforeach
							@endif
							</tbody>
						</table>
						</div>
						<template id="template-row-item">
							<tr>
								{!! Form::hidden('data1', null, ['class'=>'productId','data-productid'=>'']) !!}
								{!! Form::hidden('data2', null, ['class'=>'unitId','data-unitid'=>'']) !!}
								<td><span class='form-control input-sm intern_code text-right' data-labelid></span></td>
								<td>{!! Form::text('data3', null, ['class'=>'form-control input-sm txtProduct', 'data-product'=>'', 'required'=>'required']); !!}</td>
								<td>{!! Form::text('data4', null, ['class'=>'form-control input-sm txtCantidad text-right', 'data-cantidad'=>'']) !!}</td>
								<td>{!! Form::text('data5', null, ['class'=>'form-control input-sm txtPrecio text-right', 'data-precio'=>'']) !!}</td>
								<td>{!! Form::text('data6', null, ['class'=>'form-control input-sm txtCost text-right', 'data-cost'=>'', 'readonly'=>'readonly']) !!}</td>
								<td> <span class='form-control input-sm txtTotal text-right import' data-total></span> </td>
								<td class="text-center form-inline">
									<div class="checkbox">
										<label><input type="checkbox" name="data7" data-isdeleted class="isdeleted"> <span class="glyphicon glyphicon-trash" aria-hidden="true"></span></label>
									</div>
								</td>
							</tr>
						</template>
						{!! Form::hidden('items', $i, ['id'=>'items']) !!}
						<table class="table table-condensed table-responsive">
							<thead>
								<tr>
									<th class="text-center">V.Bruto (EXW)</th>
									<th class="text-center">SubTotal (CIF)</th>
									<th class="text-center">Total (CIF+IGV)</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td class="text-center"><span id="mGrossValue">{{ (isset($model)) ? $model->gross_value : "0.00" }}</span></td>
									<td class="text-center"><span id="mSubTotal">{{ (isset($model)) ? $model->subtotal : "0.00" }}</span></td>
									<td class="text-center"><span id="mTotal">{{ (isset($model)) ? $model->total : "0.00" }}</span></td>
								</tr>
							</tbody>
						</table>