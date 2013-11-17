<?php

class Ciudad extends Eloquent {

	protected $table = 'ciudades';

	public $timestamps = false;

	public function lugares()
	{
		return $this->hasMany('Lugar');
	}
}