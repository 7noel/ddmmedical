					<table class="table table-hover table-condensed">
						<tr>
							<th>#</th>
							<th>Fecha</th>
							<th>Empresa</th>
							<th>Estado</th>
							<th>Total</th>
							<th>Acciones</th>
						</tr>
						@foreach($models as $model)
						<tr data-id="{{ $model->id }}">
							<td>{{ $model->id }}</td>
							<td>{{ date("d/m/Y",strtotime($model->created_at)) }} </td>
							<td>{{ $model->company->company_name }} </td>
							<td>{{ $model->status }}</td>
							<td>{{ $model->currency->symbol." ".$model->total}} </td>
							<td>
								<a href="{{ route( str_replace('index', 'edit', Request::route()->getAction()['as']) , $model) }}" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar</a>
								<a href="#" class="btn-delete btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Eliminar</a>
							</td>
						</tr>
						@endforeach
					</table>