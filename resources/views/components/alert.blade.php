@props(['type' => 'success'])

@php
    $styles = [
        'success' => 'bg-green-50 border-l-4 border-green-400 text-green-700',
        'error' => 'bg-red-50 border-l-4 border-red-400 text-red-700',
    ];
@endphp

<div {{ $attributes->merge(['class' => 'px-4 py-3 rounded shadow-sm mb-4 ' . ($styles[$type] ?? $styles['success'])]) }}>
    {{ $slot }}
</div>
