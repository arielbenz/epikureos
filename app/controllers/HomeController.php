<?php

class HomeController extends BaseController {

	public function get_index() {
		return View::make('home.index');
	}

	public function get_novedades() {
		//return View::make('novedades.index');
		return Redirect::to('blog/seccion/novedades');
	}

	public function get_posta() {
		//return View::make('laposta.index');
		return Redirect::to('blog/seccion/laposta');
	}

	public function get_promos() {
		return View::make('promos.index');
	}

	public function get_quees() {
		return View::make('quees.index');
	}

	public function get_contacto() {
		return View::make('contacto.index');
	}

	public function get_busqueda($busqueda) {

		$categoria = Categoria::where('slug', '=', $busqueda)->first();
		
		$lugares = $categoria->lugares;

		$thumbs = array();
		$i = 0;

		foreach ($lugares as $lugar) {
			$foto = Lugar::getThumb($lugar->id);
			$thumbs[$i] = $foto->url;
			$i = $i + 1;
		}

		$lugaresJson = $lugares->toJson();

		return View::make('busqueda.index')->with('busqueda', $categoria->descripcion)->with('lugares', $lugares)->with('lugaresJson', $lugaresJson)->with('thumbs', json_encode($thumbs));
	}

	public function post_busqueda() {
		$lugar = Input::get('lugar');
		return Redirect::to('busqueda/'.$lugar);
	}

}