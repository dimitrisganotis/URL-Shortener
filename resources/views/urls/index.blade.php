@extends('layouts.app')

@section('title', $title)

@section('content')
<div class="container">

    <div class="bg-white p-4 shadow-sm">
        <h2 class="h2 text-center mb-4">Shorten your links easy & free</h2>

        <form method="POST" action="/urls" class="mb-4">
            @csrf

            <div class="input-group px-4">
                <input name="fullUrl" type="text" class="form-control @error('fullUrl') is-invalid @enderror" placeholder="Enter your link here">

                <div class="input-group-append">
                    <button class="btn btn-secondary" type="submit">Shorten URL</button>
                </div>

                @error('fullUrl')
                    <div class="invalid-feedback">
                        {{ $errors->first('fullUrl') }}
                    </div>
                @enderror
            </div>
        </form>

        @if (session('status'))
            <div class="mb-2">
                {!! session('status') !!}
            </div>
        @endif
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

@section('javascript')
    <script type="text/javascript">
        window.addEventListener('load', function() {

        });
    </script>
@endsection
