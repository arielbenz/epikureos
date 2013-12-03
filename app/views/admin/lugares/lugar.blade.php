@extends('admin.layouts.base')

@section('content')

	<div class="row">
		<div class="col-lg-7">
			@if(isset($lugar))
				{{Form::open(array('method' => 'POST', 'url' => '/admin/lugares/edit/'.$lugar->id, 'role' => 'form'))}}

				<div class="form-group">
					{{Form::label('Nombre')}}
					{{Form::text('nombre', $lugar->nombre, array('class' => 'form-control'))}}
					<span class="help-block">{{ $errors->first('nombre') }}</span>
				</div>

				<div class="form-group">
					{{Form::label('Descripción')}}
					{{Form::textarea('descripcion', $lugar->descripcion, array('class' => 'form-control'))}}
					<span class="help-block">{{ $errors->first('descripcion') }}</span>
				</div>

				<div class="form-group">
					{{Form::label('longitud')}}
					{{Form::text('longitud', $lugar->longitud, array('class' => 'form-control'))}}
					<span class="help-block">{{ $errors->first('longitud') }}</span>
				</div>

				<div class="form-group">
					{{Form::label('latitud')}}
					{{Form::text('latitud', $lugar->latitud, array('class' => 'form-control'))}}
					<span class="help-block">{{ $errors->first('latitud') }}</span>
				</div>

				<div class="form-group">
					{{Form::label('dirección')}}
					{{Form::text('direccion', $lugar->direccion, array('class' => 'form-control'))}}
					<span class="help-block">{{ $errors->first('direccion') }}</span>
				</div>

				<div class="form-group">
					{{Form::label('teléfono')}}
					{{Form::text('telefono', $lugar->telefono, array('class' => 'form-control'))}}
					<span class="help-block">{{ $errors->first('telefono') }}</span>
				</div>

				<div class="form-group">
					{{Form::label('web')}}
					{{Form::text('web', $lugar->web, array('class' => 'form-control'))}}
					<span class="help-block">{{ $errors->first('web') }}</span>
				</div>

				<div class="form-group">
					{{Form::label('twitter')}}
					{{Form::text('twitter', $lugar->twitter, array('class' => 'form-control'))}}
					<span class="help-block">{{ $errors->first('twitter') }}</span>
				</div>

				<div class="form-group">
					{{Form::label('facebook')}}
					{{Form::text('facebook', $lugar->facebook, array('class' => 'form-control'))}}
					<span class="help-block">{{ $errors->first('facebook') }}</span>
				</div>

				<div class="form-group">
					{{Form::label('estado')}}
					{{Form::text('estado', $lugar->estado, array('class' => 'form-control'))}}
					<span class="help-block">{{ $errors->first('estado') }}</span>
				</div>

				<div class="form-group">
					{{Form::label('Ciudad')}}
					{{Form::select('ciudad', $ciudades, $lugar->ciudad, array('single' => 'single', 'class' => 'form-control'))}}
				</div>

				<div class="form-group">
					{{Form::label('Zona')}}
					{{Form::select('zona', $zonas, $lugar->zona, array('single' => 'single', 'class' => 'form-control'))}}
				</div>

				<div class="form-group">
					{{Form::label('Categorías')}}
					{{Form::select('categorias[]', $categorias, Lugar::enCategorias($lugar->id), array('multiple' => 'multiple', 'class' => 'form-control'))}}
				</div>

				<div class="form-group">
					<p>{{Form::submit('Modificar lugar', array('class' => 'btn btn-default'))}}</p>
				</div>

				{{Form::close()}}
			@else
				{{Form::open(array('method' => 'POST', 'url' => '/admin/lugares/add', 'role' => 'form'))}}

				<div class="form-group">
					{{Form::label('Nombre')}}
					{{Form::text('nombre', '', array('class' => 'form-control'))}}
					<span class="help-block">{{ $errors->first('nombre') }}</span>
				</div>

				<div class="form-group">
					{{Form::label('descripción')}}
					{{Form::textarea('descripcion', '', array('class' => 'form-control'))}}
					<span class="help-block">{{ $errors->first('descripcion') }}</span>
				</div>

				<div class="form-group">
					{{Form::label('longitud')}}
					{{Form::text('longitud', '', array('class' => 'form-control'))}}
					<span class="help-block">{{ $errors->first('longitud') }}</span>
				</div>

				<div class="form-group">
					{{Form::label('latitud')}}
					{{Form::text('latitud', '', array('class' => 'form-control'))}}
					<span class="help-block">{{ $errors->first('latitud') }}</span>
				</div>

				<div class="form-group">
					{{Form::label('dirección')}}
					{{Form::text('direccion', '', array('class' => 'form-control'))}}
					<span class="help-block">{{ $errors->first('direccion') }}</span>
				</div>

				<div class="form-group">
					{{Form::label('teléfono')}}
					{{Form::text('telefono', '', array('class' => 'form-control'))}}
					<span class="help-block">{{ $errors->first('telefono') }}</span>
				</div>

				<div class="form-group">
					{{Form::label('web')}}
					{{Form::text('web', '', array('class' => 'form-control'))}}
					<span class="help-block">{{ $errors->first('web') }}</span>
				</div>

				<div class="form-group">
					{{Form::label('twitter')}}
					{{Form::text('twitter', '', array('class' => 'form-control'))}}
					<span class="help-block">{{ $errors->first('twitter') }}</span>
				</div>

				<div class="form-group">
					{{Form::label('facebook')}}
					{{Form::text('facebook', '', array('class' => 'form-control'))}}
					<span class="help-block">{{ $errors->first('facebook') }}</span>
				</div>

				<div class="form-group">
					{{Form::label('Ciudad')}}
					{{Form::select('ciudad', $ciudades, array(1), array('single' => 'single', 'class' => 'form-control'))}}
				</div>

				<div class="form-group">
					{{Form::label('Zona')}}
					{{Form::select('zona', $zonas, array(1), array('single' => 'single', 'class' => 'form-control'))}}
				</div>

				<div class="form-group">
					{{Form::label('Categorías')}}
					{{Form::select('categorias[]', $categorias, array(1), array('multiple' => 'multiple', 'class' => 'form-control'))}}
				</div>

				<div class="form-group">
					<p>{{Form::submit('Añadir lugar', array('class' => 'btn btn-default'))}}</p>
				</div>

				{{Form::close()}}
			@endif

		</div>
	</div>


@stop