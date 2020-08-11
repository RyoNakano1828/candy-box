<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ExplanationPage</title>
    </head>
    <body>
        <h1>Part2</h1>
        <div>
            <h5 class="modal-title" id="Modal">あなたが今、家にあったらうれしいお菓子を<strong>5つ</strong>選んでください</h5>
            <p>※同じお菓子を複数選択しても構いません</p>
            <p>※架空の販売サイトですので、実際に購入はされません</p>
        </div>
        <a href="{{ url('/candybox') }}">
            <button>Part2スタート</button>
        </a>
    </body>
</html>
