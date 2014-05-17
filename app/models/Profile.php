<?php

class Profile extends Eloquent {

	protected $table = 'profiles';

	public $timestamps = false;

	public function user()
    {
        return $this->belongsTo('User');
    }
}