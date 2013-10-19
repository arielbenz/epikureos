<?php

class Lugar extends Eloquent {

	protected $table = 'lugares';

	//Un lugar pertenece a varias categorias
	public function categorias()
	{
		return $this->belongsToMany('Categoria', 'categorias_lugares', 'id_lugar', 'id_categoria' );
	}
}