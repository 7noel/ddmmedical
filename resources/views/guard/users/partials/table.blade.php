					<table class="table table-hover table-condensed">
						<thead>
							<tr>
								<th>#</th>
								<th>Usuario</th>
								<th>Email</th>
								<th>Super Usuario</th>
								<th>Acciones</th>
							</tr>
						</thead>
						<tbody>
							@foreach($models as $model)
							<tr data-id="{{ $model->id }}">
								<td>{{ $model->id }}</td>
								<td>{{ $model->name }} </td>
								<td>{{ $model->email }} </td>
								<td align="center">
									@if($model->is_superuser)
									{!! config('options.icons.check') !!}
									@endif
								</td>
								<td>
									<a href="{{ route( $routes['edit'] , $model) }}" class="btn btn-primary btn-xs" title="Editar">{!! config('options.icons.edit') !!}</a>
									<a href="#" class="btn-delete btn btn-danger btn-xs" title="Eliminar">{!! config('options.icons.remove') !!}</a>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>