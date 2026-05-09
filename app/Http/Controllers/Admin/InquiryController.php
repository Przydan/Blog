<?php

namespace App\Http\Controllers\Admin;

use App\Enums\InquiryStatus;
use App\Models\Inquiry;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class InquiryController
{
    public function index(): View
    {
        $inquiries = Inquiry::with('service')->latest()->paginate(15);

        return view('admin.inquiries.index', compact('inquiries'));
    }

    public function show(Inquiry $inquiry): View
    {
        $inquiry->load(['comments.user', 'responses.user']);

        return view('admin.inquiries.show', compact('inquiry'));
    }

    public function updateStatus(Request $request, Inquiry $inquiry): RedirectResponse
    {
        $validated = $request->validate([
            'status' => ['required', Rule::enum(InquiryStatus::class)],
        ]);

        $inquiry->update($validated);

        return back()->with('success', 'Status zaktualizowany.');
    }

    public function storeComment(Request $request, Inquiry $inquiry): RedirectResponse
    {
        $validated = $request->validate(['comment' => 'required|string']);

        $inquiry->comments()->create([
            'user_id' => auth()->id(),
            'comment' => $validated['comment'],
        ]);

        return back()->with('success', 'Komentarz dodany.');
    }

    public function storeResponse(Request $request, Inquiry $inquiry): RedirectResponse
    {
        $validated = $request->validate(['message' => 'required|string']);

        $inquiry->responses()->updateOrCreate(
            ['inquiry_id' => $inquiry->id],
            [
                'user_id' => auth()->id(),
                'message' => $validated['message'],
            ]
        );

        return back()->with('success', 'Odpowiedź zapisana.');
    }

    public function markAsSent(Inquiry $inquiry): RedirectResponse
    {
        $inquiry->responses()->update([
            'is_sent' => true,
            'sent_at' => now(),
        ]);

        return back()->with('success', 'Odpowiedź oznaczona jako wysłana.');
    }
}
