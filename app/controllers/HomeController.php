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

	public function get_santafe() {
		return View::make('santafealacarta.index');
	}

	public function get_busqueda($city, $busqueda) {

		$lugares = null;
		$ciudad = Ciudad::where('slug', '=', $city)->first();
		$comidas = Comida::orderBy('descripcion', 'ASC')->get();
		$comidaBusqueda = null;

		$etiqueta = Etiqueta::where('slug', 'LIKE', '%'.$busqueda.'%')->first();
		

 		if ($etiqueta == null) {
			$lugares = Lugar::where('nombre', 'LIKE', '%'.$busqueda.'%')->where('estado', '=', 1)->where('ciudad', '=', $ciudad->id)->paginate(8);
		} else {
			$lugares = $etiqueta->lugares($ciudad->id)->paginate(8);
		}

		return View::make('busqueda.index')->with('busqueda', $busqueda)->with('lugares', $lugares)->with('ciudad', $ciudad->descripcion)->with('city', $city)->with('comidas', $comidas)->with('comidaBusqueda', $comidaBusqueda);
	}

	public function get_busqueda_ocasion($city, $busqueda, $ocasionComida) {

		$ciudad = Ciudad::where('slug', '=', $city)->first();
		$lugares = Lugar::where('nombre', '=', $busqueda)->where('estado', '=', 1)->where('ciudad', '=', $ciudad->id)->paginate(8);
		$etiqueta = Etiqueta::where('slug', 'LIKE', '%'.$busqueda.'%')->first();
		$comidas = Comida::orderBy('descripcion', 'ASC')->get();
		$comida = null;

		if($etiqueta != null) {
			$comida = Comida::where('slug', 'LIKE', $ocasionComida.'%')->first();
			$lugaresEtiqueta = EtiquetaLugar::where('id_etiqueta', '=', $etiqueta->id)->get();
			$idlugares[] = null;
			$i = 0;

			if($comida == null) {
				$ocasion = Ocasion::where('slug', '=', $ocasionComida)->first();
			
				if($ocasion != null) {
					$lugaresOcasion = OcasionLugar::where('ocasion_id', '=', $ocasion->id)->get();
					
					foreach ($lugaresOcasion as $lugarOcasion) {
						foreach ($lugaresEtiqueta as $lugarEtiqueta) {
							if($lugarOcasion->lugar_id == $lugarEtiqueta->id_lugar) {
								$idlugares[$i] = $lugarOcasion->lugar_id;
								$i = $i + 1;
							}
						}
					}
					$lugares = Lugar::whereIn('id', $idlugares)->where('ciudad', '=', $ciudad->id)->paginate(8);
				}
			} else {
				$lugaresComida = ComidaLugar::where('comida_id', '=', $comida->id)->get();

				foreach ($lugaresComida as $lugarComida) {
					foreach ($lugaresEtiqueta as $lugarEtiqueta) {
						if($lugarComida->lugar_id == $lugarEtiqueta->id_lugar) {
							$idlugares[$i] = $lugarComida->lugar_id;
							$i = $i + 1;
						}
					}
				}
				$lugares = Lugar::whereIn('id', $idlugares)->where('ciudad', '=', $ciudad->id)->paginate(8);
			}
		}

		return View::make('busqueda.index')->with('busqueda', $busqueda)->with('lugares', $lugares)->with('ciudad', $ciudad->descripcion)->with('city', $city)->with('comidas', $comidas)->with('comidaBusqueda', $comida);
	}

	public function post_busqueda() {
		$lugar = Input::get('lugar');
		return Redirect::to('busqueda/'.$lugar);
	}
}