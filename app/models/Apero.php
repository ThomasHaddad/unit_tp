<?php
/**
 * Created by PhpStorm.
 * User: thomashaddad
 * Date: 02/02/15
 * Time: 12:07
 */

class Apero extends Eloquent{
    public function tag(){
        return $this->belongsTo('Tag');
    }
}