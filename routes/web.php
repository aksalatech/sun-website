<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;
use App\Models\Blog;
use Z3d0X\FilamentFabricator\Models\Page;

Route::get('/', function () {
    $page = Page::where('slug', 'homepage')->firstOrFail();
    return view('components.filament-fabricator.layouts.default', [
        'page' => $page
    ]);
});

// Route::get('/', [PageController::class, 'home'])->name('page.home');
// Route::get('/about', [PageController::class, 'about'])->name('page.about');
// Route::get('/contact', [PageController::class, 'contact'])->name('page.contact');
// Route::get('/blog', [PageController::class, 'blog'])->name('page.blog');
// Route::get('/blog/{slug}', [PageController::class, 'blogDetail'])->name('page.blog.detail');
// Route::get('/faq', [PageController::class, 'faq'])->name('page.faq');
// Route::get('/tours', [PageController::class, 'tours'])->name('page.tours');
// Route::get('/toursDetail', [PageController::class, 'toursDetail'])->name('page.tours.detail');
// Route::get('/europamundo', [PageController::class, 'europamundo'])->name('page.europamundo');
// Route::get('/travelInsurance', [PageController::class, 'travelInsurance'])->name('page.travelInsurance');

Route::get('/tour/{id}', [PageController::class, 'toursDetail'])->name('page.tour.detail');

Route::post('/contact/send-email', [PageController::class, 'sendEmail'])->name('contact.send-email');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

Route::post('/subscribe', [PageController::class, 'subscribe'])->name('subscribe.store');

Route::get('/blog/{slug}', function ($slug) {
    $blog = Blog::where('slug', $slug)->firstOrFail();
    return view('pages.blog.detail', compact('blog'));
})->name('pages.blog.detail');


require __DIR__ . '/auth.php';
