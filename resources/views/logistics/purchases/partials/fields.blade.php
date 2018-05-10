					<div class="form-group form-group-sm">
						{!! Form::label('txtcompany','Compañía:', ['class'=>'col-sm-2 control-label']) !!}
						<div class="col-sm-4">
							{!! Form::hidden('company_id', null, ['id'=>'company_id']) !!}
							{!! Form::hidden('is_import', null, ['id'=>'is_import']) !!}
							{!! Form::text('company', ((isset($model->company_id)) ? $model->company->company_name : null), ['class'=>'form-control', 'id'=>'txtCompany', 'required']) !!}
						</div>
						{!! Form::label('dam','DAM:', ['class'=>'col-sm-2 control-label dam']) !!}
						<div class="col-sm-2">
							{!! Form::text('dam', null, ['class'=>'form-control uppercase dam', 'placeholder'=>'DAM']) !!}
						</div>
					</div>
					<div class="form-group form-group-sm">
						{!! Form::label('date','Fecha', ['class'=>'col-sm-2 control-label']) !!}
						<div class="col-sm-2">
							{!! Form::date('date', null, ['class'=>'form-control col-sm-2']) !!}
						</div>
						{!! Form::label('document_type_id','Documento', ['class'=>'col-sm-2 control-label']) !!}
						<div class="col-sm-2">
							{!! Form::select('document_type_id',$document_types , null, ['class'=>'form-control col-sm-1']) !!}
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
						{!! Form::label('dispatch_note_number','Numero Guía', ['class'=>'col-sm-2 control-label']) !!}
						<div class="col-sm-2">
							{!! Form::text('dispatch_note_number', null, ['class'=>'form-control uppercase', 'placeholder'=>'Número Guía']) !!}
						</div>
					</div>
					<div class="form-group form-group-sm">
						{!! Form::label('currency_id','Moneda', ['class'=>'col-sm-2 control-label']) !!}
						<div class="col-sm-2">
							{!! Form::select('currency_id',$currencies , 2, ['class'=>'form-control col-sm-1']) !!}
						</div>
						{!! Form::label('exchange','Tipo de Cambio', ['class'=>'col-sm-2 control-label']) !!}
						<div class="col-sm-2">
							{!! Form::text('exchange', null, ['class'=>'form-control col-sm-2']) !!}
						</div>
					</div>
					<div class="form-group form-group-sm">
						{!! Form::label('payment_condition_id','Condición de Pago', ['class'=>'col-sm-2 control-label']) !!}
						<div class="col-sm-2">
							{!! Form::select('payment_condition_id',$payment_conditions , 1, ['class'=>'form-control col-sm-1']) !!}
						</div>
						{!! Form::label('due_date','Vencimiento', ['class'=>'col-sm-2 control-label due_date']) !!}
						<div class="col-sm-2 due_date">
							{!! Form::date('due_date', null, ['class'=>'form-control']) !!}
						</div>
					</div>
					<div class="expenses">
						<div class="form-group form-group-sm">
							{!! Form::label('expenses[0][value]','Gastos FOB', ['class'=>'col-sm-2 control-label']) !!}
							<div class="col-sm-2">
								{!! Form::hidden('expenses[0][name]', 'fob') !!}
								{!! Form::text('expenses[0][value]', ((isset($model->expenses[0]['value'])) ? $model->expenses[0]['value'] : 0.00), ['class'=>'form-control expense text-right', 'id'=>'e1']) !!}
							</div>
							{!! Form::label('expenses[1][value]','Flete', ['class'=>'col-sm-2 control-label']) !!}
							<div class="col-sm-2">
								{!! Form::hidden('expenses[1][name]', 'flete') !!}
								{!! Form::text('expenses[1][value]', ((isset($model->expenses[1]['value'])) ? $model->expenses[1]['value'] : 0.00), ['class'=>'form-control expense text-right', 'id'=>'e2']) !!}
							</div>
							{!! Form::label('expenses[2][value]','Seguro', ['class'=>'col-sm-2 control-label']) !!}
							<div class="col-sm-2">
								{!! Form::hidden('expenses[2][name]', 'seguro') !!}
								{!! Form::text('expenses[2][value]', ((isset($model->expenses[2]['value'])) ? $model->expenses[2]['value'] : 0.00), ['class'=>'form-control expense text-right', 'id'=>'e3']) !!}
							</div>
						</div>
						<div class="form-group form-group-sm">
							{!! Form::label('expenses[3][value]','Ad Valorem', ['class'=>'col-sm-2 control-label']) !!}
							<div class="col-sm-2">
								{!! Form::hidden('expenses[3][name]', 'advalorem') !!}
								{!! Form::text('expenses[3][value]', ((isset($model->expenses[3]['value'])) ? $model->expenses[3]['value'] : 0.00), ['class'=>'form-control expense text-right', 'id'=>'e4']) !!}
							</div>
							{!! Form::label('expenses[4][value]','Handling', ['class'=>'col-sm-2 control-label']) !!}
							<div class="col-sm-2">
								{!! Form::hidden('expenses[4][name]', 'handling') !!}
								{!! Form::text('expenses[4][value]', ((isset($model->expenses[4]['value'])) ? $model->expenses[4]['value'] : 0.00), ['class'=>'form-control expense text-right', 'id'=>'e5']) !!}
							</div>
							{!! Form::label('expenses[5][value]','Almacen', ['class'=>'col-sm-2 control-label']) !!}
							<div class="col-sm-2">
								{!! Form::hidden('expenses[5][name]', 'almacen') !!}
								{!! Form::text('expenses[5][value]', ((isset($model->expenses[5]['value'])) ? $model->expenses[5]['value'] : 0.00), ['class'=>'form-control expense text-right', 'id'=>'e6']) !!}
							</div>
						</div>
						<div class="form-group form-group-sm">
							{!! Form::label('expenses[6][value]','Transporte local', ['class'=>'col-sm-2 control-label']) !!}
							<div class="col-sm-2">
								{!! Form::hidden('expenses[6][name]', 'transporte') !!}
								{!! Form::text('expenses[6][value]', ((isset($model->expenses[6]['value'])) ? $model->expenses[6]['value'] : 0.00), ['class'=>'form-control expense text-right', 'id'=>'e7']) !!}
							</div>
							{!! Form::label('expenses[7][value]','Agencia de Aduanas', ['class'=>'col-sm-2 control-label']) !!}
							<div class="col-sm-2">
								{!! Form::hidden('expenses[7][name]', 'aduana') !!}
								{!! Form::text('expenses[7][value]', ((isset($model->expenses[7]['value'])) ? $model->expenses[7]['value'] : 0.00), ['class'=>'form-control expense text-right', 'id'=>'e8']) !!}
							</div>
						</div>
					</div>
					

					@include('logistics.purchases.partials.details')