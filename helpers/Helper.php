<?php

use App\Http\Services\Image\ImageService;
use App\Http\Services\Message\SMS\MeliPayamakService;
use App\Models\User;
use App\Models\Image;
use App\Models\ShortLink;
use App\Models\UserCookie;
use App\Models\Market\Cart;
use Illuminate\Support\Str;
use App\Models\Market\Copan;
use App\Models\Market\Order;
use App\Models\Media\Banner;
use Morilog\Jalali\Jalalian;
use App\Models\Market\Product;
use App\Models\market\CartItem;
use App\Models\Market\Discount;
use App\Models\Media\Notification;
use App\Models\Market\CartItemValue;
use App\Models\Media\BannerPriority;
use Illuminate\Support\Facades\Auth;
use App\Models\Market\productVariant;
use Illuminate\Http\UploadedFile;



function saveImage($request, $inputName, $alt,  $saveInDirectory, $width =   null, $height = null, $ImageName = null)
{
    $image_service = new ImageService;
    $oldInputName = "old_$inputName";

    if (($width == null && $height != null) || ($width != null && $height == null)) {
        $final_image = null;
    }
    //set name image
    if ($ImageName != null) {
        $image_service->setImageName($ImageName . time());
    }

    //When creating data that includes an image, this section processes and saves the image based on the required size and location.
    if ($request->$oldInputName) {
        $check_image = Image::where('image_name',  $request->$oldInputName)->orderBy('created_at', 'desc')->first();
        if ($check_image) {

            //If the image was not saved (considering its presence in a fixed folder), the save operation should be performed.
            if (explode('\\', $check_image->image_path)[1] == 'Temporary-storage') {

                //Convert the image to a format suitable for transmission
                $imagePath = $_SERVER['DOCUMENT_ROOT'] . '/' . ltrim($check_image->image_path, '/');
                $uploadedFile = new UploadedFile(
                    $imagePath,
                    basename($imagePath),
                    mime_content_type($imagePath),
                    null,
                    true // Mark as test to prevent actual file move
                );

                //chenge image size
                $image_service->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . $saveInDirectory);

                //It saves images with a specific size and in a standard format.
                if ($width != null && $height != null) {
                    $result_image = $image_service->fitAndSave($uploadedFile, $width, $height);
                } else {
                    $result_image = $image_service->save($uploadedFile);
                }


                $final_image = Image::create([
                    'image_name' => $check_image->image_name,
                    'image_path' => $result_image,
                    'alt' => $alt,
                    'status' => 1
                ])->id;
            } else {
                $final_image = $check_image->id;
            }

            //for delete image
            $check_image->update(['status' => 0]);
        } else {
            return false;
        }
    } else {

        return false;
    }

    return   (int)$final_image;
}
