<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function updatePhoto(Request $request)
    {
        $request->validate([
            'photo' => [
                'required',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],
        ]);

        $disk = Storage::disk('public');

        // Hapus foto profil lama
        if ($disk->exists('profile')) {
            foreach ($disk->files('profile') as $file) {
                $disk->delete($file);
            }
        }

        // Simpan foto baru
        $extension = $request->file('photo')->extension();

        $request->file('photo')->storeAs(
            'profile',
            'profile.' . $extension,
            'public'
        );

        return redirect()
            ->route('admin.dashboard')
            ->with('success', 'Foto profil berhasil diperbarui.');
    }
}