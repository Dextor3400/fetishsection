<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{

    protected $fillable = [
        'about_text',
        'about_image',
        'video_one',
        'video_two',
        'video_three',
        'photo_one',
        'photo_two',
        'photo_three',
    ];
/*
    public function getAboutImageAttribute($value){
        return asset('images/' . $value);
    }

    public function getPhotoOneAttribute($value){
        return asset('images/' . $value);
    }

    public function getPhotoTwoAttribute($value){
        return asset('images/' . $value);
    }

    public function getPhotoThreeAttribute($value){
        return asset('images/' . $value);
    }
    */
}
