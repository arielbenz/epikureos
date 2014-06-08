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
    public function storeReviewForLugar($lugar, $comment, $rating, $recomendaciones)
    {
        $user_id = Auth::user()->id;

        $this->user_id = $user_id;
        $this->rating = $rating;
        $lugar->reviews()->save($this);

        $comentario = new Comentario;
        $comentario->storeCometarioForReview($lugar, $user_id, $comment);

        foreach($recomendaciones as $recomendacion) {
            $relation = new ReviewOcasion;
            $relation->review_id = $this->id;
            $relation->ocasion_id = $recomendacion;
            $relation->save();
        }

        // recalculate ratings for the specified lugar
        $lugar->recalculateRating($rating);
    }

    public function updateReviewForLugar($review, $lugar, $comment, $rating, $recomendaciones)
    {
        $user_id = Auth::user()->id;

        $comentario = new Comentario;
        $comentario->storeCometarioForReview($lugar, $user_id, $comment);

        $old_relations = ReviewOcasion::where('review_id', '=', $review->id)->delete();

        foreach($recomendaciones as $recomendacion) {
            $relation = new ReviewOcasion;
            $relation->review_id = $this->id;
            $relation->ocasion_id = $recomendacion;
            $relation->save();
        }

        // recalculate ratings for the specified lugar
        $lugar->recalculateRating($rating);
    }
}