@extends('layouts.app')

@section('title', $title)

@section('content')
<div class="container">

    <div class="bg-white p-4 shadow-sm">
        <h2 class="h2 text-center mb-4">Shorten your links easy & free</h2>

        <form id="short-url-form" method="POST" action="/urls" class="mb-4 px-4">
            @csrf

            <div id="form-input-group" class="input-group">
                <input name="fullUrl" id="fullUrl" type="text" class="form-control" placeholder="Enter your link here">

                <div class="input-group-append">
                    <button class="btn btn-secondary" type="submit">Shorten URL</button>
                </div>
            </div>
        </form>

        <div id="short-url-response" class="mb-2 px-4"></div>
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
            $('#short-url-form').submit(function(e) {
                var $this = $(this);
                e.preventDefault();
                var response = $('#short-url-response');
                var input = $('#fullUrl');
                var invalid_input = $('#form-input-group');

                if ($this.prop('disabled'))
                    return;

                $.ajax({
                    type: $this.attr('method'),
                    url: $this.attr('action'),
                    data: $this.serialize(),
                    beforeSend: function() {
                        $this.prop('disabled', true);
                        response.html('<i class="fas fa-spinner fa-spin fa-2x"></i>');
                        input.removeClass('is-invalid');
                        $('.invalid-feedback').remove();
                    },
                    success: function(data) {
                        var short_url = '<p><b>Short URL</b>: <a href="' + data.short_url+ '">' + data.short_url+ '</a></p>';
                        var clicks = '<p class="mb-0">Check shortened URL clicks: <a href="' + data.clicks+ '">' + data.clicks+ '</a></p>';

                        response.html(short_url + clicks);
                    },
                    error: function(jqxhr, exception) {
                        response.text('');

                        if( jqxhr.status === 422 ) {
                            var fullUrlError = jqxhr.responseJSON.errors.fullUrl[0];

                            input.addClass('is-invalid');
                            invalid_input.append('<div class="invalid-feedback">' + fullUrlError +'</div>');
                        } else {
                            response.html('Error: ' + jqxhr.responseText);
                        }
                    },
                    complete: function() {
                        $this.prop('disabled', false);
                    }
                })
            });
        });
    </script>
@endsection
