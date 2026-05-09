<div class="flex gap-2">
    <a href="{{ route('language.switch', 'en') }}" class="{{ app()->getLocale() == 'en' ? 'font-bold' : '' }}">EN</a>
    <a href="{{ route('language.switch', 'pl') }}" class="{{ app()->getLocale() == 'pl' ? 'font-bold' : '' }}">PL</a>
</div>