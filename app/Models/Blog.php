<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
   
    

protected $fillable = [
    'title', 'content', 'message', 'mobile_number', 'image','feature_id'
];
public function feature()
    {
        return $this->belongsTo(Feature::class);
    }

}
