@extends('admin.layouts.base')

@section('content')
	<table class="table">
		<thead>
			<tr>
				<td>Nombre</td>
				<td>Descripción</td>
				<td>Longitud</td>
				<td>Latitud</td>
				<td>Dirección</td>
				<td>Teléfono</td>
				<td>Facebook</td>
				<td>Estado</td>
			</tr>
			
			@foreach($lugares as $lugar)
			<tr>
				<td><a href="/epikureos/admin/lugares/{{$lugar->id}}">{{$lugar->nombre}}</a></td>
				@if($lugar->descripcion == null)
					<td><span></span></td>
				@else
					<td><span class="glyphicon glyphicon-ok"></span></td>
				@endif
				<td>{{$lugar->longitud}}</td>
				<td>{{$lugar->latitud}}</td>
				<td>{{$lugar->direccion}}</td>
				<td>{{$lugar->telefono}}</td>
				<td>{{$lugar->facebook}}</td>
				
				@if($lugar->estado == 0)
					<td><span></span></td>
				@else
					<td><span class="glyphicon glyphicon-ok"></span></td>
				@endif
			</tr>
			@endforeach
		</thead>
	</table>
@stop