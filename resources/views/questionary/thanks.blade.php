<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>thanksPage</title>

        
    </head>
    <body>
        <h1>これでアンケートは終了です。</h1>
        <div>
            <p>
            ご協力、誠にありがとうございました！！！！
            </P>
        </div>
        <a href="{{ url('/questionary') }}">
            <button>別の回答を記録する</button>
        </a>
    </body>
</html>
