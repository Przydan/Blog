@props(['variant' => 'primary', 'href' => null, 'type' => 'button'])

@php
    $base = 'inline-block px-4 py-2 rounded text-sm font-medium transition';
    $variants = [
        'primary' => 'bg-blue-600 text-white hover:bg-blue-700',
        'secondary' => 'bg-slate-200 text-slate-800 hover:bg-slate-300',
        'danger' => 'bg-red-100 text-red-700 hover:bg-red-200',
        'view' => 'bg-blue-100 text-blue-700 hover:bg-blue-200',
        'edit' => 'bg-indigo-100 text-indigo-700 hover:bg-indigo-200',
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
