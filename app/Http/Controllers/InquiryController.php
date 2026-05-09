<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInquiryRequest;
use App\Models\Inquiry;
use App\Models\Service;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class InquiryController
{
    public function create(Service $service): View
    {
        return view('inquiries.create', compact('service'));
    }

    public function store(StoreInquiryRequest $request): RedirectResponse
    {
        Inquiry::create($request->validated());

        return redirect()->route('services')->with('success', 'Dziękujemy za zapytanie! Skontaktujemy się wkrótce.');
    }
}
