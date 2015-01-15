<?php

class Lugar extends Eloquent {

	protected $table = 'lugares';
	public $timestamps = false;

	//Un lugar pertenece a varias categorias
	public function categorias() {
		return $this->belongsToMany('Categoria', 'categorias_lugares', 'id_lugar', 'id_categoria' );
	}

	public function etiquetas() {
		return $this->belongsToMany('Etiqueta', 'etiquetas_lugares', 'id_lugar', 'id_etiqueta' );
	}

	public function ocasiones() {
		return $this->belongsToMany('Ocasion', 'ocasiones_lugares', 'lugar_id', 'ocasion_id' );
	}

	public function comidas() {
		return $this->belongsToMany('Comida', 'comidas_lugares', 'lugar_id', 'comida_id' );
	}

	public function reviews() {
		return $this->hasMany('Review');
	}

	public function comentarios() {
        return $this->hasMany('Comentario');
    }

	public function ciudad() {
        return $this->belongsTo('Ciudad');
    }

    public function fotos() {
		return $this->hasMany('Foto', 'id_lugar');
	}

	public static function enCategorias($id) {
		$categorias = Lugar::find($id)->categorias()->lists('id');
		return $categorias;
	}

	public static function enEtiquetas($id)	{
		$etiquetas = Lugar::find($id)->etiquetas()->lists('id');
		return $etiquetas;
	}

	public static function enOcasiones($id)	{
		$ocasiones = Lugar::find($id)->ocasiones()->lists('id');
		return $ocasiones;
	}

	public static function enComidas($id) {
		$comidas = Lugar::find($id)->comidas()->lists('id');
		return $comidas;
	}

	public static function enCiudad($id) {
		$ciudad = Ciudad::where('id', '=', $id)->first();
		return $ciudad->descripcion;
	}

	public static function getSlugCiudad($id) {
		$ciudad = Ciudad::where('id', '=', $id)->first();
		return $ciudad->slug;
	}

	public static function enMapa($id) {
		$mapa = Mapa::where('id', '=', $id)->first();
		return $mapa->slug;
	}

	public static function enNivel($id)	{
		$nivel = Nivel::where('id', '=', $id)->first();
		return $nivel->slug;
	}

	public static function enEvento($id) {
		$evento = Evento::where('id', '=', $id)->first();
		return $evento->slug;
	}

	public static function getThumb($id) {
		$foto = Foto::where('id_lugar','=', $id)->first();
		return $foto;
	}

	public static function getPromo($id) {
		$promo = Promo::where('id','=', $id)->first();
		return $promo->descripcion;
	}

	public function recalculateRating($rating) {
    	$reviews = $this->reviews()->notSpam()->approved();
	    $avgRating = $reviews->avg('rating');
		$this->rating_cache = round($avgRating, 1);
		$this->rating_count = $reviews->count();
    	$this->save();
    }
}