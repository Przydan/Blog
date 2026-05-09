<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\PortfolioRequest;
use App\Models\PortfolioProject;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PortfolioController
{
    public function index(): View
    {
        $projects = PortfolioProject::latest()->paginate(10);

        return view('admin.portfolio.index', compact('projects'));
    }

    public function create(): View
    {
        return view('admin.portfolio.create');
    }

    public function store(PortfolioRequest $request): RedirectResponse
    {
        $data = $request->validated();
        if (! empty($data['technologies'])) {
            $data['technologies'] = array_map('trim', explode(',', $data['technologies']));
        }

        PortfolioProject::create($data);

        return redirect()->route('admin.portfolio.index')->with('success', 'Project created successfully.');
    }

    public function show(PortfolioProject $portfolio): View
    {
        return view('admin.portfolio.show', compact('portfolio'));
    }

    public function edit(PortfolioProject $portfolio): View
    {
        return view('admin.portfolio.edit', compact('portfolio'));
    }

    public function update(PortfolioRequest $request, PortfolioProject $portfolio): RedirectResponse
    {
        $data = $request->validated();
        if (! empty($data['technologies'])) {
            $data['technologies'] = array_map('trim', explode(',', $data['technologies']));
        }

        $portfolio->update($data);

        return redirect()->route('admin.portfolio.index')->with('success', 'Project updated successfully.');
    }

    public function destroy(PortfolioProject $portfolio): RedirectResponse
    {
        $portfolio->delete();

        return redirect()->route('admin.portfolio.index')->with('success', 'Project deleted successfully.');
    }
}
