					<table class="table table-hover table-condensed">
						<thead>
							<tr>
								<th>#</th>
								<th>Nombre</th>
								<th>Descripción</th>
								<th>Categoría</th>
								<th>Acciones</th>
							</tr>
						</thead>
						<tbody>
							@foreach($models as $model)
							<tr data-id="{{ $model->id }}">
								<td>{{ $model->id }}</td>
								<td>{{ $model->name }} </td>
								<td>{{ $model->description }} </td>
								<td> {{ $model->category->name }} </td>
								<td>
									<a href="{{ route( $routes['edit'] , $model) }}" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar</a>
									<a href="#" class="btn-delete btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Eliminar</a>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>