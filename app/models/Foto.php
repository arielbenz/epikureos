<?php

class Foto extends Eloquent {

	protected $table = 'fotos';

	public $timestamps = false;

	public function lugar()
    {
        return $this->belongsTo('Lugar');
    }

}