<?php

class Apero extends Eloquent{

    public static function boot()
    {
        parent::boot();
        Apero::observe(new AperoObserver);
    }

    public function tag(){
        return $this->belongsTo('Tag');
    }

    public function user(){
        return $this->belongsTo('User');
    }
}