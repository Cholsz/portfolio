<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Menampilkan semua project di halaman admin.
     */
    public function index()
    {
        $projects = Project::with('category')
            ->orderBy('urutan')
            ->orderByDesc('created_at')
            ->get();

        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Menampilkan form tambah project.
     */
    public function create()
    {
        $categories = Category::where('status', true)
            ->orderBy('nama')
            ->get();

        return view('admin.projects.create', compact('categories'));
    }

    /**
     * Menyimpan project baru.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => ['required', 'string', 'max:255'],

            'category_id' => [
                'required',
                'exists:categories,id',
            ],

            'deskripsi' => [
                'required',
                'string',
            ],

            'gambar' => [
                'required',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:4096',
            ],

            'teknologi' => [
                'nullable',
                'string',
            ],

            'github_url' => [
                'nullable',
                'url',
                'max:255',
            ],

            'demo_url' => [
                'nullable',
                'url',
                'max:255',
            ],

            'urutan' => [
                'nullable',
                'integer',
                'min:0',
            ],
        ]);

        /*
        |--------------------------------------------------------------------------
        | Ambil kategori
        |--------------------------------------------------------------------------
        */

        $category = Category::findOrFail($validated['category_id']);

        /*
        |--------------------------------------------------------------------------
        | Buat slug otomatis
        |--------------------------------------------------------------------------
        */

        $slug = Str::slug($validated['judul']);

        $baseSlug = $slug;
        $counter = 1;

        while (Project::where('slug', $slug)->exists()) {
            $slug = $baseSlug . '-' . $counter;
            $counter++;
        }

        /*
        |--------------------------------------------------------------------------
        | Simpan gambar
        |--------------------------------------------------------------------------
        */

        $gambar = $request->file('gambar');

        $namaGambar = Str::uuid() . '.' . $gambar->extension();

        $gambar->storeAs(
            'projects',
            $namaGambar,
            'public'
        );

        $gambarPath = 'projects/' . $namaGambar;

        /*
        |--------------------------------------------------------------------------
        | Simpan project
        |--------------------------------------------------------------------------
        */

        Project::create([
            'judul' => $validated['judul'],
            'slug' => $slug,

            // Sistem kategori baru
            'category_id' => $category->id,

            // Tetap diisi selama masa transisi
            'kategori' => $category->nama,

            'deskripsi' => $validated['deskripsi'],
            'gambar' => $gambarPath,
            'teknologi' => $validated['teknologi'] ?? null,
            'github_url' => $validated['github_url'] ?? null,
            'demo_url' => $validated['demo_url'] ?? null,
            'urutan' => $validated['urutan'] ?? 0,
            'status' => $request->boolean('status'),
        ]);

        return redirect()
            ->route('admin.projects.index')
            ->with('success', 'Project berhasil ditambahkan.');
    }

    /**
     * Menampilkan form edit project.
     */
    public function show(Project $project)
{
    abort_if(!$project->status, 404);

    $project->load('category');

    return view('projects.show', compact('project'));
}
    public function edit(Project $project)
    {
        $categories = Category::where('status', true)
            ->orderBy('nama')
            ->get();

        return view('admin.projects.edit', compact(
            'project',
            'categories'
        ));
    }

    /**
     * Memperbarui project.
     */
    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'judul' => [
                'required',
                'string',
                'max:255',
            ],

            'category_id' => [
                'required',
                'exists:categories,id',
            ],

            'deskripsi' => [
                'required',
                'string',
            ],

            'gambar' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:4096',
            ],

            'teknologi' => [
                'nullable',
                'string',
            ],

            'github_url' => [
                'nullable',
                'url',
                'max:255',
            ],

            'demo_url' => [
                'nullable',
                'url',
                'max:255',
            ],

            'urutan' => [
                'nullable',
                'integer',
                'min:0',
            ],
        ]);

        /*
        |--------------------------------------------------------------------------
        | Ambil kategori
        |--------------------------------------------------------------------------
        */

        $category = Category::findOrFail($validated['category_id']);

        /*
        |--------------------------------------------------------------------------
        | Update slug jika judul berubah
        |--------------------------------------------------------------------------
        */

        $slug = Str::slug($validated['judul']);

        if ($slug !== $project->slug) {

            $baseSlug = $slug;
            $counter = 1;

            while (
                Project::where('slug', $slug)
                    ->where('id', '!=', $project->id)
                    ->exists()
            ) {
                $slug = $baseSlug . '-' . $counter;
                $counter++;
            }

        } else {

            $slug = $project->slug;
        }

        /*
        |--------------------------------------------------------------------------
        | Data project
        |--------------------------------------------------------------------------
        */

        $data = [
            'judul' => $validated['judul'],
            'slug' => $slug,

            // Sistem kategori baru
            'category_id' => $category->id,

            // Tetap sinkron dengan sistem lama
            'kategori' => $category->nama,

            'deskripsi' => $validated['deskripsi'],
            'teknologi' => $validated['teknologi'] ?? null,
            'github_url' => $validated['github_url'] ?? null,
            'demo_url' => $validated['demo_url'] ?? null,
            'urutan' => $validated['urutan'] ?? 0,
            'status' => $request->boolean('status'),
        ];

        /*
        |--------------------------------------------------------------------------
        | Jika user mengganti gambar
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('gambar')) {

            $gambar = $request->file('gambar');

            $namaGambar = Str::uuid() . '.' . $gambar->extension();

            $gambar->storeAs(
                'projects',
                $namaGambar,
                'public'
            );

            $gambarLama = $project->gambar;

            $data['gambar'] = 'projects/' . $namaGambar;

            /*
            |----------------------------------------------------------------------
            | Hapus gambar lama
            |----------------------------------------------------------------------
            */

            if ($gambarLama) {
                Storage::disk('public')->delete($gambarLama);
            }
        }

        /*
        |--------------------------------------------------------------------------
        | Update project
        |--------------------------------------------------------------------------
        */

        $project->update($data);

        return redirect()
            ->route('admin.projects.index')
            ->with('success', 'Project berhasil diperbarui.');
    }

    /**
     * Menghapus project.
     */
    public function destroy(Project $project)
    {
        /*
        |--------------------------------------------------------------------------
        | Hapus gambar
        |--------------------------------------------------------------------------
        */

        if ($project->gambar) {
            Storage::disk('public')->delete($project->gambar);
        }

        /*
        |--------------------------------------------------------------------------
        | Hapus project
        |--------------------------------------------------------------------------
        */

        $project->delete();

        return redirect()
            ->route('admin.projects.index')
            ->with('success', 'Project berhasil dihapus.');
    }

    /**
     * Mengaktifkan / menonaktifkan project.
     */
    public function toggleStatus(Project $project)
    {
        $project->update([
            'status' => !$project->status,
        ]);

        return redirect()
            ->route('admin.projects.index')
            ->with('success', 'Status project berhasil diperbarui.');
    }
}