<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
        <script>
            var ua = navigator.userAgent.toLowerCase();
            var isiOS = (ua.indexOf('iphone') > -1) || (ua.indexOf('ipad') > -1);
            if(isiOS) {
                var viewport = document.querySelector('meta[name="viewport"]');
                if(viewport) {
                    var viewportContent = viewport.getAttribute('content');
                    viewport.setAttribute('content', viewportContent + ', user-scalable=no');
                }
            }
        </script>
        <title>CandyBox-Top</title>
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body class="">
        <nav class="navbar row navbar-dark p-0 m-0">
            <div class="col-3 text-center border" style="background-color:orange;">
                <p>Part0</p>
                <p class="text-nowrap small" style="font-size:9px;">説明</p>
            </div>
            <div class="col-3 text-center border" style="background-color:gray;">
                <p>Part1</p>
                <p class="text-nowrap small" style="font-size:9px;">事前アンケート</p>
            </div>
            <div class="col-3 text-center border" style="background-color:gray;">
                <p>Part2</p>
                <p class="text-nowrap small" style="font-size:9px;">CandyBox</p>
            </div>
            <div class="col-3 text-center border" style="background-color:gray;">
                <p>Part3</p>
                <p class="text-nowrap small" style="font-size:9px;">事後アンケート</p>
            </div>
        </nav>
        <div class="p-2 mb-4 container">
            <p class="p-3 lead">
            早稲田大学 創造理工学部 経営システム工学科 4年の中野と申します。</br></br>
            このアンケートの目的は、私の卒業論文にて、ECサイトにおける「迷い」を考慮した探索行動に関する研究をするにあたり、分析に必要なデータを集めることです。</br></br>
            アンケートは3つのパートからなり、各パートの回答目安時間は下記のようになります。
            </P>
            <div class="table-responsive">
                <table class="table table-bordered m-0 p-0">
                    <tr>
                        <th class="text-nowrap"></th>
                        <th class="text-nowrap">説明</th>
                        <th class="text-nowrap">回答目安時間(質問数)</th>
                    </tr>
                    <tr>
                        <td>Part1</td>
                        <td>事前アンケートです。日常におけるの消費行動についての質問が中心になります。</td>
                        <td>2分(23問)</td>
                    </tr>
                    <tr>
                        <td>Part2</td>
                        <td>架空のお菓子販売サイトで1000円以内に収まるようにお菓子を選んでください。</br>※実際に購入はされませんので安心して選んでください。</td>
                        <td>2～3分(1問)</td>
                    </tr>
                    <tr>
                        <td>Part3</td>
                        <td>事後アンケートです。感想をお聞かせください。</td>
                        <td>1分(6問)</td>
                    </tr>
                </table>
            </div>
            </br>
            <p class="p-3 lead mb-3">
                回答数が絶望的に足りていないため、協力してくださった方の中から抽選で10名様にAmazonギフト券1000円分をプレゼントするキャンペーンを実施しています。</br>希望する方はPart3(事後アンケート)にてメールアドレスをお書きください。</br>キャンペーンの抽選対象となる回答期限は11/18(水)の正午までとし、当選者には後日メールを送らせていただきます。</br>受け取りの際には受領のサインが必要となりますのでご了承ください。
            </p>
            <a href="{{ url('/questionary/form') }}">
                <button class="btn btn-primary btn-block">Part1へ進む</button>
            </a>
            </br>
            <p class="p-3 lead mb-3">
                ※アンケートや謝礼に関して、質問等ございましたら ryoku.nkn.18@toki.waseda.jp までお問い合わせください。
            </p>
        </div>
    </body>
</html>
