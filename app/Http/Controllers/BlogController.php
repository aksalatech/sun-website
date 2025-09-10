<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Blog;
use App\Models\Social;

class BlogController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function list(Request $request): View
    {
        return view('pages.blogs.list', [
            'items' => Blog::where('is_active', true)->get(),
            'socials' => Social::all(),
        ]);
    }
}
