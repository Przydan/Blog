<div class="flex gap-2">
    <a href="{{ route('language.switch', 'en') }}" class="{{ app()->getLocale() == 'en' ? 'font-bold underline' : '' }} text-xs uppercase hover:text-blue-600 transition">EN</a>
    <a href="{{ route('language.switch', 'pl') }}" class="{{ app()->getLocale() == 'pl' ? 'font-bold underline' : '' }} text-xs uppercase hover:text-blue-600 transition">PL</a>
</div>
