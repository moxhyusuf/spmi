<?php

namespace App\Http\Controllers;

use App\Models\Indikator;
use App\Models\Pelaksanaan;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PelaksanaanController extends Controller
{
    public function index(): View
    {
        $pelaksanaans = Pelaksanaan::with('indikator.standar')
            ->latest()
            ->get();

        return view('pelaksanaan.index', compact('pelaksanaans'));
    }

    public function create(): View
    {
        $indikators = Indikator::with('standar')->get();

        return view('pelaksanaan.create', compact('indikators'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'indikator_id' => 'required|exists:indikator,id',
            'tanggal' => 'required|date',
            'uraian' => 'required|string',
            'dokumen' => 'nullable|file|mimes:pdf,doc,docx',
        ]);

        if ($request->hasFile('dokumen')) {
            $validated['dokumen'] = $request
                ->file('dokumen')
                ->store('dokumen', 'public');
        }

        Pelaksanaan::create($validated);

        return redirect()
            ->route('pelaksanaan.index')
            ->with('success', 'Data pelaksanaan berhasil ditambahkan');
    }

    public function edit(Pelaksanaan $pelaksanaan): View
    {
        $indikators = Indikator::with('standar')->get();

        return view('pelaksanaan.edit', compact('pelaksanaan', 'indikators'));
    }

    public function update(Request $request, Pelaksanaan $pelaksanaan): RedirectResponse
    {
        $validated = $request->validate([
            'indikator_id' => 'required|exists:indikator,id',
            'tanggal' => 'required|date',
            'uraian' => 'required|string',
            'dokumen' => 'nullable|file|mimes:pdf,doc,docx',
        ]);

        if ($request->hasFile('dokumen')) {
            $validated['dokumen'] = $request
                ->file('dokumen')
                ->store('dokumen', 'public');
        }

        $pelaksanaan->update($validated);

        return redirect()
            ->route('pelaksanaan.index')
            ->with('success', 'Data pelaksanaan berhasil diperbarui');
    }

    public function destroy(Pelaksanaan $pelaksanaan): RedirectResponse
    {
        $pelaksanaan->delete();

        return redirect()
            ->route('pelaksanaan.index')
            ->with('success', 'Data pelaksanaan berhasil dihapus');
    }
}
