<?php

class HomeController extends BaseController {

	public function get_index() {
		return Redirect::to('http://santafe.'.$_SERVER['HTTP_HOST']);
	}

	public function get_index_city($city) {
		if (in_array($city, Config::get('city.available'))) {
	        return View::make('home.index')->with('city', $city);
	    } else {
	    	return Redirect::to('http://santafe.'.$_SERVER['HTTP_HOST']);
	    }
	}	

	public function get_novedades() {
		return Redirect::to('blog/seccion/novedades');
	}

	public function get_posta() {
		return Redirect::to('blog/seccion/laposta');
	}

	public function get_quees() {
		return View::make('quees.index');
	}

	public function get_contacto() {
		return View::make('contacto.index');
	}

	public function get_terminos() {
		return View::make('terminos.index');
	}

	public function get_busqueda($city, $busqueda) {

		$lugares = null;

		$etiqueta = Etiqueta::where('slug', 'LIKE', '%'.$busqueda.'%')->first();

		$ciudad = Ciudad::where('slug', '=', $city)->first();

 		if ($etiqueta == null) {
			$lugares = Lugar::where('nombre', 'LIKE', '%'.$busqueda.'%')->where('estado', '=', 1)->where('ciudad', '=', $ciudad->id)->paginate(8);
		} else {
			$lugares = $etiqueta->lugares($ciudad->id)->paginate(8);
		}

		return View::make('busqueda.index')->with('busqueda', $busqueda)->with('lugares', $lugares)->with('ciudad', $ciudad->descripcion)->with('city', $city);
	}

	public function get_busqueda_ocasion($city, $busqueda, $ocasion) {

		$lugares = null;

		$ocasion = Ocasion::where('slug', '=', $ocasion)->first();
		$etiqueta = Etiqueta::where('slug', 'LIKE', '%'.$busqueda.'%')->first();
		$ciudad = Ciudad::where('slug', '=', $city)->first();


		if($ocasion != null && $etiqueta != null) {
			$lugaresOcasion = OcasionLugar::where('ocasion_id', '=', $ocasion->id)->get();
			$lugaresEtiqueta = EtiquetaLugar::where('id_etiqueta', '=', $etiqueta->id)->get();

			$idlugares = null;
			$i = 0;

			foreach ($lugaresOcasion as $lugarOcasion) {
				foreach ($lugaresEtiqueta as $lugarEtiqueta) {
					if($lugarOcasion->lugar_id == $lugarEtiqueta->id_lugar) {
						$idlugares[$i] = $lugarOcasion->lugar_id;
						$i = $i + 1;
					}
				}
			}
			$lugares = lugar::whereIn('id', $idlugares)->paginate(8);
		}

		return View::make('busqueda.index')->with('busqueda', $busqueda)->with('lugares', $lugares)->with('ciudad', $ciudad->descripcion)->with('city', $city);
	}

	public function post_busqueda() {
		$lugar = Input::get('lugar');
		return Redirect::to('busqueda/'.$lugar);
	}
}