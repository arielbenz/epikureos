<?php

class Lugar extends Eloquent {

	protected $table = 'lugares';
	public $timestamps = false;

	//Un lugar pertenece a varias categorias
	public function categorias()
	{
		return $this->belongsToMany('Categoria', 'categorias_lugares', 'id_lugar', 'id_categoria' );
	}

	public static function enCategorias($id)
	{
		$categorias = Lugar::find($id)->categorias()->lists('id');
		return $categorias;
	}

	public function fotos()
	{
		return $this->hasMany('Foto', 'id_lugar');
	}

	public static function getThumb($id)
	{
		$foto = Foto::where('id_lugar','=', $id)->where('estado','=',1)->first();
		return $foto;
	}
}