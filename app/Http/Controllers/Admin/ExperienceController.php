<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ExperienceController extends Controller
{
    public function index(): View
    {
        $experiences = Experience::query()
            ->orderBy('urutan')
            ->latest()
            ->get();

        return view('admin.experiences.index', [
            'experiences' => $experiences,
        ]);
    }

    public function create(): View
    {
        return view('admin.experiences.create');
    }

    public function edit(Experience $experience): View
    {
        return view('admin.experiences.edit', [
            'experience' => $experience,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'type' => ['required', 'in:organisasi,pelatihan,pencapaian'],
            'judul' => ['required', 'string', 'max:255'],
            'institusi' => ['nullable', 'string', 'max:255'],
            'deskripsi' => ['nullable', 'string'],
            'tanggal_mulai' => ['nullable', 'date'],
            'tanggal_selesai' => ['nullable', 'date', 'after_or_equal:tanggal_mulai'],
            'gambar' => ['nullable', 'string', 'max:255'],
            'urutan' => ['nullable', 'integer', 'min:0'],
            'status' => ['nullable', 'boolean'],
        ]);

        Experience::create($validated);

        return redirect()
            ->route('admin.experiences.index')
            ->with('success', 'Pengalaman berhasil ditambahkan.');
    }

    public function update(Request $request, Experience $experience): RedirectResponse
{
    $validated = $request->validate([
        'type' => ['required', 'in:organisasi,pelatihan,pencapaian'],
        'judul' => ['required', 'string', 'max:255'],
        'institusi' => ['nullable', 'string', 'max:255'],
        'deskripsi' => ['nullable', 'string'],
        'tanggal_mulai' => ['nullable', 'date'],
        'tanggal_selesai' => ['nullable', 'date', 'after_or_equal:tanggal_mulai'],
        'gambar' => ['nullable', 'string', 'max:255'],
        'urutan' => ['nullable', 'integer', 'min:0'],
        'status' => ['nullable', 'boolean'],
    ]);

    $experience->update($validated);

    return redirect()
        ->route('admin.experiences.index')
        ->with('success', 'Pengalaman berhasil diperbarui.');
}

    public function destroy(Experience $experience): RedirectResponse
    {
        $experience->delete();

        return redirect()
            ->route('admin.experiences.index')
            ->with('success', 'Pengalaman berhasil dihapus.');
    }

    public function toggleStatus(Experience $experience): RedirectResponse
    {
        $experience->update([
            'status' => !$experience->status,
        ]);

        return redirect()
            ->route('admin.experiences.index')
            ->with('success', 'Status pengalaman berhasil diubah.');
    }
}