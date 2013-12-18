<?php

class Etiqueta extends Eloquent {

	protected $table = 'etiquetas';

	public $timestamps = false;

	public function lugares()
	{
		return $this->belongsToMany('Lugar', 'etiquetas_lugares', 'id_etiqueta', 'id_lugar' );
	}
}