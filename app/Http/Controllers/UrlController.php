<?php

namespace App\Http\Controllers;

use App\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UrlController extends Controller
{
    public function index()
    {
        $title = 'URL-Shortener';

        return view('urls.index', [
            'title' => $title,
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'fullUrl' => 'required|url',
        ]);

        $tag = Str::random(10);

        $validatedData['shortUrl'] = env('APP_URL', false).'/short-url/'.$tag;
        $validatedData['tag'] = $tag;

        Url::create($validatedData);

        $clicks = env('APP_URL', false).'/clicks/'.$tag;

        $message = '
            <p><b>Short URL</b>: <a href="'.$validatedData['shortUrl'].'">'.$validatedData['shortUrl'].'</a></p>
            <p>Check shortened URL clicks: <a href="'.$clicks.'">'.$clicks.'</a></p>
        ';

        return redirect('/urls')->with('status', $message);
    }

    public function urlClicksCounter(Request $request, URL $url)
    {
        echo "<h1>Total Clicks: $url->clicks</h1>";
    }

    public function shortToFullUrlRedirection(Request $request, URL $url)
    {
        $url->timestamps = false;
        $url->increment('clicks');

        return redirect($url->fullUrl);
    }
}
