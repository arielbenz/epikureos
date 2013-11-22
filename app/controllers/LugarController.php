<?php

class LugarController extends BaseController {


	public function get_lugar($lugar) {

		return View::make('lugar.index');

	}

}