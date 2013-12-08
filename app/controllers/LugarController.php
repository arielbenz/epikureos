<?php

class LugarController extends BaseController {


	public function get_lugar($nombreLugar) {

		$lugar = Lugar::where('slug', '=', $nombreLugar)->first();

		return View::make('lugar.index')->with('lugar', $lugar);

	}

}