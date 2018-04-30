					<div class="form-group  form-group-sm">
						{!! Form::label('note','Nro. Nota', ['class'=>'col-sm-2 control-label']) !!}
						<div class="col-sm-2">
						{!! Form::text('note', null, ['class'=>'form-control uppercase']) !!}
						</div>
						{!! Form::label('payment_condition_id','Condición', ['class'=>'col-sm-1 control-label']) !!}
						<div class="col-sm-2">
						{!! Form::select('payment_condition_id', $payment_conditions, ((isset($model->payment_condition_id)) ? $model->payment_condition_id : null),['class'=>'form-control', 'id'=>'lstPaymentCondition']); !!}
						</div>
						{!! Form::label('currency_id','Moneda', ['class'=>'col-sm-1 control-label']) !!}
						<div class="col-sm-2">
						{!! Form::select('currency_id', $currencies, ((isset($model->currency_id)) ? $model->currency_id : 1),['class'=>'form-control', 'id'=>'lstCurrency']); !!}
						</div>
					</div>
					<div class="form-group  form-group-sm">
						{!! Form::label('txtcompany','Compañía:', ['class'=>'col-sm-2 control-label']) !!}
						<div class="col-sm-4">
							{!! Form::hidden('company_id', null, ['id'=>'company_id']) !!}
							{!! Form::text('company', ((isset($model->company_id)) ? $model->company->company_name : null), ['class'=>'form-control', 'id'=>'txtCompany', 'required']) !!}
						</div>
						{!! Form::label('txtSeller','Vendedor', ['class'=>'col-sm-2 control-label']) !!}
						<div class="col-sm-4">
						{!! Form::select('seller_id', $sellers, ((isset($model->seller_id)) ? $model->seller_id : null),['class'=>'form-control', 'id'=>'lstSeller']); !!}
						</div>
					</div>
					<div class="form-group form-group-sm">
						{!! Form::label('comment','Comentarios', ['class'=>'col-sm-2 control-label']) !!}
						<div class="col-sm-10">
						{!! Form::text('comment', null, ['class'=>'form-control uppercase']) !!}
						</div>
					</div>
					<div class="form-group form-group-sm">
						{!! Form::label('status','Status:', ['class'=>'col-sm-2 control-label']) !!}
						<div class="col-sm-8 status-checked">
							<label class="checkbox-inline">
								{!! Form::checkbox('approved_at', (isset($model)) ? $model->approved_at : "on") !!} Aprobado
							</label>
							<label class="checkbox-inline">
								{!! Form::checkbox('checked_at', (isset($model)) ? $model->checked_at : "on") !!} Verificado
							</label>
							<label class="checkbox-inline">
								{!! Form::checkbox('invoiced_at', (isset($model)) ? $model->invoiced_at : "on") !!} Facturado
							</label>
							<label class="checkbox-inline">
								{!! Form::checkbox('sent_at', (isset($model)) ? $model->sent_at : "on") !!} Enviado
							</label>
							<label class="checkbox-inline">
								{!! Form::checkbox('canceled_at', (isset($model)) ? $model->canceled_at : "on") !!} Cancelado
							</label>
						</div>
					</div>
					@include('sales.orders.partials.details')