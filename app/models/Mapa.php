<?php

class Mapa extends Eloquent {

	protected $table = 'mapas';

	public $timestamps = false;

	public function lugares()
	{
		return $this->hasMany('Lugar');
	}
}