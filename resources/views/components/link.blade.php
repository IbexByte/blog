<a href="{{ $href }}" target="{{ $target }}" class="{{ $class }}">
    {{ $slot }}
    @if ($external)
        <span class="ml-1">🔗</span>
    @endif
</a>
