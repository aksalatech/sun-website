<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

use App\Mail\ContactMessageMail;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

use App\Models\{
    Slide,
    Blog,
    Infografis,
    Gallery,
    Video,
    Counter,
    Testimoni,
    Team,
    Category_layanan,
    Layanan,
    Contact,
    Subscription
};

class PageController extends Controller
{
    public function home(Request $request): View
    {
        return view('pages.home', [
            'slides' => Slide::where('visible', true)->OrderBy('order')->get(),
            'counter' => Counter::OrderBy('created_at', 'desc')->get(),
            'testimoni' => Testimoni::OrderBy('created_at', 'desc')->get(),
            'teams' => Team::OrderBy('seq_no', 'asc')->get(),
            'berita_terhangat' => Blog::where('is_popular', true)->get(),
            'berita_terkini' => Blog::where('is_popular', false)->OrderBy('created_at', 'desc')->get(),
            'category_layanan' => Category_layanan::OrderBy('seq_no', 'asc')->get(),
            'layanan_kepegawaian' => Layanan::OrderBy('created_at', 'desc')->get(),
            'contact' => Contact::all()->first()
        ]);
    }

    public function about(Request $request): View
    {
        return view('pages.about', [
            // 'content' => PageContent::whereIn('tag', ['infografis', 'footer', 'cta'])->pluck('value', 'code')->toArray(),
            // 'infografis' => Infografis::OrderBy('created_at', 'desc')->get(),
            // 'socials' => Social::all(),
        ]);
    }

    public function faq(Request $request): View
    {
        return view('pages.faq', [
            // 'content' => PageContent::whereIn('tag', ['infografis', 'footer', 'cta'])->pluck('value', 'code')->toArray(),
            // 'infografis' => Infografis::OrderBy('created_at', 'desc')->get(),
            // 'socials' => Social::all(),
        ]);
    }

    public function contact(Request $request): View
    {
        return view('pages.contact', [
            // 'content' => PageContent::whereIn('tag', ['infografis', 'footer', 'cta'])->pluck('value', 'code')->toArray(),
            // 'infografis' => Infografis::OrderBy('created_at', 'desc')->get(),
            // 'socials' => Social::all(),
        ]);
    }

    public function blog(Request $request): View
    {
        return view('pages.blog', [
            // 'berita' => Blog::where('slug', $slug)->firstOrFail(),
            // 'contact' => Contact::all()->first()
        ]);
    }

    public function blogDetail(Request $request, $slug): View
    {
        return view('pages.blog-detail', [
            'blog' => Blog::where('slug', $slug)->firstOrFail(),
        ]);
    }

    public function search(Request $request): View
    {
        $keyword = $request->input('q');

        $beritas = Blog::query()
            ->where('title', 'like', "%{$keyword}%")
            ->orWhere('content', 'like', "%{$keyword}%")
            ->get();

        return view('pages.search', [
            'beritas' => $beritas,
            'keyword' => $keyword,
            'contact' => Contact::all()->first(),
        ]);
    }

    public function tours(Request $request): View
    {
        return view('pages.tours', [
            // 'gallery' => Gallery::orderBy('created_at', 'desc')->get(),
        ]);
    }

    // public function toursDetail(Request $request, string $slug): View
    public function toursDetail(Request $request): View
    {
        return view('pages.tours-detail', [
            // 'tours' => Tours::where('slug', $slug)->firstOrFail(),
        ]);
    }

    public function europamundo(Request $request): View
    {
        return view('pages.europamundo', [
            // 'video' => Video::orderBy('created_at', 'desc')->get(),
            // 'gallery' => Gallery::orderBy('created_at', 'desc')->get()
        ]);
    }

    public function travelInsurance(Request $request): View
    {
        return view('pages.travelInsurance', [
            // 'video' => Video::orderBy('created_at', 'desc')->get(),
            // 'gallery' => Gallery::orderBy('created_at', 'desc')->get()
        ]);
    }

    public function subscribe(Request $request): RedirectResponse
    {
        $request->validate(['email' => 'required|email|unique:subscriptions,email']);
        Subscription::create(['email' => $request->email]);
        Alert::success('Subscribed!', 'Thank you for subscribing.');
        return back();
    }

    public function sendEmail(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'phone' => 'nullable|string|max:20',
            'email' => 'required|email',
            'category' => 'required|string',
            'message' => 'required|string',
            'cf-turnstile-response' => 'required|string',
        ]);

        // Verifikasi CAPTCHA Turnstile
        $captchaResponse = Http::asForm()->post('https://challenges.cloudflare.com/turnstile/v0/siteverify', [
            'secret' => env('TURNSTILE_SECRET_KEY'),
            'response' => $request->input('cf-turnstile-response'),
            'remoteip' => $request->ip(),
        ]);

        if (!($captchaResponse->json()['success'] ?? false)) {
            return back()->withErrors(['captcha' => 'Verifikasi CAPTCHA gagal. Silakan coba lagi.'])->withInput();
        }

        // Kirim email (opsional)
        $data = $request->only(['name', 'email', 'phone', 'category', 'message']);

        Mail::to('admin@bintangfajarabadi.com')->send(new ContactMessageMail($data));

        return back()->with('success', 'Pesan Anda telah berhasil dikirim.');
    }

}
