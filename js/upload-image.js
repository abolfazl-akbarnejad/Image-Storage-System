function saveImage(input, saveDirectory, Size = null, ImageName = null) {
    // ایجاد FormData برای ارسال فایل
    var formData = new FormData();
    var inputName = $(input).attr('name')
    formData.append('inputName', inputName); // name filde

    formData.append(inputName, $(input).prop('files')[0]); // file selected
    formData.append('_token', csrf_token); // CSRF token
    console.log(inputName);

    // ارسال فایل با AJAX
    $.ajax({
        url: route_upload_image, // مسیر کنترلر لاراول
        type: "POST",
        data: formData,
        processData: false, // عدم پردازش داده‌ها
        contentType: false, // عدم تنظیم contentType
        success: function (response) {
            var old_name = "old_" + inputName;
            var valueFileInput =  $(input).prop('files')[0]?.name;
            
            // نمایش پیام موفقیت‌آمیز
            $('input[name='+old_name+']').val(valueFileInput);
            toastr.clear();
            NioApp.Toast('<p>' + response.message + '</p>', 'success');
        },
        error: function (xhr) {
            // نمایش پیام خطا
            toastr.clear();
            NioApp.Toast('خطا در ذخیره تصویر.', 'error');
        }
    });
}