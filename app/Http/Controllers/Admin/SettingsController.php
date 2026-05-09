<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SettingsController
{
    public function index(): View
    {
        $settings = new Setting;

        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request): RedirectResponse
    {
        $data = $request->except('_token', '_method');

        // Handle dark_mode toggle
        $data['dark_mode'] = $request->has('dark_mode') ? 'on' : 'off';

        // Handle supported languages array
        if ($request->has('languages')) {
            $data['supported_languages'] = implode(',', $request->languages);
            unset($data['languages']);
        }

        foreach ($data as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }

        Setting::clearCache();

        return back()->with('success', 'Ustawienia zapisane.');
    }
}
