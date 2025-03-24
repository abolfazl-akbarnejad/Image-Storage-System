<?php

namespace App\Http\Requests\Admin\Content;

use App\Models\Image;
use App\Models\Content\Post;
use Illuminate\Support\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {

        return [
            'title' => 'required|string|min:2|max:300',
            'image' => [function ($attribute, $value, $fail) {
                $key_old_image_input = "old_$attribute";

                if ($value) {
                    $name_image = $value;
                } elseif ($this->$key_old_image_input) {
                    $name_image = $this->$key_old_image_input;
                } else {
                    $name_image = null;

                    $fail('فیلد تصاویر را تکمیل کنید.');
                }
                $checkSaveImage = Image::where('image_name', $name_image)
                    ->orderBy('created_at', 'desc')
                    ->first();

                if (!$checkSaveImage) {
                    $fail('فیلد تصاویر را تکمیل کنید.');
                }
            }],

        ];
    }
}
