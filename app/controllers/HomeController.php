<?php

class HomeController extends BaseController {

	public function get_index() {
		return View::make('home.index');
	}

	public function get_novedades() {
		return View::make('novedades.index');
	}

	public function get_posta() {
		return View::make('laposta.index');
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

	public function get_busqueda($lugar) {
		return View::make('busqueda.index')->with('lugar', $lugar);
	}

	public function post_busqueda() {
		$lugar = Input::get('lugar');
		return Redirect::to('busqueda/'.$lugar);
	}

}