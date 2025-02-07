<x-guest-layout title="{{ $post->title }}">
    <!-- 🟢 Post Header -->
    <section class="bg-white shadow-lg rounded-xl p-6 mb-8 animate-fade-in-up">
        <h1 class="text-4xl font-bold text-gray-900 tracking-tight">{{ $post->title }}</h1>
        <div class="flex items-center gap-2 mt-4 text-gray-600">
            <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm">📅
                {{ $post->created_at->translatedFormat('d M Y') }}</span>
            <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm">✍️ {{ $post->author }}</span>
            <span class="bg-purple-100 text-purple-800 px-3 py-1 rounded-full text-sm">🕒 25 دقيقة قراءة</span>
        </div>
    </section>

    <!-- 🟢 Featured Image -->
    @if ($post->image)
        <div
            class="w-full h-96 overflow-hidden rounded-2xl shadow-xl mb-8 hover:shadow-2xl transition-shadow duration-300">
            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}"
                class="w-full h-full object-cover transform hover:scale-105 transition-transform duration-300">
        </div>
    @endif

    <!-- 🟢 Post Content -->
    <article class="prose-lg max-w-none bg-white shadow-lg rounded-xl p-8 mb-12">
        {!! Str::markdown($post->body) !!}
    </article>

    <!-- 🟢 Social Sharing -->
    <div class="flex flex-wrap gap-4 justify-between items-center mb-12">
        <a href="{{ route('posts.index') }}"
            class="flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-gray-600 to-gray-700 text-white rounded-xl hover:shadow-lg transition-all">
            <svg class="w-5 h-5 rtl:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            العودة للمدونة
        </a>

        <div class="flex gap-3">
            <x-social-share-button platform="twitter" :url="urlencode(request()->fullUrl())" color="bg-blue-400 hover:bg-blue-500"
                icon="🐦" />

            <x-social-share-button platform="facebook" :url="urlencode(request()->fullUrl())" color="bg-blue-600 hover:bg-blue-700"
                icon="📘" />

            <x-social-share-button platform="linkedin" :url="urlencode(request()->fullUrl())" color="bg-blue-800 hover:bg-blue-900"
                icon="💼" />
        </div>
    </div>

    <!-- 🟢 Comments Section -->
    <section class="bg-white shadow-xl rounded-2xl p-8 mb-12">
        <div class="flex items-center gap-3 mb-8">
            <h2 class="text-3xl font-bold text-gray-900">💬 نقاش المقال</h2>
            <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full">{{ $post->comments_count }} تعليقات</span>
        </div>

        <!-- Comment Form -->

        @auth
            <div class="bg-gray-50 p-6 rounded-xl mb-8 shadow-inner">
                @if (session('success'))
                    <x-alert type="success">
                        {{ session('success') }}
                    </x-alert>
                @endif

                <div class="flex gap-4 mb-4">
                    <div class="flex-shrink-0">
                        <x-user-avatar :user="auth()->user()" size="12" />
                    </div>
                    <form action="{{ route('comment.create') }}" method="POST" class="flex-1">
                        @csrf
                        <input type="hidden" name="name" value="{{ auth()->user()->name }}">
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                        <x-textarea id="commentBody" name="body" placeholder="شاركنا رأيك حول هذا الموضوع..."
                            class="border-2 w-full border-gray-200 focus:border-blue-500" />

                        <div class="mt-4 flex gap-3">
                            <x-button type="submit" icon="💬" color="blue">
                                نشر التعليق
                            </x-button>

                        </div>
                    </form>

                </div>
                @error('commentBody')
                    <p class="text-red-500 mt-2">{{ $message }}</p>
                @enderror
            </div>
        @else
            <x-alert type="info" icon="🔒" class="mb-8">
                للتعليق يرجى
                <x-link href="{{ route('login') }}">تسجيل الدخول</x-link> أو
                <x-link href="{{ route('register') }}">إنشاء حساب جديد</x-link>
            </x-alert>
        @endauth

        <!-- Comments List -->
        <div class="space-y-6">
            @forelse($post->comments as $comment)
                <div class="group relative p-6 bg-gray-50 rounded-xl hover:bg-white transition-colors">
                    <div class="flex gap-4">
                        <div class="flex-shrink-0">
                            <x-user-avatar :user="$comment->user" size="12" />
                        </div>

                        <div class="flex-1">
                            <div class="flex items-center gap-3 mb-2">
                                <h3 class="font-bold text-gray-900">{{ $comment->name }}</h3>
                                <span class="text-sm text-gray-500"
                                    title="{{ $comment->created_at->translatedFormat('d M Y - h:i a') }}">
                                    {{ $comment->created_at->diffForHumans() }}
                                </span>
                            </div>
                            <p class="text-gray-800 whitespace-pre-wrap leading-relaxed">{{ $comment->body }}</p>

                            <!-- Comment Reactions -->
                            <livewire:comment-reactions :comment="$comment" :key="'reactions-' . $comment->id" />
                        </div>
                    </div>
                </div>
            @empty
                <x-alert type="info" icon="💡" class="text-center py-8">
                    لا يوجد تعليقات حتى الآن، كن أول من يبدأ النقاش!
                </x-alert>
            @endforelse

            <!-- Pagination -->

        </div>
    </section>

    <!-- 🟢 Related Posts -->
    @if ($relatedPosts->isNotEmpty())
        <section class="mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-8">📚 مقالات مشابهة</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($relatedPosts as $post)
                    <x-post-card :post="$post" type="related" />
                @endforeach
            </div>
        </section>
    @endif

</x-guest-layout>
