<?php

class Categoria extends Eloquent {

	protected $table = 'categorias';

	public $timestamps = false;

	public function lugares()
	{
		return $this->belongsToMany('Lugar', 'categorias_lugares', 'id_categoria', 'id_lugar' );
	}
}