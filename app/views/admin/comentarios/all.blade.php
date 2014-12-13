@extends('admin.layouts.base')

@section('content')
	<table class="table table-hover table-bordered table-striped">
		<thead>
			<tr>
				<th>ID</th>
				<th>Comentario</th>
			</tr>
		</thead>
		<tbody>
			@foreach($comentarios as $comentario)
			<tr>
				<td>{{$comentario->id}}</td>
				<td>{{$comentario->comment}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>

	<div class="row">
    	{{$comentarios->links()}}
    </div>
@stop