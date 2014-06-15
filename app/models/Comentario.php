<?php

class Comentario extends Eloquent {

	protected $table = 'comentarios';

	public function lugar()
    {
        return $this->belongsTo('Lugar');
    }

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function storeCometarioForReview($review, $lugar, $user_id, $comment)
    {
        $this->user_id = $user_id;
        $this->lugar_id = $lugar->id;
        $this->review_id = $review->id;
        $this->comment = $comment;
        $lugar->comentarios()->save($this);
    }

    // Attribute presenters
    public function getTimeagoAttribute()
    {
        $date = \Carbon\Carbon::createFromTimeStamp(strtotime($this->created_at))->diffForHumans();
        return $date;
    }

}