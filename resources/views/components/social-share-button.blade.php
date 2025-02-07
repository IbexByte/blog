@props(['platform', 'url', 'color' => '', 'icon'])

@php
    $shareUrl = (new App\View\Components\SocialShareButton($platform, $url))->shareUrl();
    
    $colorClasses = [
        'blue' => 'bg-blue-600 hover:bg-blue-700',
        'red' => 'bg-red-600 hover:bg-red-700',
        'green' => 'bg-green-600 hover:bg-green-700'
    ];

    $finalColor = $colorClasses[$color] ?? $color; // استخدم القيمة المخصصة إذا لم تكن موجودة في القائمة
@endphp

<a href="{{ $shareUrl }}" 
   target="_blank"
   class="inline-flex items-center px-4 py-2 {{ $finalColor }} text-white rounded-lg transition-all shadow-sm hover:shadow-md"
   title="مشاركة عبر {{ ucfirst($platform) }}">
   
    <span class="mr-2 text-lg">{{ $icon }}</span>
    <span class="font-medium">شارك على {{ ucfirst($platform) }}</span>
</a>
