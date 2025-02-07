<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title ?? 'مدونة Laravel' }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@3.4.17/dist/tailwind.min.css">
    @endif
</head>

<body class="font-sans antialiased bg-gray-100 text-gray-900 dark:bg-gray-900 dark:text-gray-300">

    <!-- 🟢 رأس الصفحة -->
    <header class="bg-white shadow-md dark:bg-gray-800">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <a href="{{ url('/') }}" class="text-2xl font-bold text-gray-800 dark:text-white">
                مدونة Laravel
            </a>
            <nav class="hidden md:flex space-x-6">
                <a href="{{ url('/') }}"
                    class="text-gray-700 hover:text-gray-900 dark:text-gray-300 dark:hover:text-white">الرئيسية</a>
                <a href="#"
                    class="text-gray-700 hover:text-gray-900 dark:text-gray-300 dark:hover:text-white">التقنية</a>
                <a href="#"
                    class="text-gray-700 hover:text-gray-900 dark:text-gray-300 dark:hover:text-white">التصميم</a>
                <a href="#"
                    class="text-gray-700 hover:text-gray-900 dark:text-gray-300 dark:hover:text-white">الأعمال</a>
            </nav>
            <div>
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm font-medium text-blue-600 hover:underline">لوحة
                            التحكم</a>
                    @else
                        <a href="{{ route('login') }}"
                            class="px-4 py-2 text-sm text-white bg-blue-600 rounded-lg hover:bg-blue-700">
                            تسجيل الدخول
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="mr-2 px-4 py-2 text-sm text-white bg-green-600 rounded-lg hover:bg-green-700">
                                تسجيل جديد
                            </a>
                        @endif
                    @endauth
                @endif
            </div>
        </div>
    </header>

    <!-- 🟢 محتوى الصفحة -->
    <div class="container mx-auto px-6 py-10 flex flex-wrap md:flex-nowrap gap-6">
        <!-- 🟢 القائمة الجانبية -->
        <aside class="w-full md:w-1/4 bg-white shadow-lg rounded-lg p-6 dark:bg-gray-800">
            <h2 class="text-lg font-semibold text-gray-800 dark:text-white mb-4">الفئات</h2>
            <ul class="space-y-2">
                <li><a href="#" class="text-gray-600 dark:text-gray-300 hover:text-blue-600">أحدث المقالات</a>
                </li>
                <li><a href="#" class="text-gray-600 dark:text-gray-300 hover:text-blue-600">التقنية</a></li>
                <li><a href="#" class="text-gray-600 dark:text-gray-300 hover:text-blue-600">التصميم</a></li>
                <li><a href="#" class="text-gray-600 dark:text-gray-300 hover:text-blue-600">الأعمال</a></li>
                <li><a href="#" class="text-gray-600 dark:text-gray-300 hover:text-blue-600">البرمجة</a></li>
            </ul>

            <!-- مربع العرض للحصول على كتاب مجاني -->
            <div class="bg-blue-50 border border-blue-200 p-4 rounded-lg mt-6">
                <h2 class="text-lg font-semibold text-blue-800 mb-2">احصل على كتاب مجاني لتعلم البرمجة</h2>
                <p class="text-sm text-blue-700 mb-4">املأ بريدك الإلكتروني لتصلك نسختك المجانية مباشرة.</p>
                <!-- يمكنك تعديل action والروت بما يتناسب مع منطق التطبيق الخاص بك -->
                <form action="#" method="POST" class="flex flex-col">
                    @csrf
                    <input type="email" name="email" placeholder="بريدك الإلكتروني" required
                        class="mb-2 p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:border-blue-300">
                    <button type="submit" class="p-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                        ارسال
                    </button>
                </form>
            </div>

            <hr class="my-6 border-gray-300 dark:border-gray-700">

            <h2 class="text-lg font-semibold text-gray-800 dark:text-white mb-4">مشاركات مميزة</h2>
            <ul class="space-y-2">
                <li><a href="#" class="text-gray-600 dark:text-gray-300 hover:text-blue-600">كيف تبدأ البرمجة بلغة
                        Laravel</a></li>
                <li><a href="#" class="text-gray-600 dark:text-gray-300 hover:text-blue-600">أفضل الأدوات لتصميم
                        المواقع</a></li>
                <li><a href="#" class="text-gray-600 dark:text-gray-300 hover:text-blue-600">10 نصائح لإنشاء
                        مشاريع ناجحة</a></li>
            </ul>
        </aside>

        <!-- 🟢 منطقة المقالات -->
        <main class="w-full md:w-3/4">
            {{ $slot }}
        </main>
    </div>

    <!-- 🟢 ذيل الصفحة -->
    <footer class="bg-gray-800 text-gray-300 py-6 mt-10">
        <div class="container mx-auto text-center">
            <p>جميع الحقوق محفوظة © {{ date('Y') }} - مدونة Laravel</p>
            <nav class="mt-4">
                <a href="#" class="mx-2 hover:underline">سياسة الخصوصية</a> |
                <a href="#" class="mx-2 hover:underline">الشروط والأحكام</a> |
                <a href="#" class="mx-2 hover:underline">تواصل معنا</a>
            </nav>
        </div>
    </footer>

</body>

</html>
