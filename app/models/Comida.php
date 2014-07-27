<?php

class Comida extends Eloquent {

	protected $table = 'comidas';

	public $timestamps = false;

	public function comidas()
	{
		return $this->hasMany('Comida');
	}

	public function lugares($ciudadid)
	{
		return $this->belongsToMany('Lugar', 'comidas_lugares', 'comida_id', 'lugar_id')->where('estado', '=', 1)->where('ciudad', '=', $ciudadid)->orderBy('nombre', 'ASC');
	}
}