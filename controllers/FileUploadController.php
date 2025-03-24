<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use App\Http\Services\Image\ImageService;
use Illuminate\Support\Facades\Validator;

class FileUploadController extends Controller
{
    public function uploadImage(Request $request, ImageService $imageService)
    {
        $validator = Validator::make($request->all(), [
            'inputName' => 'required|string', // نام فیلد فایل
            $request->inputName => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048', // فایل تصویر
        ]);
        // اگر اعتبارسنجی ناموفق بود
        if ($validator->fails()) {
            return response()->json([
                'status' => 0,
                'message' => 'فرمت داده ها مناسب تصاویر نیست',
                'errors' => $validator->errors(),
            ], 422);
        }

        // دریافت داده‌های معتبر
        $inputs = $validator->validated();

        // تنظیم مسیر ذخیره‌سازی تصویر
        $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'Temporary-storage');
        // ذخیره تصویر بدون تغییر اندازه
        $result_image = $imageService->save($request->file($inputs['inputName']));

        // ذخیره اطلاعات تصویر در دیتابیس
        Image::create([
            'image_name' => $request->file($inputs['inputName'])->getClientOriginalName(),
            'image_path' => $result_image,
            'status' => 0,
            'alt' => null,
        ]);

        // پاسخ موفقیت‌آمیز
        return response()->json([
            'status' => 1,
            'message' => 'تصویر با موفقیت آپلود شد.',
        ]);
    }
}
