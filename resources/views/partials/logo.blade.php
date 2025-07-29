@php
    $sizes = [
        'xs' => 'h-6',
        'sm' => 'h-8',
        'md' => 'h-12',
        'lg' => 'h-16',
    ];
    $size = $size ?? 'md';
    $animated = $animated ?? true;
    $classes = $sizes[$size] . ' w-auto';
    if ($animated) {
        $classes .= ' transition-transform hover:scale-105';
    }
@endphp
<img
    src="{{ asset('images/' . config('app.logo_black'), true) }}"
    alt="{{ config('app.name') }} Logo"
    class="{{ $classes }} logo-image"
    style="display: none;"
    id="logo-light"
/>
<img
    src="{{ asset('images/' . config('app.logo_white')) }}"
    alt="{{ config('app.name') }} Logo"
    class="{{ $classes }} logo-image"
    style="display: block;"
    id="logo-dark"
/>
