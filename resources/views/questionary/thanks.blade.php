<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <!-- <script src="{{ mix('js/app.js') }}" defer></script> -->

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('custom/css/custom.css') }}" rel="stylesheet">

        <title>thanksPage</title>

        
    </head>
    <body>
        <div class="p-2 mb-4 container">

            <h4 class="text-center p-3">これでアンケートは終了です。</h4>
            <div class="text-center">
                <h2 class="text-center p-3">ご協力、誠にありがとうございました！</h2>
                <img class="w-100 maxWidth2" src="{{$url}}/wasebare.jpeg">
                <a class="text-center" href="{{ url('/questionary') }}">
                    <button class="btn btn-primary btn-block">別の回答を記録する</button>
                </a>
            </div>
        </div>
    </body>
</html>
