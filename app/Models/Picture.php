<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    use HasFactory;
    protected $appended=['image_path'];
    protected $guarded = [];
    public function getImagePathAttribute()
    {
        return $this->image !=null ? asset('uploads/pictures/'.$this->image) : asset('uploads/pictures/default.png');
    }
    public function album()
    {
        return $this->belongsTo(Album::class,'album_id')->withDefault();
    }
}

