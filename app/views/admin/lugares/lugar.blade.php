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
					{{Form::label('Slug')}}
					{{Form::text('slug', $lugar->slug, array('class' => 'form-control'))}}
					<span class="help-block">{{ $errors->first('slug') }}</span>
				</div>

				<div class="form-group">
					{{Form::label('Descripción')}}
					{{Form::textarea('descripcion', $lugar->descripcion, array('class' => 'form-control'))}}
					<span class="help-block">{{ $errors->first('descripcion') }}</span>
				</div>

				<div class="form-group">
					{{Form::label('Horarios')}}
					{{Form::textarea('horario', $lugar->horario, array('class' => 'form-control'))}}
					<span class="help-block">{{ $errors->first('horario') }}</span>
				</div>

				<div class="form-group">
					{{Form::label('Longitud')}}
					{{Form::text('longitud', $lugar->longitud, array('class' => 'form-control'))}}
					<span class="help-block">{{ $errors->first('longitud') }}</span>
				</div>

				<div class="form-group">
					{{Form::label('Latitud')}}
					{{Form::text('latitud', $lugar->latitud, array('class' => 'form-control'))}}
					<span class="help-block">{{ $errors->first('latitud') }}</span>
				</div>

				<div class="form-group">
					{{Form::label('Dirección')}}
					{{Form::text('direccion', $lugar->direccion, array('class' => 'form-control'))}}
					<span class="help-block">{{ $errors->first('direccion') }}</span>
				</div>

				<div class="form-group">
					{{Form::label('Teléfono')}}
					{{Form::text('telefono', $lugar->telefono, array('class' => 'form-control'))}}
					<span class="help-block">{{ $errors->first('telefono') }}</span>
				</div>

				<div class="form-group">
					{{Form::label('Web')}}
					{{Form::text('web', $lugar->web, array('class' => 'form-control'))}}
					<span class="help-block">{{ $errors->first('web') }}</span>
				</div>

				<div class="form-group">
					{{Form::label('Twitter')}}
					{{Form::text('twitter', $lugar->twitter, array('class' => 'form-control'))}}
					<span class="help-block">{{ $errors->first('twitter') }}</span>
				</div>

				<div class="form-group">
					{{Form::label('Facebook')}}
					{{Form::text('facebook', $lugar->facebook, array('class' => 'form-control'))}}
					<span class="help-block">{{ $errors->first('facebook') }}</span>
				</div>

				<div class="form-group">
					{{Form::label('Thumb')}}
					{{Form::text('thumb', $thumb->cantidad, array('class' => 'form-control'))}}
					<span class="help-block">{{ $errors->first('thumb') }}</span>
				</div>

				<div class="form-group">
					{{Form::label('Slides')}}
					{{Form::text('slides', $slides, array('class' => 'form-control'))}}
					<span class="help-block">{{ $errors->first('slides') }}</span>
				</div>

				<div class="form-group">
					{{Form::label('Estado')}}
					{{Form::select('estado', array(0 => 'No Publicado', 1 => 'Publicado'), array($lugar->estado), array('class' => 'form-control'))}}
				</div>

				<div class="form-group">
					{{Form::label('Ciudad')}}
					{{Form::select('ciudad', $ciudades, $lugar->ciudad, array('single' => 'single', 'class' => 'form-control'))}}
				</div>

				<div class="form-group">
					{{Form::label('Mapa')}}
					{{Form::select('mapa', $mapas, $lugar->mapa_id, array('single' => 'single', 'class' => 'form-control'))}}
				</div>

				<div class="form-group">
					{{Form::label('Zona')}}
					{{Form::select('zona', $zonas, $lugar->zona, array('single' => 'single', 'class' => 'form-control'))}}
				</div>

				<div class="form-group">
					{{Form::label('Evento')}}
					{{Form::select('evento', $eventos, $lugar->evento_id, array('single' => 'single', 'class' => 'form-control'))}}
				</div>

				<div class="form-group">
					{{Form::label('Nivel')}}
					{{Form::select('nivel', $niveles, $lugar->nivel_id, array('single' => 'single', 'class' => 'form-control'))}}
				</div>

				<div class="form-group">
					{{Form::label('Promo')}}
					{{Form::select('promo', $promos, $lugar->promo_id, array('single' => 'single', 'class' => 'form-control'))}}
				</div>

				<div class="form-group">
					{{Form::label('Menú')}}
					{{Form::textarea('menu', $lugar->menu, array('class' => 'form-control'))}}
					<span class="help-block">{{ $errors->first('menu') }}</span>
				</div>

				<div class="form-group">
					{{Form::label('Categorías')}}
					{{Form::select('categorias[]', $categorias, Lugar::enCategorias($lugar->id), array('multiple' => 'multiple', 'class' => 'form-control'))}}
				</div>

				<div class="form-group">
					{{Form::label('Etiquetas')}}
					{{Form::select('etiquetas[]', $etiquetas, Lugar::enEtiquetas($lugar->id), array('multiple' => 'multiple', 'class' => 'form-control'))}}
				</div>

				<div class="form-group">
					{{Form::label('Ocasiones')}}
					{{Form::select('ocasiones[]', $ocasiones, Lugar::enOcasiones($lugar->id), array('multiple' => 'multiple', 'class' => 'form-control'))}}
				</div>

				<div class="form-group">
					{{Form::label('Comidas')}}
					{{Form::select('comidas[]', $comidas, Lugar::enComidas($lugar->id), array('multiple' => 'multiple', 'class' => 'form-control'))}}
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
					{{Form::label('Slug')}}
					{{Form::text('slug', '', array('class' => 'form-control'))}}
					<span class="help-block">{{ $errors->first('slug') }}</span>
				</div>

				<div class="form-group">
					{{Form::label('Descripción')}}
					{{Form::textarea('descripcion', '', array('class' => 'form-control'))}}
					<span class="help-block">{{ $errors->first('descripcion') }}</span>
				</div>

				<div class="form-group">
					{{Form::label('Horarios')}}
					{{Form::textarea('horario', '', array('class' => 'form-control'))}}
					<span class="help-block">{{ $errors->first('horario') }}</span>
				</div>

				<div class="form-group">
					{{Form::label('Longitud')}}
					{{Form::text('longitud', '', array('class' => 'form-control'))}}
					<span class="help-block">{{ $errors->first('longitud') }}</span>
				</div>

				<div class="form-group">
					{{Form::label('Latitud')}}
					{{Form::text('latitud', '', array('class' => 'form-control'))}}
					<span class="help-block">{{ $errors->first('latitud') }}</span>
				</div>

				<div class="form-group">
					{{Form::label('Dirección')}}
					{{Form::text('direccion', '', array('class' => 'form-control'))}}
					<span class="help-block">{{ $errors->first('direccion') }}</span>
				</div>

				<div class="form-group">
					{{Form::label('Teléfono')}}
					{{Form::text('telefono', '', array('class' => 'form-control'))}}
					<span class="help-block">{{ $errors->first('telefono') }}</span>
				</div>

				<div class="form-group">
					{{Form::label('Web')}}
					{{Form::text('web', '', array('class' => 'form-control'))}}
					<span class="help-block">{{ $errors->first('web') }}</span>
				</div>

				<div class="form-group">
					{{Form::label('Twitter')}}
					{{Form::text('twitter', '', array('class' => 'form-control'))}}
					<span class="help-block">{{ $errors->first('twitter') }}</span>
				</div>

				<div class="form-group">
					{{Form::label('Facebook')}}
					{{Form::text('facebook', '', array('class' => 'form-control'))}}
					<span class="help-block">{{ $errors->first('facebook') }}</span>
				</div>

				<div class="form-group">
					{{Form::label('Thumb')}}
					{{Form::text('thumb', '', array('class' => 'form-control'))}}
					<span class="help-block">{{ $errors->first('thumb') }}</span>
				</div>

				<div class="form-group">
					{{Form::label('Slides')}}
					{{Form::text('slides', '', array('class' => 'form-control'))}}
					<span class="help-block">{{ $errors->first('slides') }}</span>
				</div>

				<div class="form-group">
					{{Form::label('Estado')}}
					{{Form::select('estado', array(0 => 'No publicado', 1 => 'Publicado'), '', array('class' => 'form-control'))}}
				</div>

				<div class="form-group">
					{{Form::label('Ciudad')}}
					{{Form::select('ciudad', $ciudades, array(1), array('single' => 'single', 'class' => 'form-control'))}}
				</div>

				<div class="form-group">
					{{Form::label('Mapa')}}
					{{Form::select('mapa', $mapas, array(1), array('single' => 'single', 'class' => 'form-control'))}}
				</div>

				<div class="form-group">
					{{Form::label('Zona')}}
					{{Form::select('zona', $zonas, array(1), array('single' => 'single', 'class' => 'form-control'))}}
				</div>

				<div class="form-group">
					{{Form::label('Evento')}}
					{{Form::select('evento', $eventos, array(1), array('single' => 'single', 'class' => 'form-control'))}}
				</div>

				<div class="form-group">
					{{Form::label('Nivel')}}
					{{Form::select('nivel', $niveles, array(1), array('single' => 'single', 'class' => 'form-control'))}}
				</div>

				<div class="form-group">
					{{Form::label('Promo')}}
					{{Form::select('promo', $promos, array(1), array('single' => 'single', 'class' => 'form-control'))}}
				</div>

				<div class="form-group">
					{{Form::label('Menú')}}
					{{Form::textarea('menu', '', array('class' => 'form-control'))}}
					<span class="help-block">{{ $errors->first('menu') }}</span>
				</div>

				<div class="form-group">
					{{Form::label('Categorías')}}
					{{Form::select('categorias[]', $categorias, array(1), array('multiple' => 'multiple', 'class' => 'form-control'))}}
				</div>

				<div class="form-group">
					{{Form::label('Etiquetas')}}
					{{Form::select('etiquetas[]', $etiquetas, array(1), array('multiple' => 'multiple', 'class' => 'form-control'))}}
				</div>

				<div class="form-group">
					{{Form::label('Ocasiones')}}
					{{Form::select('ocasiones[]', $ocasiones, array(1), array('multiple' => 'multiple', 'class' => 'form-control'))}}
				</div>

				<div class="form-group">
					{{Form::label('Comidas')}}
					{{Form::select('comidas[]', $comidas, array(1), array('multiple' => 'multiple', 'class' => 'form-control'))}}
				</div>

				<div class="form-group">
					<p>{{Form::submit('Añadir lugar', array('class' => 'btn btn-default'))}}</p>
				</div>

				{{Form::close()}}
			@endif

		</div>
	</div>


@stop