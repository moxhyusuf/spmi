<?php

namespace App\Http\Controllers;

use App\Models\Indikator;
use App\Models\Standar;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class IndikatorController extends Controller
{
    public function index(): View
    {
        $indikators = Indikator::with('standar')->latest()->get();
        return view('indikator.index', compact('indikators'));
    }

    public function create(): View
    {
        $standars = Standar::all();
        return view('indikator.create', compact('standars'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'standard_id' => 'required|exists:standar,id',
            'no_iku' => 'required|string|max:255',
            'nama' => 'required|string',
            'target' => 'required|string',
        ]);

        Indikator::create($validated);

        return redirect()
            ->route('indikator.index')
            ->with('success', 'Data indikator berhasil ditambahkan');
    }

    public function edit(Indikator $indikator): View
    {
        $standars = Standar::all();
        return view('indikator.edit', compact('indikator', 'standars'));
    }

    public function update(Request $request, Indikator $indikator): RedirectResponse
    {
        $validated = $request->validate([
            'standard_id' => 'required|exists:standar,id',
            'no_iku' => 'required|string|max:255',
            'nama' => 'required|string',
            'target' => 'required|string',
        ]);

        $indikator->update($validated);

        return redirect()
            ->route('indikator.index')
            ->with('success', 'Data indikator berhasil diperbarui');
    }

    public function destroy(Indikator $indikator): RedirectResponse
    {
        $indikator->delete();
        return redirect()
            ->route('indikator.index')
            ->with('success', 'Data indikator berhasil dihapus');
    }
}
