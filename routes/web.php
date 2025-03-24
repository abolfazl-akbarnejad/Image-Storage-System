<?php

use App\Models\ShortLink;
use App\Models\Content\Post;
use App\Models\Market\Product;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\Admin\Content\PostController;


//post 
Route::get('/post/edit/{post:slug}', [PostController::class, 'edit'])->name('post.edit');

//upload image
Route::post('/upload-image', [FileUploadController::class, 'uploadImage'])->name('uploadAjax.image');
