<?php

namespace App\Http\Controllers;

use App\Models\Standar;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StandarController extends Controller
{
    public function index(): View
    {
        $standar = Standar::latest()->get();
        return view('standar.index', compact('standar'));
    }

    public function create(): View
    {
        return view('standar.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nomor' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'tanggal_perumusan' => 'required|string|max:255',
            'tanggal_pengesahan' => 'required|string|max:255',
        ]);

        Standar::create($validated);

        return redirect()
            ->route('standar.index')
            ->with('success', 'Data standar berhasil ditambahkan');
    }

    public function edit(Standar $standar): View
    {
        return view('standar.edit', compact('standar'));
    }

    public function update(Request $request, Standar $standar): RedirectResponse
    {
        $validated = $request->validate([
            'nomor' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'tanggal_perumusan' => 'required|string|max:255',
            'tanggal_pengesahan' => 'required|string|max:255',
        ]);

        $standar->update($validated);

        return redirect()
            ->route('standar.index')
            ->with('success', 'Data standar berhasil diperbarui');
    }

    public function destroy(Standar $standar): RedirectResponse
    {
        $standar->delete();
        return redirect()
            ->route('standar.index')
            ->with('success', 'Data standar berhasil dihapus');
    }
}
