<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ExplanationPage</title>
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <nav class="navbar row navbar-dark p-0">
            <div class="col text-center border" style="background-color:gray;">
                <p>Part0</p>
                <p class="text-nowrap">説明</p>
            </div>
            <div class="col text-center border" style="background-color:gray;">
                <p>Part1</p>
                <p class="text-nowrap">事前アンケート</p>
            </div>
            <div class="col text-center border" style="background-color:orange;">
                <p>Part2</p>
                <p class="text-nowrap">CandyBox</p>
            </div>
            <div class="col text-center border" style="background-color:gray;">
                <p>Part3</p>
                <p class="text-nowrap">事後アンケート</p>
            </div>
        </nav>
        <div class="container p-2">
            <h5 class="modal-title" id="Modal">あなたが今、家にあったらうれしいお菓子を<strong>5つ</strong>選んでください</h5>
            <p>※同じお菓子を複数選択しても構いません</p>
            <p>※架空の販売サイトですので、実際に購入はされません</p>
        </div>
        <a href="{{ url('/candybox') }}">
            <button class="btn btn-primary btn-block">Part2スタート</button>
        </a>
    </body>
</html>
