@php
    $isRelated = $type === 'related';
@endphp

<div class="bg-white shadow-lg rounded-xl overflow-hidden transform transition duration-300 hover:scale-105">
    <a href="{{ route('posts.show', $post->id) }}">
        @if ($post->image)
            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" 
                 class="w-full h-48 object-cover {{ $isRelated ? 'rounded-t-lg' : 'rounded-xl' }}">
        @else
            <div class="w-full h-48 bg-gray-300 flex items-center justify-center text-gray-500 text-lg">
                🖼 لا توجد صورة
            </div>
        @endif
    </a>

    <div class="p-4">
        <h3 class="text-xl font-bold text-gray-900">
            <a href="{{ route('posts.show', $post->id) }}" class="hover:text-blue-500 transition">
                {{ $post->title }}
            </a>
        </h3>
        
        <p class="text-gray-600 text-sm mt-2">
            📅 {{ $post->created_at->translatedFormat('d M Y') }} | ✍️ {{ $post->author }}
        </p>

        @if (!$isRelated)
            <p class="text-gray-700 mt-3 text-sm">
                {{ Str::limit(strip_tags($post->body), 120, '...') }}
            </p>
        @endif

        <a href="{{ route('posts.show', $post->id) }}" 
           class="mt-3 inline-block px-4 py-2 bg-blue-500 text-white text-sm rounded-lg hover:bg-blue-600 transition">
            اقرأ المزيد →
        </a>
    </div>
</div>
