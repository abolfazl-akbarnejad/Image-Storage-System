<body>
    <div class="container">
        <h1>Image Storage System</h1>
        <p>This system allows you to store and manage images uploaded via an HTML <code>input</code> field. Key features include:</p>
        <h2>Features and Benefits</h2>
        <ul>
            <li><span class="highlight">Custom Storage Path:</span> Ability to specify the desired path for saving the image.</li>
            <li><span class="highlight">Flexible Naming:</span> Users can set the file name manually; otherwise, it is stored as a <code>timestamp</code>.</li>
            <li><span class="highlight">Image Resizing:</span> Allows setting the image dimensions in pixels.</li>
            <li><span class="highlight">Image Retention on Errors:</span> If a <code>request validation</code> error occurs and the form reloads, the image remains available, eliminating the need for re-upload.</li>
            <li><span class="highlight">Simplicity and Efficiency:</span> Designed for ease of use and quick implementation.</li>
            <li><span class="highlight">Easy Export:</span> Facilitates easy retrieval of stored images.</li>
            <li><span class="highlight">Storage Management:</span> Controls and optimizes the number and size of stored images.</li>
            <li><span class="highlight">Unused Image Removal:</span> Removes images that are no longer in use on the website.</li>
        </ul>
        
        <h2>Usage Guide</h2>
        <p>To use this system, follow these steps:</p>
        <ul>
            <li>Include the <code>js</code>, <code>migrations</code>, <code>models</code>, and <code>FileUploadController</code> files in your project.</li>
            <li>In the file input field, add the following event:
                <pre><code>onchange="saveImage(this)"</code></pre>
            </li>
            <li>Add this hidden input to preserve the previous image:
                <pre><code>&lt;input type="hidden" name="old_image" value="{{ old('image') ?? old('old_image') }}"&gt;</code></pre>
            </li>
            <li>In the controller, use this code to retrieve the image ID:
                <pre><code>$inputs['image_id'] = saveImage($request, 'image',  $request->alt_image, 'content/post', 1440, 720) ?? redirect()->route('admin.content.post.edit')->withErrors('Image or file not uploaded');</code></pre>
            </li>
        </ul>
        <p><strong>Note:</strong> The image storage path should not be changed.</p>
        <p>Additional explanations can be found in the project files.</p>
    </div>
    
    <div class="container" dir="rtl" style="margin-top: 50px;">
        <h1>سیستم ذخیره‌سازی تصویر</h1>
        <p>این سیستم به شما امکان ذخیره و مدیریت تصاویر بارگذاری شده از طریق ورودی <code>input</code> در HTML را می‌دهد. ویژگی‌های اصلی آن شامل:</p>
        <h2>ویژگی‌ها و مزایا</h2>
        <ul>
            <li><span class="highlight">مکان ذخیره‌سازی سفارشی:</span> امکان مشخص کردن مسیر دلخواه برای ذخیره تصویر.</li>
            <li><span class="highlight">نام‌گذاری منعطف:</span> قابلیت تعیین نام فایل توسط کاربر، در غیر این صورت نام به‌صورت <code>timestamp</code> ذخیره می‌شود.</li>
            <li><span class="highlight">تنظیم ابعاد تصویر:</span> امکان مشخص کردن اندازه تصویر به پیکسل.</li>
            <li><span class="highlight">حفظ تصویر در زمان خطا:</span> در صورت بروز خطای <code>request validation</code> و بازگشت فرم، تصویر از بین نمی‌رود و نیازی به بارگذاری مجدد نیست.</li>
            <li><span class="highlight">سادگی و کارایی:</span> سیستم به‌گونه‌ای طراحی شده که استفاده از آن راحت و سریع باشد.</li>
            <li><span class="highlight">خروجی‌گیری آسان:</span> امکان دریافت راحت تصاویر ذخیره‌شده.</li>
            <li><span class="highlight">مدیریت حجم و تعداد تصاویر:</span> کنترل و بهینه‌سازی تعداد و حجم تصاویر ذخیره‌شده.</li>
            <li><span class="highlight">حذف تصاویر غیرضروری:</span> قابلیت حذف تصاویری که دیگر در سایت استفاده نمی‌شوند.</li>
        </ul>
        
        <h2>راهنمای استفاده</h2>
        <p>برای استفاده از این سیستم، مراحل زیر را انجام دهید:</p>
        <ul>
            <li>فایل‌های <code>js</code>، <code>migrations</code>، <code>models</code> و در نهایت <code>FileUploadController</code> را در پروژه خود قرار دهید.</li>
            <li>در ورودی فایل موردنظر، این رویداد را اضافه کنید:
                <pre><code>onchange="saveImage(this)"</code></pre>
            </li>
            <li>این قطعه کد را برای ذخیره مقدار تصویر قبلی اضافه کنید:
                <pre><code>&lt;input type="hidden" name="old_image" value="{{ old('image') ?? old('old_image') }}"&gt;</code></pre>
            </li>
            <li>در کنترلر برای دریافت <code>id</code> تصویر، این کد را وارد کنید:
                <pre><code>$inputs['image_id'] = saveImage($request, 'image',  $request->alt_image, 'content/post', 1440, 720) ?? redirect()->route('admin.content.post.edit')->withErrors('تصویر یا فایل آپلود نشده');</code></pre>
            </li>
        </ul>
        <p><strong>نکته:</strong> مسیر ذخیره تصویر نباید تغییر کند.</p>
        <p>توضیحات تکمیلی در فایل‌های پروژه موجود هستند.</p>
    </div>
</body>
