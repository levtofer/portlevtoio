<?php

use Illuminate\Support\Facades\Route;
use App\Models\Project;
use App\Models\Guestbook;
use App\Http\Controllers\WorksController;
use App\Http\Controllers\GuestbookController;
use App\Http\Controllers\GalleryController;
use Illuminate\Support\Facades\Http;

Route::get('/debug', function () {
    $checks = [
        'php_version' => phpversion(),
        'app_env' => env('APP_ENV'),
        'app_key_set' => !empty(env('APP_KEY')),
        'app_url' => env('APP_URL'),
        'db_host' => env('DB_HOST'),
        'db_connection' => env('DB_CONNECTION'),
    ];

    // Test DB connection
    try {
        DB::connection()->getPdo();
        $checks['db_connected'] = true;
    } catch (\Exception $e) {
        $checks['db_connected'] = false;
        $checks['db_error'] = $e->getMessage();
    }

    return response()->json($checks);
});

Route::get('/', function () {
    $projects = Project::where('featured', true)
        ->where('status', 'published')
        ->orderBy('order')
        ->limit(3)
        ->get();

    $notes = Guestbook::latest()->limit(3)->get();

    return view('home', compact('projects', 'notes'));
});

Route::get('/works', [WorksController::class, 'index']);
Route::get('/works/{project}', [WorksController::class, 'show']);

Route::get('/about', function () {
    return view('about.about');
});

Route::get('/tools', function () {
    return view('tools.tools');
});

Route::get('/guestbook', [GuestbookController::class, 'index'])->name('guestbook');
Route::post('/guestbook', [GuestbookController::class, 'store'])->name('guestbook.store');

Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');

Route::get('/contact', function () {
    return view('contact.contact');
})->name('contact');

Route::get('/music/now', function () {
    $key      = env('LASTFM_API_KEY');
    $username = env('LASTFM_USERNAME');

    $response = Http::get("https://ws.audioscrobbler.com/2.0/", [
        'method'  => 'user.getrecenttracks',
        'user'    => $username,
        'api_key' => $key,
        'format'  => 'json',
        'limit'   => 1,
    ]);

    $track = $response->json()['recenttracks']['track'][0] ?? null;

    if (!$track) {
        $tracks = config('music.tracks');
        $index  = (int) floor(time() / 180) % count($tracks);
        return response()->json($tracks[$index]);
    }

    return response()->json([
        'track'  => $track['name'],
        'artist' => $track['artist']['#text'],
        'live'   => isset($track['@attr']['nowplaying']),
    ])->withHeaders([
        'Cache-Control' => 'no-cache, no-store, must-revalidate',
        'Pragma'        => 'no-cache',
    ]);
});