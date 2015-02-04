<?php
/**
 * Created by PhpStorm.
 * User: thomashaddad
 * Date: 03/02/15
 * Time: 10:46
 */

class AperoObserver {

    public function saved($model){
//        $tag=$model->tag;
//        $tag->count_apero=$tag->count_apero+1;
//        $tag->save();

        $model->tag->count_apero = $model->tag->aperos->count();
        $model->tag->save();
    }
}