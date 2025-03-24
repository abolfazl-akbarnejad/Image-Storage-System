<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>


    <form action="{{ route('post.update', $post->slug) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <div>
                <label> تایتل پست</label>
                <div>
                    <input type="text" name="title" value="{{ old('title', $post->title) }}">
                </div>
                @error('title')
                    <div>
                        <span>
                            {{ $message }}
                        </span>
                    </div>
                @enderror
            </div>



            <div>
                <label>تصویر عنوان پست</label>
                <div>
                    <input type="file" name="image" accept=".jpg, .png, .jpeg, .gif " 
                        onchange="saveImage(this)">
                    {{-- To save the image, we use the `onchange` event:  
                            `onchange="saveImage(this)"`. --}}

                    <input type="hidden" name="old_image" value="{{ old('image') ?? old('old_image') }}">
                    {{-- This hidden input is placed to store the uploaded file name. The `value` attribute contains two `old` values:  
                        1. The name of the file input.  
                        2. `old_` + the name of the above file input. --}}
                </div>
                @error('image')
                    <div>
                        <span>
                            {{ $message }}
                        </span>
                    </div>
                @enderror
            </div>


            <button>send</button>
    </form>
</body>
<script>
    var route_upload_image = "{{ route('uploadAjax.image') }}";
    var csrf_token = '{{ csrf_token() }}';
</script>
<script src="{{ asset('admin_assets/js/upload-image.js') }}"></script>
</html>
