					<table class="table table-hover table-condensed">
						<thead>
							<tr>
								<th>#</th>
								<th>Nombre</th>
								<th>Distrito</th>
								<th>Acciones</th>
							</tr>
						</thead>
						<tbody>
							@foreach($models as $model)
							<tr data-id="{{ $model->id }}">
								<td>{{ $model->id }}</td>
								<td>{{ $model->name }} </td>
								<td>{{ $model->ubigeo->departamento.' - '.$model->ubigeo->provincia.' - '.$model->ubigeo->distrito }} </td>
								<td>
									<a href="{{ route( $routes['edit'] , $model) }}" class="btn btn-primary btn-xs" title="Editar">{!! config('options.icons.edit') !!}</a>
									<a href="#" class="btn-delete btn btn-danger btn-xs" title="Eliminar">{!! config('options.icons.remove') !!}</a>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>