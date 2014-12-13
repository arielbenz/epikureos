@extends('admin.layouts.base')

@section('content')
	<table class="table table-hover table-bordered table-striped">
		<thead>
			<tr>
				<th>ID</th>
				<th>Email</th>
				<th>Nombre</th>
				<th>Username</th>
			</tr>
		</thead>
		<tbody>
			@foreach($usuarios as $usuario)
			<tr>
				<td>{{$usuario->id}}</td>
				<td>{{$usuario->email}}</td>
				<td>{{$usuario->name}}</td>
				<td>{{$usuario->username}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>

	<div class="row">
    	{{$usuarios->links()}}
    </div>
@stop