<?php

class LugarController extends BaseController {


	public function get_lugar($nombreLugar) {

		$lugar = Lugar::where('slug', '=', $nombreLugar)->first();

		// Get all reviews that are not spam for the product and paginate them
		$reviews = $lugar->reviews()->with('user')->approved()->notSpam()->orderBy('created_at','desc')->paginate(100);

		return View::make('lugar.index')->with('lugar', $lugar)->with('reviews', $reviews);

	}

}