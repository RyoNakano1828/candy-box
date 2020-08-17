<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
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
                                    <label><input type="radio" name="assessment" id="radio2" value="2"> 使いやすかった</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="assessment" id="radio3" value="3"> どちらかというと使いやすかった</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="assessment" id="radio4" value="4"> どちらかというと使いにくかった</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="assessment" id="radio5" value="5"> 使いにくかった</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="assessment" id="radio6" value="6"> とても使いにくかった</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mx-auto mb-3">
                    <div class="mx-auto col-sm-11 col-md-8 p-1 m-1">
                        <div class="card">
                            <h5 class="card-header">アンケートについての感想をお願いします。</h5>
                            <div class="card-body">
                                <div class="form-group">
                                    <textarea id="textarea1" name='comment' class="form-control"></textarea>
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
