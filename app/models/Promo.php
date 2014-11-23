<?php
 
class Promo extends Eloquent
{
    protected $table = 'promos';

    public $timestamps = false;

	public function lugar()
    {
        return $this->belongsTo('Lugar');
    }
}