<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>سیستم ذخیره‌سازی تصویر</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            direction: rtl;
            text-align: right;
            padding: 20px;
            background-color: #f9f9f9;
        }
        .container {
            max-width: 800px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #2c3e50;
            border-bottom: 2px solid #3498db;
            padding-bottom: 10px;
        }
        p, li {
            color: #555;
            line-height: 1.8;
        }
        ul {
            list-style-type: square;
            padding-right: 20px;
        }
        .highlight {
            background: #3498db;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
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
    </div>
</body>
</html>
