@props(['variant' => 'primary', 'href' => null, 'type' => 'button'])

@php
    $base = 'inline-block px-4 py-2 rounded text-sm font-medium transition';
    $variants = [
        'primary' => 'bg-[var(--color-primary)] text-white hover:bg-[var(--color-primary-hover)]',
        'secondary' => 'bg-slate-200 text-slate-800 hover:bg-slate-300 dark:bg-slate-700 dark:text-slate-200 dark:hover:bg-slate-600',
        'danger' => 'bg-red-100 text-red-700 hover:bg-red-200 dark:bg-red-900/30 dark:text-red-400 dark:hover:bg-red-900/50',
        'view' => 'bg-slate-100 text-slate-700 hover:bg-slate-200 dark:bg-slate-800 dark:text-slate-300 dark:hover:bg-slate-700',
        'edit' => 'bg-indigo-100 text-indigo-700 hover:bg-indigo-200 dark:bg-indigo-900/30 dark:text-indigo-400 dark:hover:bg-indigo-900/50',
    ];
@endphp

@if($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $base . ' ' . ($variants[$variant] ?? $variants['primary'])]) }}>
        {{ $slot }}
    </a>
@else
    <button type="{{ $type }}" {{ $attributes->merge(['class' => $base . ' ' . ($variants[$variant] ?? $variants['primary'])]) }}>
        {{ $slot }}
    </button>
@endif
