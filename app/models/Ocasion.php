<?php

class Ocasion extends Eloquent {

	protected $table = 'ocasion';

	public $timestamps = false;

	public function ocasiones()
	{
		return $this->hasMany('Ocasion');
	}

	public function reviews()
	{
		return $this->belongsToMany('Review', 'reviews_ocasion', 'ocasion_id', 'review_id' );
	}
}