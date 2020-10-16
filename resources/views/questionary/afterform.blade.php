<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
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
        <link rel="stylesheet" href="/css/app.css">
        <title>QuestionaryPart3</title>
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
    <nav class="navbar row navbar-dark p-0 m-0">
            <div class="col-3 text-center border" style="background-color:gray;">
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
            <div class="col-3 text-center border" style="background-color:orange;">
                <p>Part3</p>
                <p class="text-nowrap small" style="font-size:9px;">事後アンケート</p>
            </div>
        </nav>
        <div class="container mb-5">
            <form name="questionary" action="/after_questionary/store" method="post">
                {{ csrf_field() }}

                <div class="row mx-auto">
                    <div class="mx-auto col-sm-11 col-md-8 p-1 m-1">
                        <div class="card">
                            <h5 class="card-header">アンケートでのお菓子の販売サイトは使いやすかったですか？</h5>
                            <div class="card-body">
                                <div class="radio">
                                    <label><input type="radio" name="assessment" id="radio1" value="1" checked> とても使いやすかった</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="assessment" id="radio2" value="2"> どちらかというと使いやすかった</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="assessment" id="radio3" value="3"> どちらかというと使いにくかった</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="assessment" id="radio4" value="4"> とても使いにくかった</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mx-auto">
                    <div class="mx-auto col-sm-11 col-md-8 p-1 m-1">
                        <div class="card">
                            <h5 class="card-header">商品を選ぶのにどれくらい迷いましたか？</h5>
                            <div class="card-body">
                                <div class="radio">
                                    <label><input type="radio" name="indecisive" id="radio1" value="1" checked> とても迷った</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="indecisive" id="radio2" value="2">少し迷った</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="indecisive" id="radio3" value="3"> あまり迷わなかった</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="indecisive" id="radio4" value="4"> 全く迷わなかった</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mx-auto">
                    <div class="mx-auto col-sm-11 col-md-8 p-1 m-1">
                        <div class="card">
                            <h5 class="card-header">選んだ商品に対する満足感を教えてください</h5>
                            <div class="card-body">
                                <div class="radio">
                                    <label><input type="radio" name="consent" id="radio1" value="1" checked> とても満足している</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="consent" id="radio2" value="2"> 少し満足している</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="consent" id="radio3" value="3"> あまり満足していない</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="consent" id="radio4" value="4"> 全く満足していない</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mx-auto mb-3">
                    <div class="mx-auto col-sm-11 col-md-8 p-1 m-1">
                        <div class="card">
                            <h5 class="card-header">他にほしいお菓子がある場合は記入してください</h5>
                            <div class="card-body">
                                <div class="form-group">
                                    <textarea id="textarea1" name='other_candy' class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="menu-submit">
                    <button type="submit" class="btn btn-primary btn-block">回答する</button>
                </div>
            </form>
        </div>
    </body>
</html>
