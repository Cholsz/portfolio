<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Menampilkan semua kategori.
     */
    public function index()
    {
        $categories = Category::orderBy('nama')->get();

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Menampilkan form tambah kategori.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Menyimpan kategori baru.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => ['required', 'string', 'max:255'],
        ]);

        $slug = Str::slug($validated['nama']);

        $baseSlug = $slug;
        $counter = 1;

        while (Category::where('slug', $slug)->exists()) {
            $slug = $baseSlug . '-' . $counter;
            $counter++;
        }

        Category::create([
            'nama' => $validated['nama'],
            'slug' => $slug,
            'status' => $request->boolean('status'),
        ]);

        return redirect()
            ->route('admin.categories.index')
            ->with('success', 'Kategori berhasil ditambahkan.');
    }

    /**
     * Menampilkan form edit kategori.
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Memperbarui kategori.
     */
    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'nama' => ['required', 'string', 'max:255'],
        ]);

        $slug = Str::slug($validated['nama']);

        if ($slug !== $category->slug) {
            $baseSlug = $slug;
            $counter = 1;

            while (
                Category::where('slug', $slug)
                    ->where('id', '!=', $category->id)
                    ->exists()
            ) {
                $slug = $baseSlug . '-' . $counter;
                $counter++;
            }
        } else {
            $slug = $category->slug;
        }

        $category->update([
            'nama' => $validated['nama'],
            'slug' => $slug,
            'status' => $request->boolean('status'),
        ]);

        return redirect()
            ->route('admin.categories.index')
            ->with('success', 'Kategori berhasil diperbarui.');
    }

    /**
     * Menghapus kategori.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()
            ->route('admin.categories.index')
            ->with('success', 'Kategori berhasil dihapus.');
    }

    /**
     * Mengaktifkan / menonaktifkan kategori.
     */
    public function toggleStatus(Category $category)
    {
        $category->update([
            'status' => !$category->status,
        ]);

        return redirect()
            ->route('admin.categories.index')
            ->with('success', 'Status kategori berhasil diperbarui.');
    }
}