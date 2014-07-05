<?php

class Etiqueta extends Eloquent {

	protected $table = 'etiquetas';

	public $timestamps = false;

	public function lugares($ciudadid)
	{
		return $this->belongsToMany('Lugar', 'etiquetas_lugares', 'id_etiqueta', 'id_lugar')->where('estado', '=', 1)->where('ciudad', '=', $ciudadid)->orderBy('nombre', 'ASC');
	}
}