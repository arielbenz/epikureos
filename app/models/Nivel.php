<?php

class Nivel extends Eloquent {

	protected $table = 'niveles';

	public $timestamps = false;

	public function lugares()
	{
		return $this->hasMany('Lugar');
	}
}