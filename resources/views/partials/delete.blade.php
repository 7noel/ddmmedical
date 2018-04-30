{!! Form::open(['route'=>[ $routes['delete'] , $model], 'method'=>'DELETE']) !!}
	<button type="submit" class="btn btn-danger delete"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> {{ config($labels['edit'] .'.delete') }}</button>
{!! Form::close() !!}
