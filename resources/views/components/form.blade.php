<form action="{{ isset($post) ? route('posts.update', $post) : route('posts.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if(isset($post))
        @method('PUT')
    @endif

    <!-- Display Validation Errors -->
    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
            <strong>يرجى تصحيح الأخطاء التالية:</strong>
            <ul class="mt-2 list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- عنوان المقالة -->
    <div class="mb-4">
        <label for="title" class="block text-lg font-medium text-gray-700">عنوان المقالة</label>
        <input type="text" id="title" name="title" 
               class="mt-2 w-full p-3 border rounded-lg focus:ring focus:ring-blue-300" 
               value="{{ old('title', $post->title ?? '') }}" required>
    </div>

    <!-- محتوى المقالة -->
    <div class="mb-4">
        <label for="body" class="block text-lg font-medium text-gray-700">محتوى المقالة</label>
        <textarea id="body" name="body" rows="6" 
                  class="mt-2 w-full p-3 border rounded-lg focus:ring focus:ring-blue-300" 
                  required>{{ old('body', $post->body ?? '') }}</textarea>
    </div>

    <!-- رفع صورة -->
    <div class="mb-4">
        <label for="image" class="block text-lg font-medium text-gray-700">صورة المقالة (اختياري)</label>
        <input type="file" id="image" name="image" 
               class="mt-2 w-full p-3 border rounded-lg focus:ring focus:ring-blue-300">
    </div>

    <!-- زر الإرسال -->
    <div class="flex justify-end">
        <button type="submit" class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
            {{ isset($post) ? 'تحديث المقالة' : 'نشر المقالة' }}
        </button>
    </div>
</form>