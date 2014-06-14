<?php
 
class Review extends Eloquent
{

    protected $table = 'reviews';

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function lugar()
    {
        return $this->belongsTo('Lugar');
    }

    public function getRatingByUserLugar($id_user, $id_lugar)
    {
        $rating = Review::where('user_id', $id_user)->where('lugar_id', $id_lugar);
        return $rating;
    }

    public function scopeApproved($query)
    {
        return $query->where('approved', true);
    }

    public function scopeSpam($query)
    {
        return $query->where('spam', true);
    }

    public function scopeNotSpam($query)
    {
        return $query->where('spam', false);
    }

    public function ocasiones()
    {
        return $this->belongsToMany('Ocasion', 'reviews_ocasion', 'review_id', 'ocasion_id' );
    }

    // Attribute presenters
    public function getTimeagoAttribute()
    {
        $date = \Carbon\Carbon::createFromTimeStamp(strtotime($this->created_at))->diffForHumans();
        return $date;
    }

    // this function takes in lugar ID, comment and the rating and attaches the review to the lugar by its ID, then the average rating for the lugar is recalculated

    public function storeReview($lugar)
    {
        $user_id = Auth::user()->id;
        $this->user_id = $user_id;
        $lugar->reviews()->save($this);
    }

    public function storeReviewForLugar($lugar, $comment, $rating)
    {
        $user_id = Auth::user()->id;
        $this->user_id = $user_id;
        $this->rating = $rating;
        $lugar->reviews()->save($this);

        $comentario = new Comentario;
        $comentario->storeCometarioForReview($lugar, $user_id, $comment);

        $lugar->recalculateRating($rating);
    }

    public function updateReviewForLugar($review, $lugar, $comment, $rating)
    {
        $user_id = Auth::user()->id;

        $comentario = new Comentario;
        $comentario->storeCometarioForReview($lugar, $user_id, $comment);

        $lugar->recalculateRating($rating);
    }
}