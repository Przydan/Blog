<div class="flex gap-2">
    @foreach($siteSettings->supported_languages as $lang)
        <a href="{{ route('language.switch', trim($lang)) }}" class="{{ app()->getLocale() == trim($lang) ? 'font-bold' : '' }} uppercase text-xs">
            {{ trim($lang) }}
        </a>
    @endforeach
</div>