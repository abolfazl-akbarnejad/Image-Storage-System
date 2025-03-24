<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['image_name', 'image_path', 'status', 'alt', 'size'];
}
