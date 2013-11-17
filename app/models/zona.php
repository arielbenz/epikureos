<?php

class Zona extends Eloquent {

	protected $table = 'zonas';

	public $timestamps = false;

	public function zonas()
	{
		return $this->hasMany('Zona');
	}
}