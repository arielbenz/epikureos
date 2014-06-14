<?php

class LugarController extends BaseController {


	public function get_lugar($nombreLugar) {

		$lugar = Lugar::where('slug', '=', $nombreLugar)->first();

		$reviews = $lugar->reviews()->with('user')->approved()->notSpam()->orderBy('created_at','desc')->get();

		$idreviews[] = array();
		$total_votos = 0;
		$review_user = null;
		$comments = null;
		$votos_ocasiones = array();
		$ocasiones = array();
		$i = 0;

		if(sizeof($reviews) > 0) {
			$i = 0;
			foreach($reviews as $review) {
				$idreviews[$i] = $review->id;
				$i = $i + 1;
			}
			$i = 0;
			foreach(Ocasion::all() as $ocasion) {
				$ocasionCount = ReviewOcasion::where('ocasion_id', '=', $ocasion->id)->whereIn('review_id', $idreviews)->count();
				$votos_ocasiones[$ocasion->descripcion] = $ocasionCount;
				$ocasiones[$i] = $ocasion->id;
				$total_votos = $total_votos + $ocasionCount;
				$i = $i + 1;
			}

			$comments = $lugar->comentarios()->orderBy('created_at','desc')->paginate(4);

			if (Auth::check()) {
	        	$user_id = Auth::user()->id;
	        	$review_user = Review::where('user_id', '=', $user_id)->where('lugar_id', '=', $lugar->id)->first();
	    	}
		} else {
			foreach(Ocasion::all() as $ocasion) {
				$votos_ocasiones[$ocasion->descripcion] = 0;
				$ocasiones[$i] = $ocasion->id;
				$i = $i + 1;
			}
		}

		return View::make('lugar.index')->with('lugar', $lugar)->with('reviews', $reviews)->with('review_user', $review_user)->with('comentarios', $comments)->with('votosLugar', $votos_ocasiones)->with('totalVotos', $total_votos)->with('totalOcasiones', $ocasiones);
	}

	public function vote_lugar() {

	    if(Request::ajax()) {

	    	if (Auth::check()) {

		        $lugarid  = Input::get('lugarid');
		        $userid = Auth::user()->id;
		        $ocasionid = Input::get('ocasionid');
		        $name = Input::get('name');
		        $reviewid = null;
		        $error = "";

		        $lugar = Lugar::where('id', '=', $lugarid)->first();
		        $newReview = Review::where('user_id', '=', Auth::user()->id)->where('lugar_id', '=', $lugar->id)->first();

		        if ($newReview == null) {
		            $newReview = new Review;
		            $newReview->storeReview($lugar);
		        }

		        $reviewid = $newReview->id;

		        $ocasion = ReviewOcasion::where('ocasion_id', '=', $ocasionid)->where('review_id', '=', $reviewid)->first();

		        if ($name == "up" && $ocasion == null) {
		            $ocasion = new ReviewOcasion;
		            $ocasion->review_id = $reviewid;
		            $ocasion->ocasion_id = $ocasionid;
		            $ocasion->save();

		            $lugar = Lugar::where('id', '=', $lugarid)->first();
		            $reviews = $lugar->reviews()->with('user')->approved()->notSpam()->orderBy('created_at','desc')->get();

		            $idreviews[] = array();
		            $total_votos = 0;
		            $votos_ocasiones = array();
		            $ocasiones = array();
		            $i = 0;

		            if(sizeof($reviews) > 0) {
		                $i = 0;
		                foreach($reviews as $review) {
		                    $idreviews[$i] = $review->id;
		                    $i = $i + 1;
		                }

		                foreach(Ocasion::all() as $oca) {
		                    $ocasionCount = ReviewOcasion::where('ocasion_id', '=', $oca->id)->whereIn('review_id', $idreviews)->count();
		                    $votos_ocasiones[$oca->descripcion] = $ocasionCount;
		                    $ocasiones[$i] = $oca->id;
		                    $total_votos = $total_votos + $ocasionCount;
		                    $i = $i + 1;
		                }
		            } else {
		                foreach(Ocasion::all() as $oca) {
		                    $votos_ocasiones[$oca->descripcion] = 0;
		                    $ocasiones[$i] = $oca->id;
		                    $i = $i + 1;
		                }
		            }

		        } else if ($name == "down" && $ocasion != null) {
		            $ocasion->delete();
		            $lugar = Lugar::where('id', '=', $lugarid)->first();
		            $reviews = $lugar->reviews()->with('user')->approved()->notSpam()->orderBy('created_at','desc')->get();

		            $idreviews[] = array();
		            $total_votos = 0;
		            $votos_ocasiones = array();
		            $ocasiones = array();
		            $i = 0;

		            if(sizeof($reviews) > 0) {
		                $i = 0;
		                foreach($reviews as $review) {
		                    $idreviews[$i] = $review->id;
		                    $i = $i + 1;
		                }

		                foreach(Ocasion::all() as $oca) {
		                    $ocasionCount = ReviewOcasion::where('ocasion_id', '=', $oca->id)->whereIn('review_id', $idreviews)->count();
		                    $votos_ocasiones[$oca->descripcion] = $ocasionCount;
		                    $ocasiones[$i] = $oca->id;
		                    $total_votos = $total_votos + $ocasionCount;
		                    $i = $i + 1;
		                }
		            } else {
		                foreach(Ocasion::all() as $oca) {
		                    $votos_ocasiones[$oca->descripcion] = 0;
		                    $ocasiones[$i] = $oca->id;
		                    $i = $i + 1;
		                }
		            }
		        } else if ($name == "up" && $ocasion != null) {
		            $error = "Ya realizó su voto";
		        } else if ($name == "down" && $ocasion == null) {
		            $error = "Todavía no realizó su voto positivo";
		        }

		        return Response::json(array('message' => $error, 'votosLugar' => $votos_ocasiones, 'totalVotos' => $total_votos, 'totalOcasiones' => $ocasiones));
	    	}
    	}
    }
}