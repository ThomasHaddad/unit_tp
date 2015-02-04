<?php
/**
 * Created by PhpStorm.
 * User: thomashaddad
 * Date: 02/02/15
 * Time: 15:00
 */

class AperoController extends BaseController{



    public function index(){
        $tags = Tag::lists('name');
        return View::make('apero',compact('tags'));
    }

    public function postCreate(){
        $input=Input::all();
        $v=Validator::make($input, ['title' => 'required', 'date'=>'required','content'=>'required']);
        if($v->fails()){
            return Redirect::route('create')->withInput()->withErrors($v->messages());
        }
        $apero=new Apero;
        $apero->title=$input['title'];
        $apero->content=$input['content'];
        $apero->date=strtotime($input['date']);

        if(!Auth::user()){
            throw new \RuntimeException('No user');
        }
        $apero->user_id=Auth::user()->id;

        if(Input::hasfile('file')){
            $apero->url_thumbnail=$this->uploadImage();
        }
        $apero->tag_id=intval($input['tag']);

        $apero->status='published';

        $apero->save();

        return Redirect::to('create')
            ->withMessage('success');
    }
    public function uploadImage(){
        if(Input::hasfile('file')) {
            $file = Input::file('file');
            $files = [$file];
            $rules = ['image' => 'image|mime:jpg,png,gif, jpeg|max:3000'];

            $validator = Validator::make($files, $rules);
            if($validator->fails()){
                return Redirect::back();
            }

            $fileExtension = $file->getClientOriginalExtension();
            $destinationPath = 'public/uploads/';
            $filename = substr(md5(rand()),0,10) . '.' . $fileExtension;
            $upload_success = $file->move($destinationPath, $filename);
            if ($upload_success) {
                return $filename;
            }else{
                return Redirect::back();
            }
        }
    }
}