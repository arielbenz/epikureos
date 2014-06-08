<?php

class HomeController extends BaseController {

	public function get_index() {
		return View::make('home.index');
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

	public function get_busqueda($busqueda) {

		$lugares = null;

		$etiqueta = Etiqueta::where('slug', 'LIKE', '%'.$busqueda.'%')->first();

		if ($etiqueta == null) {
			$lugares = Lugar::where('nombre', 'LIKE', '%'.$busqueda.'%')->where('estado', '=', 1)->paginate(8);
		} else {
			$lugares = $etiqueta->lugares()->paginate(8);
		}

		return View::make('busqueda.index')->with('busqueda', $busqueda)->with('lugares', $lugares);
	}

	public function post_busqueda() {
		$lugar = Input::get('lugar');
		return Redirect::to('busqueda/'.$lugar);
	}
}