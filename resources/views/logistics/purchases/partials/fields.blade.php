					<div class="form-group form-group-sm">
						{!! Form::label('txtcompany','Compañía:', ['class'=>'col-sm-2 control-label']) !!}
						<div class="col-sm-4">
							{!! Form::hidden('company_id', null, ['id'=>'company_id']) !!}
							{!! Form::text('company', ((isset($model->company_id)) ? $model->company->company_name : null), ['class'=>'form-control', 'id'=>'txtCompany', 'required']) !!}
						</div>
						{!! Form::label('dam','DAM:', ['class'=>'col-sm-2 control-label']) !!}
						<div class="col-sm-2">
							{!! Form::text('dam', null, ['class'=>'form-control uppercase', 'placeholder'=>'DAM']) !!}
						</div>
					</div>
					<div class="form-group form-group-sm">
						{!! Form::label('date','Fecha', ['class'=>'col-sm-2 control-label']) !!}
						<div class="col-sm-2">
							{!! Form::date('date', null, ['class'=>'form-control col-sm-2']) !!}
						</div>
					</div>
					<div class="form-group form-group-sm">
						{!! Form::label('document_type_id','Documento', ['class'=>'col-sm-2 control-label']) !!}
						<div class="col-sm-2">
							{!! Form::select('document_type_id',$document_types , null, ['class'=>'form-control col-sm-1']) !!}
						</div>
						{!! Form::label('series','Serie', ['class'=>'col-sm-2 control-label']) !!}
						<div class="col-sm-1">
							{!! Form::text('series', null, ['class'=>'form-control uppercase', 'placeholder'=>'Serie']) !!}
						</div>
						{!! Form::label('number','Numero', ['class'=>'col-sm-2 control-label']) !!}
						<div class="col-sm-2">
							{!! Form::text('number', null, ['class'=>'form-control uppercase', 'placeholder'=>'Número']) !!}
						</div>
					</div>
					<div class="form-group form-group-sm">
						{!! Form::label('dispatch_note_date','Fecha Guía', ['class'=>'col-sm-2 control-label']) !!}
						<div class="col-sm-2">
							{!! Form::date('dispatch_note_date', null, ['class'=>'form-control col-sm-2']) !!}
						</div>
						{!! Form::label('dispatch_note_series','Serie Guía', ['class'=>'col-sm-2 control-label']) !!}
						<div class="col-sm-1">
							{!! Form::text('dispatch_note_series', null, ['class'=>'form-control uppercase', 'placeholder'=>'Serie Guía']) !!}
						</div>
						{!! Form::label('dispatch_note_number','Numero Guía', ['class'=>'col-sm-2 control-label']) !!}
						<div class="col-sm-2">
							{!! Form::text('dispatch_note_number', null, ['class'=>'form-control uppercase', 'placeholder'=>'Número Guía']) !!}
						</div>
					</div>
					<div class="form-group form-group-sm">
						{!! Form::label('currency_id','Moneda', ['class'=>'col-sm-2 control-label']) !!}
						<div class="col-sm-2">
							{!! Form::select('currency_id',$currencies , null, ['class'=>'form-control col-sm-1']) !!}
						</div>
						{!! Form::label('exchange','Tipo de Cambio', ['class'=>'col-sm-2 control-label']) !!}
						<div class="col-sm-2">
							{!! Form::text('exchange', null, ['class'=>'form-control col-sm-2']) !!}
						</div>
					</div>
					<div class="form-group form-group-sm">
						{!! Form::label('payment_condition_id','Condición de Pago', ['class'=>'col-sm-2 control-label']) !!}
						<div class="col-sm-2">
							{!! Form::select('payment_condition_id',$payment_conditions , null, ['class'=>'form-control col-sm-1']) !!}
						</div>
						{!! Form::label('due_date','Vencimiento', ['class'=>'col-sm-2 control-label']) !!}
						<div class="col-sm-2">
							{!! Form::date('due_date', null, ['class'=>'form-control']) !!}
						</div>
					</div>
					<div class="expenses">
						<div class="form-group form-group-sm">
							{!! Form::label('currency_id','Gastos FOB', ['class'=>'col-sm-2 control-label']) !!}
							<div class="col-sm-2">
								{!! Form::text('value', null, ['class'=>'form-control expense text-right', 'placeholder'=>'Monto', 'id'=>'e1']) !!}
							</div>
						</div>
						<div class="form-group form-group-sm">
							{!! Form::label('currency_id','Flete', ['class'=>'col-sm-2 control-label']) !!}
							<div class="col-sm-2">
								{!! Form::text('value', null, ['class'=>'form-control expense text-right', 'placeholder'=>'Monto', 'id'=>'e2']) !!}
							</div>
						</div>
						<div class="form-group form-group-sm">
							{!! Form::label('currency_id','Seguro', ['class'=>'col-sm-2 control-label']) !!}
							<div class="col-sm-2">
								{!! Form::text('value', null, ['class'=>'form-control expense text-right', 'placeholder'=>'Monto', 'id'=>'e3']) !!}
							</div>
						</div>
						<div class="form-group form-group-sm">
							{!! Form::label('currency_id','Ad Valorem', ['class'=>'col-sm-2 control-label']) !!}
							<div class="col-sm-2">
								{!! Form::text('value', null, ['class'=>'form-control expense text-right', 'placeholder'=>'Monto', 'id'=>'e4']) !!}
							</div>
						</div>
						<div class="form-group form-group-sm">
							{!! Form::label('currency_id','Handling', ['class'=>'col-sm-2 control-label']) !!}
							<div class="col-sm-2">
								{!! Form::text('value', null, ['class'=>'form-control expense text-right', 'placeholder'=>'Monto', 'id'=>'e5']) !!}
							</div>
						</div>
						<div class="form-group form-group-sm">
							{!! Form::label('currency_id','Almacen', ['class'=>'col-sm-2 control-label']) !!}
							<div class="col-sm-2">
								{!! Form::text('value', null, ['class'=>'form-control expense text-right', 'placeholder'=>'Monto', 'id'=>'e6']) !!}
							</div>
						</div>
						<div class="form-group form-group-sm">
							{!! Form::label('currency_id','Transporte local', ['class'=>'col-sm-2 control-label']) !!}
							<div class="col-sm-2">
								{!! Form::text('value', null, ['class'=>'form-control expense text-right', 'placeholder'=>'Monto', 'id'=>'e7']) !!}
							</div>
						</div>
						<div class="form-group form-group-sm">
							{!! Form::label('currency_id','Agencia de Aduanas', ['class'=>'col-sm-2 control-label']) !!}
							<div class="col-sm-2">
								{!! Form::text('value', null, ['class'=>'form-control expense text-right', 'placeholder'=>'Monto', 'id'=>'e8']) !!}
							</div>
						</div>
					</div>
					

					@include('logistics.purchases.partials.details')