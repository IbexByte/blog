<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>كتاب تعلم البرمجة المجاني</title>
    <style>
        /* تنسيق بسيط للرسالة باستخدام CSS مدمج لضمان ظهورها بشكل جيد في معظم عملاء البريد */
        body {
            margin: 0;
            padding: 0;
            background-color: #f7f7f7;
            font-family: Arial, sans-serif;
            direction: rtl;
            text-align: right;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            padding: 20px;
            border: 1px solid #dddddd;
            border-radius: 5px;
        }
        h1 {
            color: #333333;
            font-size: 24px;
            margin-bottom: 10px;
        }
        p {
            color: #555555;
            font-size: 16px;
            line-height: 1.5;
            margin: 10px 0;
        }
        .button {
            display: inline-block;
            background-color: #3490dc;
            color: #ffffff !important;
            text-decoration: none;
            padding: 10px 15px;
            border-radius: 5px;
            font-size: 16px;
            margin-top: 20px;
        }
        .footer {
            margin-top: 30px;
            font-size: 14px;
            color: #777777;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>مرحباً!</h1>
        <p>شكراً لاهتمامك بطلب نسخة كتاب <strong>تعلم البرمجة المجاني</strong>.</p>
        <p>
            نحن نسعى دائماً لتقديم أفضل الموارد التعليمية لمساعدتك في تطوير مهاراتك البرمجية.
            اضغط على الزر أدناه لتحميل الكتاب والبدء في رحلتك التعليمية.
        </p>
        <a href="{{ url('download/free-programming-book.pdf') }}" class="button">تحميل الكتاب</a>
        <div class="footer">
            <p>إذا لم تطلب هذا الكتاب، يمكنك تجاهل هذه الرسالة.</p>
            <p>مع تحيات فريق الدعم</p>
        </div>
    </div>
</body>
</html>
