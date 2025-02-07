<x-guest-layout title="الصفحة الرئيسية">
    <!-- 🟢 قسم العنوان -->
    <section class="bg-white shadow-md rounded-lg p-6 mb-8">
        <h1 class="text-4xl font-bold text-gray-900">📖 أحدث المقالات</h1>
        <p class="text-gray-600 mt-2">استكشف أحدث المقالات والمواضيع الشائعة في المدونة.</p>
    </section>

    <!-- 🟢 قائمة المقالات -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($posts as $post)
            <div class="bg-white shadow-lg rounded-lg overflow-hidden transform transition duration-300 hover:scale-105">
                @if ($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-full h-48 object-cover">
                @else
                    <div class="w-full h-48 bg-gray-300 flex items-center justify-center text-gray-500 text-lg">
                        🖼 لا توجد صورة
                    </div>
                @endif

                <div class="p-4">
                    <h2 class="text-2xl font-bold text-gray-900">
                        <a href="{{ route('posts.show', $post->id) }}" class="hover:text-blue-500 transition">
                            {{ $post->title }}
                        </a>
                    </h2>
                    <p class="text-gray-600 mt-2 leading-relaxed">
                        {{ Str::limit(strip_tags($post->body), 100, '...') }}
                    </p>
                    <div class="flex justify-between items-center mt-4">
                        <a href="{{ route('posts.show', $post->id) }}" class="text-blue-600 hover:text-blue-800 font-semibold">
                            اقرأ المزيد →
                        </a>
                        <span class="text-gray-500 text-sm">
                            📅 {{ $post->created_at->format('d M Y') }}
                        </span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- 🟢 زر تحميل المزيد -->
    <div class="mt-10 text-center">
        <a href="{{ route('posts.index') }}" class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
            عرض المزيد من المقالات
        </a>
    </div>
</x-guest-layout>
