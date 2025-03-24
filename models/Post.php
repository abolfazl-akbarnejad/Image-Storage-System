<?php

namespace App\Models\Content;

use App\Models\Image;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;


    protected $fillable = ['title',  'image_id', 'body'];


    public function image()
    {
        return $this->belongsTo(Image::class, 'image_id');
    }
}
