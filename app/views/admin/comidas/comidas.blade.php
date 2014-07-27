@extends('admin.layouts.base')

@section('content')
	
	<div class="row">
		<div class="col-lg-3">
			@if(!isset($comida))
				{{Form::open(array('method' => 'POST', 'url' => '/admin/comidas/add', 'role' => 'form'))}}

				<div class="form-group">
					{{Form::label('Slug')}}
					{{Form::text('slug', '', array('class' => 'form-control'))}}
					<span class="help-block">{{ $errors->first('slug') }}</span>
				</div>

				<div class="form-group">
					{{Form::label('Descripcion')}}
					{{Form::text('descripcion', '', array('class' => 'form-control'))}}
					<span class="help-block">{{ $errors->first('descripcion') }}</span>
				</div>

				<div class="form-group">
					<p>{{Form::submit('Crear comida', array('class' => 'btn btn-default'))}}</p>
				</div>

				{{Form::close()}}
			@else
				{{Form::open(array('method' => 'POST', 'url' => '/admin/comidas/edit/'.$comida->id, 'role' => 'form'))}}

				<div class="form-group">
					{{Form::label('Slug')}}
					{{Form::text('slug', $comida->slug, array('class' => 'form-control'))}}
					<span class="help-block">{{ $errors->first('slug') }}</span>
				</div>

				<div class="form-group">
					{{Form::label('Descripcion')}}
					{{Form::text('descripcion', $comida->descripcion, array('class' => 'form-control'))}}
					<span class="help-block">{{ $errors->first('descripcion') }}</span>
				</div>

				<div class="form-group">
					<p>{{Form::submit('Modificar comida', array('class' => 'btn btn-default'))}}</p>
				</div>

				{{Form::close()}}
			@endif
		</div>

		<div class="col-lg-6">
			<table class="table">
				<thead>
					<tr>
						<td>Slug</td>
						<td>Descripcion</td>
					</tr>
				</thead>
				<tbody>
					@foreach($comidas as $comida)
					<tr>
						<td>{{$comida->slug}}</td>
						<td>{{$comida->descripcion}}</td>
						<td>
							<a href="/admin/comidas/edit/{{$comida->id}}" class="btn btn-default">
							<span class="glyphicon glyphicon-edit"></span> Editar
							</a>
							<a href="/admin/comidas/delete/{{$comida->id}}" class="btn btn-default">
							<span class="glyphicon glyphicon-remove"></span> Eliminar
							</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>

@stop