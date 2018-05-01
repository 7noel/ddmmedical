						<a href="#" id="btnAddProduct" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Agregar</a></td>
						@php $i=0; @endphp
						
						<table class="table table-condensed">
							<thead>
								<tr>
									<th class="col-sm-1">#</th>
									<th class="col-sm-5">Descripción</th>
									<th class="col-sm-1">Cantidad</th>
									<th class="col-sm-1">Precio</th>
									<th class="col-sm-1">Dscto(%)</th>
									<th class="col-sm-1">V.Venta</th>
									<th class="col-sm-2">Acciones</th>
								</tr>
							</thead>
							<tbody id="tableItems">
							@if(isset($model->details))
							@foreach($model->details as $detail)
								<tr data-id="{{ $detail->id }}">
									{!! Form::hidden("details[$i][id]", $detail->id, ['class'=>'detailId','data-detailId'=>'']) !!}
									{!! Form::hidden("details[$i][product_id]", $detail->product_id, ['class'=>'productId','data-productid'=>'']) !!}
									{!! Form::hidden("details[$i][unit_id]", $detail->unit_id, ['class'=>'unitId','data-unitid'=>'']) !!}
									<td><span class='form-control input-sm intern_code text-right' data-labelid>{{ $detail->product->intern_code }}</span></td>
									<td>{!! Form::text("details[$i][txtProduct]", $detail->product->name, ['class'=>'form-control input-sm txtProduct', 'data-product'=>'', 'required'=>'required', 'disabled']); !!}</td>
									<td>{!! Form::text("details[$i][quantity]", $detail->quantity, ['class'=>'form-control input-sm txtCantidad text-right', 'data-cantidad'=>'']) !!}</td>
									<td>{!! Form::text("details[$i][price]", $detail->price, ['class'=>'form-control input-sm txtPrecio text-right', 'data-precio'=>'']) !!}</td>
									<td>{!! Form::text("details[$i][discount]", $detail->discount, ['class'=>'form-control input-sm txtDscto text-right', 'data-dscto'=>'']) !!}</td>
									<td> <span class='form-control input-sm txtTotal text-right' data-total>{{ $detail->total }}</span> </td>
									<td class="text-center form-inline">
										<div class="btn-group">
											<button class="btn btn-default btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												<span class="glyphicon glyphicon-list" aria-hidden="true"></span> <span class="caret"></span>
											</button>
											<ul class="dropdown-menu select-accessory">
												@foreach($detail->product->accessories as $acc)
												<li><a href="#" data-accessoryId="{{ $acc->accessory->id }}">{{ $acc->accessory->name }}</a></li>
												@endforeach
											</ul>
										</div>
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
						<template id="template-row-item">
							<tr>
								{!! Form::hidden('data1', null, ['class'=>'productId','data-productid'=>'']) !!}
								{!! Form::hidden('data2', null, ['class'=>'unitId','data-unitid'=>'']) !!}
								<td><span class='form-control input-sm intern_code text-right' data-labelid></span></td>
								<td>{!! Form::text('data3', null, ['class'=>'form-control input-sm txtProduct', 'data-product'=>'', 'required'=>'required']); !!}</td>
								<td>{!! Form::text('data4', null, ['class'=>'form-control input-sm txtCantidad text-right', 'data-cantidad'=>'']) !!}</td>
								<td>{!! Form::text('data5', null, ['class'=>'form-control input-sm txtPrecio text-right', 'data-precio'=>'']) !!}</td>
								<td>{!! Form::text('data6', null, ['class'=>'form-control input-sm txtDscto text-right', 'data-dscto'=>'']) !!}</td>
								<td> <span class='form-control input-sm txtTotal text-right' data-total></span> </td>
								<td class="text-center form-inline">
									<div class="btn-group">
										<button class="btn btn-default btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<span class="glyphicon glyphicon-list" aria-hidden="true"></span> <span class="caret"></span>
										</button>
										<ul class="dropdown-menu select-accessory">
										</ul>
									</div>
									<div class="checkbox">
										<label><input type="checkbox" name="data7" data-isdeleted class="isdeleted"> <span class="glyphicon glyphicon-trash" aria-hidden="true"></span></label>
									</div>
								</td>
							</tr>
						</template>
						{!! Form::hidden('items', $i, ['id'=>'items']) !!}
						<table class="table table-condensed">
							<thead>
								<tr>
									<th class="text-center">V.Bruto</th>
									<th class="text-center">Dscto</th>
									<th class="text-center">SubTotal</th>
									<th class="text-center">Total</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td class="text-center"><span id="mGrossValue">{{ (isset($model)) ? $model->gross_value : "0.00" }}</span></td>
									<td class="text-center"><span id="mDiscount">{{ (isset($model)) ? $model->discount : "0.00" }}</span></td>
									<td class="text-center"><span id="mSubTotal">{{ (isset($model)) ? $model->subtotal : "0.00" }}</span></td>
									<td class="text-center"><span id="mTotal">{{ (isset($model)) ? $model->total : "0.00" }}</span></td>
								</tr>
							</tbody>
						</table>

<template id="template-li-accessory">
											<li><a href="#" data-accessoryId=""> </a></li>
</template>