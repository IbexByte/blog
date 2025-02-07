@props(['user', 'size'])

@php
    $sizeClasses = [
        '8' => 'w-8 h-8 text-sm',
        '12' => 'w-12 h-12 text-lg',
        '16' => 'w-16 h-16 text-xl'
    ];
@endphp

<div {{ $attributes->merge(['class' => 'relative inline-block']) }}>
    @if($user?->profile_photo_path)
        <img src="{{ asset('storage/' . $user->profile_photo_path) }}" 
             class="rounded-full {{ $sizeClasses[$size] }} object-cover border-2 border-white shadow-sm">
    @else
        <div class="bg-gradient-to-r from-blue-500 to-purple-500 {{ $sizeClasses[$size] }} 
                   rounded-full flex items-center justify-center text-white font-bold
                   hover:rotate-12 transition-transform cursor-pointer">
            {{ $initials() }}
        </div>
    @endif
    
    @if($user?->isOnline())
        <span class="absolute bottom-0 right-0 w-3 h-3 bg-green-500 rounded-full border-2 border-white"></span>
    @endif
</div>
