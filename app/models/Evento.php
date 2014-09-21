<?php

class Evento extends Eloquent {

	protected $table = 'eventos';

	public $timestamps = false;

	public function lugares()
	{
		return $this->hasMany('Lugar');
	}
}