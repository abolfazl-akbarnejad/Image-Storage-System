<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Http\Services\Image\ImageService;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('admin.content.post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, Post $post, ImageService $imageService)
    {
        $inputs = $request->all();

        $inputs['image_id'] = saveImage($request, 'image',  $request->alt_image, 'content/post', 1440, 720) ?? redirect()->route('admin.content.post.edit')->withErrors('تصویر یا فایل آپلود نشده');
        // Order of inputs ($request, input file name, image alt (optional), image save path, image save dimensions (optional))

        $result  = $post->update($inputs);

        if ($result) {
            return redirect()->route('admin.content.post.index')->with('success', 'پست با موفقیت ویرایش شد');
        } else {
            return redirect()->route('admin.content.post.index')->with('error', 'مطلب ثبت نشد');
        }
    }
}
