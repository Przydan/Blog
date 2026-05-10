@props(['type' => 'success'])

@php
    $styles = [
        'success' => 'bg-green-50 border-l-4 border-green-400 text-green-700 dark:bg-green-900/20 dark:border-green-600 dark:text-green-400',
        'error' => 'bg-red-50 border-l-4 border-red-400 text-red-700 dark:bg-red-900/20 dark:border-red-600 dark:text-red-400',
    ];
@endphp

<div {{ $attributes->merge(['class' => 'px-4 py-3 rounded shadow-sm mb-4 ' . ($styles[$type] ?? $styles['success'])]) }}>
    {{ $slot }}
</div>
