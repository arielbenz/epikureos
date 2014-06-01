<?php

class Lugar extends Eloquent {

	protected $table = 'lugares';
	public $timestamps = false;

	//Un lugar pertenece a varias categorias
	public function categorias()
	{
		return $this->belongsToMany('Categoria', 'categorias_lugares', 'id_lugar', 'id_categoria' );
	}

	public function etiquetas()
	{
		return $this->belongsToMany('Etiqueta', 'etiquetas_lugares', 'id_lugar', 'id_etiqueta' );
	}

	public static function enCategorias($id)
	{
		$categorias = Lugar::find($id)->categorias()->lists('id');
		return $categorias;
	}

	public static function enEtiquetas($id)
	{
		$etiquetas = Lugar::find($id)->etiquetas()->lists('id');
		return $etiquetas;
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

	public function reviews()
	{
		return $this->hasMany('Review');
	}

	public function recalculateRating($rating)
    {
    	$reviews = $this->reviews()->notSpam()->approved();
	    $avgRating = $reviews->avg('rating');
		$this->rating_cache = round($avgRating,1);
		$this->rating_count = $reviews->count();
    	$this->save();
    }
}