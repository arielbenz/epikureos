<?php

class Ocasion extends Eloquent {

	protected $table = 'ocasion';

	public $timestamps = false;

	public function ocasiones()
	{
		return $this->hasMany('Ocasion');
	}

	public function reviews()
	{
		return $this->belongsToMany('Review', 'reviews_ocasion', 'ocasion_id', 'review_id' );
	}

	public function lugares($ciudadid)
	{
		return $this->belongsToMany('Lugar', 'ocasiones_lugares', 'ocasion_id', 'lugar_id')->where('estado', '=', 1)->where('ciudad', '=', $ciudadid)->orderBy('nombre', 'ASC');
	}
}