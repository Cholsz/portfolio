<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Models\Project;
use App\Models\Category;
use App\Models\Experience;

use App\Http\Controllers\Admin\ExperienceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\CategoryController;


/*
|--------------------------------------------------------------------------
| Public
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    $categories = \App\Models\Category::where('status', true)
        ->orderBy('nama')
        ->get();

    $categorySlug = request('category');

    $projects = Project::with('category')
        ->where('status', true)
        ->when($categorySlug, function ($query) use ($categorySlug) {
            $query->whereHas('category', function ($categoryQuery) use ($categorySlug) {
                $categoryQuery->where('slug', $categorySlug);
            });
        })
        ->orderBy('urutan')
        ->orderByDesc('created_at')
        ->get();

    $experiences = Experience::where('status', true)
        ->orderBy('urutan')
        ->orderByDesc('created_at')
        ->get();

    return view('home', compact(
        'projects',
        'categories',
        'categorySlug',
        'experiences'
    ));
})->name('home');

Route::get('/projects/{project:slug}', [ProjectController::class, 'show'])
    ->name('projects.show');


/*
|--------------------------------------------------------------------------
| Admin Authentication
|--------------------------------------------------------------------------
*/

Route::get('/admin/login', [AdminAuthController::class, 'showLogin'])
    ->name('admin.login');

Route::post('/admin/login', [AdminAuthController::class, 'login'])
    ->name('admin.login.submit');

Route::post('/admin/logout', [AdminAuthController::class, 'logout'])
    ->middleware('admin')
    ->name('admin.logout');


/*
|--------------------------------------------------------------------------
| Protected Admin
|--------------------------------------------------------------------------
*/

Route::middleware('admin')->group(function () {

    Route::resource('/admin/experiences', ExperienceController::class)
    ->except(['show'])
    ->names('admin.experiences');

    Route::patch(
        '/admin/experiences/{experience}/toggle-status',
        [ExperienceController::class, 'toggleStatus']
    )->name('admin.experiences.toggle-status');

    Route::get('/admin', function () {

    $totalProjects = Project::count();

    $activeProjects = Project::where('status', true)->count();

    $totalCategories = Category::count();

    $activeCategories = Category::where('status', true)->count();

    $totalOrganisasi = Experience::where('type', 'organisasi')->count();

    $totalPelatihan = Experience::where('type', 'pelatihan')->count();

    $totalPencapaian = Experience::where('type', 'pencapaian')->count();

    return view('admin.dashboard', compact(
        'totalProjects',
        'activeProjects',
        'totalCategories',
        'activeCategories',
        'totalOrganisasi',
        'totalPelatihan',
        'totalPencapaian'
    ));

})->name('admin.dashboard');


    /*
    |--------------------------------------------------------------------------
    | Profile
    |--------------------------------------------------------------------------
    */

    Route::post('/profile-photo', [ProfileController::class, 'updatePhoto'])
        ->name('profile.photo.update');


    /*
    |--------------------------------------------------------------------------
    | Projects
    |--------------------------------------------------------------------------
    */

    Route::resource('/admin/projects', ProjectController::class)
        ->except(['show'])
        ->names('admin.projects');

    Route::patch(
        '/admin/projects/{project}/toggle-status',
        [ProjectController::class, 'toggleStatus']
    )->name('admin.projects.toggle-status');


    /*
    |--------------------------------------------------------------------------
    | Categories
    |--------------------------------------------------------------------------
    */

    Route::resource('/admin/categories', CategoryController::class)
        ->except(['show'])
        ->names('admin.categories');

    Route::patch(
        '/admin/categories/{category}/toggle-status',
        [CategoryController::class, 'toggleStatus']
    )->name('admin.categories.toggle-status');

});