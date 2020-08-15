<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>CandyBox-Top</title>
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
            <div class="col text-center border" style="background-color:orange;">
                <p>Part0</p>
                <p class="text-nowrap">説明</p>
            </div>
            <div class="col text-center border" style="background-color:gray;">
                <p>Part1</p>
                <p class="text-nowrap">事前アンケート</p>
            </div>
            <div class="col text-center border" style="background-color:gray;">
                <p>Part2</p>
                <p class="text-nowrap">CandyBox</p>
            </div>
            <div class="col text-center border" style="background-color:gray;">
                <p>Part3</p>
                <p class="text-nowrap">事後アンケート</p>
            </div>
        </nav>
        <div class="container p-2">
            <p class="p-3 lead">
            早稲田大学 創造理工学部 経営システム工学科 4年の中野と申します。</br></br>
            このアンケートの目的は、人はどのような時にどのようなお菓子を食べたくなるのかを架空のお菓子販売サイト（CandyBox）を用いて検証することです。</br></br>
            アンケートは3つのパートからなり、各パートの回答目安時間は下記のようになります。
            </P>
            <table class="table table-bordered">
                <tr>
                    <th class="text-nowrap">タイトル</th>
                    <th class="text-nowrap">説明</th>
                    <th class="text-nowrap">回答目安時間(質問数)</th>
                </tr>
                <tr>
                    <td>Part1</td>
                    <td>事前アンケートです。あまり考えず直感的に選んでください</td>
                    <td>約2分(23問×5秒)</td>
                </tr>
                <tr>
                    <td>Part2</td>
                    <td>架空のお菓子販売サイト（CandyBox）で5つのお菓子を選んでください</td>
                    <td>約2～5分(1問)</td>
                </tr>
                <tr>
                    <td>Part3</td>
                    <td>事後アンケートです。</td>
                    <td>約1分(2問)</td>
                </tr>
            </table>
            <a href="{{ url('/questionary/form') }}">
                <button class="btn btn-primary btn-block">Part1へ進む</button>
            </a>
        </div>
        
    </body>
</html>
