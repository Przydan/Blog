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

        // Handle dark_mode switch which might be missing if unchecked
        if (! isset($data['dark_mode'])) {
            $data['dark_mode'] = 'off';
        }

        foreach ($data as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }

        Setting::clearCache();

        return back()->with('success', 'Ustawienia zapisane.');
    }
}
