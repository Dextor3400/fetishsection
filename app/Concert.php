<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Concert extends Model
{

    protected $fillable = [
        'date',
        'venue',
        'open',
        'start',
        'price_advance',
        'price_onsite',
        'more_info'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
