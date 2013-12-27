@extends('admin.layouts.base')

@section('content')
	
	<div class="row">
		<div class="col-lg-3">
			@if(!isset($etiqueta))
				{{Form::open(array('method' => 'POST', 'url' => '/admin/etiquetas/add', 'role' => 'form'))}}

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
					<p>{{Form::submit('Crear etiqueta', array('class' => 'btn btn-default'))}}</p>
				</div>

				{{Form::close()}}
			@else
				{{Form::open(array('method' => 'POST', 'url' => '/admin/etiquetas/edit/'.$etiqueta->id, 'role' => 'form'))}}

				<div class="form-group">
					{{Form::label('Slug')}}
					{{Form::text('slug', $etiqueta->slug, array('class' => 'form-control'))}}
					<span class="help-block">{{ $errors->first('slug') }}</span>
				</div>

				<div class="form-group">
					{{Form::label('Descripcion')}}
					{{Form::text('descripcion', $etiqueta->descripcion, array('class' => 'form-control'))}}
					<span class="help-block">{{ $errors->first('descripcion') }}</span>
				</div>

				<div class="form-group">
					<p>{{Form::submit('Modificar etiqueta', array('class' => 'btn btn-default'))}}</p>
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
					@foreach($etiquetas as $cat)
					<tr>
						<td>{{$cat->slug}}</td>
						<td>{{$cat->descripcion}}</td>
						<td>
							<a href="/epikureos/admin/etiquetas/edit/{{$cat->id}}" class="btn btn-default">
							<span class="glyphicon glyphicon-edit"></span> Editar
							</a>
							<a href="/epikureos/admin/etiquetas/delete/{{$cat->id}}" class="btn btn-default">
							<span class="glyphicon glyphicon-remove"></span> Eliminar
							</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>

@stop