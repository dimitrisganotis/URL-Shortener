@extends('layouts.app')

@section('title', $title)

@section('content')
<div class="container">

    <div class="bg-white p-4 shadow-sm">
        <h2 class="h2 text-center mb-4">{{ $title }}</h2>

        <div class="mb-2 px-4">
            <p class="lead">Total Clicks: {{ $url->clicks }} </p>
            <p><b>Full URL</b>: <a href="{{ $url->fullUrl }}">{{ $url->fullUrl }}</a></p>
            <p class="mb-0"><b>Short URL</b>: <a href="{{ $url->shortUrl }}">{{ $url->shortUrl }}</a></p>
        </div>
    </div>

    <div class="p-4">
        <p class="lead pt-4">
            @yield('title', config('app.name', 'Laravel')) can easily reduce long links from social media sites or any other web site, just by pasting your long url and clicking the Shorten URL button.
            <br><br>
            Shortened URLs can be used in publications, advertisements, blogs, forums, e-mails, instant messages, and other locations.
        </p>
    </div>

</div>
@endsection
