@extends('admin.layouts.base')

@section('content')
	<table class="table table-hover table-bordered table-striped">
		<thead>
			<tr>
				<th>Nombre</th>
				<th>Descripción</th>
				<th>Dirección</th>
				<th>Teléfono</th>
				<th>Facebook</th>
				<th>Horario</th>
				<th>Estado</th>
				<th>Ciudad</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($lugares as $lugar)
			<tr>
				<td>{{$lugar->nombre}}</td>
				@if($lugar->descripcion == null)
					<td><span></span></td>
				@else
					<td><span class="glyphicon glyphicon-ok"></span></td>
				@endif
				<td>{{$lugar->direccion}}</td>
				<td>{{$lugar->telefono}}</td>
				<td>{{$lugar->facebook}}</td>
				@if($lugar->horario == null)
					<td><span></span></td>
				@else
					<td><span class="glyphicon glyphicon-ok"></span></td>
				@endif
				@if($lugar->estado == 0)
					<td><span></span></td>
				@else
					<td><span class="glyphicon glyphicon-ok"></span></td>
				@endif
				<td>{{$lugar->enCiudad($lugar->ciudad)}}</td>
				<td><a href="/admin/lugares/{{$lugar->id}}">Editar</a></td>
			</tr>
			@endforeach
		</tbody>
	</table>

	<div class="row">
    	{{$lugares->links()}}	
    </div>
@stop