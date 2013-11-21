<?php

class TipoFoto extends Eloquent {

	protected $table = 'tipos_fotos';

	public $timestamps = false;

	public function fotos()
	{
		return $this->hasMany('Foto');
	}
}