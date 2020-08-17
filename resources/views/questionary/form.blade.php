<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>QuestionaryPart1</title>
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
            <div class="col-3 text-center border" style="background-color:orange;">
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
        <div class="container m-1 mb-5">
            <form name="questionary" action="/questionary/store" method="post">
                {{ csrf_field() }}
                <h5 class='m-3 text-center'>事前アンケートです。あまり考えず直感的に選んでください</h5>
                <div class="row mx-auto">
                    <div class="mx-auto col-sm-11 col-md-8 p-1 m-1">
                        <div class="card">
                            <div class="card-header row m-0">
                                <h5 class="col-10 p-0 m-0">性別を教えてください</h5>
                                <h5 class="text-left col-2 p-0 m-0">1/23</h5>
                            </div>
                            <div class="card-body">
                                <div class="radio">
                                    <label><input type="radio" name="gender" id="radio1" value="1" checked> 男性</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="gender" id="radio2" value="2"> 女性</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mx-auto">
                    <div class="mx-auto col-sm-11 col-md-8 p-1 m-1">
                        <div class="card">
                            <div class="card-header row m-0">
                                <h5 class="col-10 p-0 m-0">年齢を教えてください</h5>
                                <h5 class="text-left col-2 p-0 m-0">2/23</h5>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <select name="age" id="age" class="form-control">
                                    @for ($i = 17; $i < 101; $i++)
                                        <option value="{{ $i }}">{{ $i }}歳</option>
                                    @endfor
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mx-auto">
                    <div class="mx-auto col-sm-11 col-md-8 p-1 m-1">
                        <div class="card">
                            <div class="card-header row m-0">
                                <h5 class="col-10 p-0 m-0">現在、一緒に住んでいる人の人数を教えてください</h5>
                                <h5 class="text-left col-2 p-0 m-0">3/23</h5>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <select name="family" id="family" class="form-control">
                                    @for ($i = 1; $i < 11; $i++)
                                        <option value="{{ $i }}">{{ $i }}人</option>
                                    @endfor
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mx-auto">
                    <div class="mx-auto col-sm-11 col-md-8 p-1 m-1">
                        <div class="card">
                            <div class="card-header row m-0">
                                <h5 class="col-10 p-0 m-0">普段インターネットショッピングはどれくらいしますか</h5>
                                <h5 class="text-left col-2 p-0 m-0">4/23</h5>
                            </div>
                            <div class="card-body">
                                <div class="radio">
                                    <label><input type="radio" name="ec_frequency" id="radio1" value="1" checked> ほぼ毎日</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="ec_frequency" id="radio2" value="2"> 週に3回以上</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="ec_frequency" id="radio3" value="3"> 週に1回くらい</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="ec_frequency" id="radio4" value="4"> 月に数回</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="ec_frequency" id="radio5" value="5"> 年に数回</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="ec_frequency" id="radio6" value="6"> ほとんどしない</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mx-auto">
                    <div class="mx-auto col-sm-11 col-md-8 p-1 m-1">
                        <div class="card">
                            <div class="card-header row m-0">
                                <h5 class="col-10 p-0 m-0">普段どれくらいお菓子を食べますか</h5>
                                <h5 class="text-left col-2 p-0 m-0">5/23</h5>
                            </div>
                            <h5 class="card-header"></h5>
                            <div class="card-body">
                                <div class="radio">
                                    <label><input type="radio" name="eat_frequency" id="radio1" value="1" checked> ほぼ毎日</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="eat_frequency" id="radio2" value="2"> 週に3回以上</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="eat_frequency" id="radio3" value="3"> 週に1回くらい</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="eat_frequency" id="radio4" value="4"> 月に数回</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="eat_frequency" id="radio5" value="5"> 年に数回</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="eat_frequency" id="radio6" value="6"> ほとんど食べない</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mx-auto">
                    <div class="mx-auto col-sm-11 col-md-8 p-1 m-1">
                        <div class="card">
                            <div class="card-header row m-0">
                                <h5 class="col-10 p-0 m-0">普段何時頃にお菓子を食べることが多いですか</h5>
                                <h5 class="text-left col-2 p-0 m-0">6/23</h5>
                            </div>
                            <div class="card-body">
                                <div class="radio">
                                    <label><input type="radio" name="sweets_time" id="radio1" value="1" checked> 8:00~12:00</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="sweets_time" id="radio2" value="2"> 12:00~16:00</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="sweets_time" id="radio3" value="3"> 16:00~20:00</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="sweets_time" id="radio4" value="4"> 20:00~24:00</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="sweets_time" id="radio5" value="5"> 24:00以降</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="sweets_time" id="radio6" value="6"> 特に決まっていない</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mx-auto">
                    <div class="mx-auto col-sm-11 col-md-8 p-1 m-1">
                        <div class="card">
                            <div class="card-header row m-0">
                                <h5 class="col-10 p-0 m-0">経済的な余裕がある方だ</h5>
                                <h5 class="text-left col-2 p-0 m-0">7/23</h5>
                            </div>
                            <div class="card-body">
                                <div class="radio">
                                    <label><input type="radio" name="money" id="radio1" value="1" checked> 良く当てはまる</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="money" id="radio2" value="2"> 少し当てはまる</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="money" id="radio3" value="3"> どちらかというと当てはまる</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="money" id="radio4" value="4"> どちらかというと当てはまらない</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="money" id="radio5" value="5"> あまり当てはまらない</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="money" id="radio6" value="6"> 全く当てはまらない</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mx-auto">
                    <div class="mx-auto col-sm-11 col-md-8 p-1 m-1">
                        <div class="card">
                            <div class="card-header row m-0">
                                <h5 class="col-10 p-0 m-0">時間的なゆとりがある方だ</h5>
                                <h5 class="text-left col-2 p-0 m-0">8/23</h5>
                            </div>
                            <div class="card-body">
                                <div class="radio">
                                    <label><input type="radio" name="margin" id="radio1" value="1" checked> 良く当てはまる</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="margin" id="radio2" value="2"> 少し当てはまる</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="margin" id="radio3" value="3"> どちらかというと当てはまる</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="margin" id="radio4" value="4"> どちらかというと当てはまらない</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="margin" id="radio5" value="5"> あまり当てはまらない</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="margin" id="radio6" value="6"> 全く当てはまらない</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mx-auto">
                    <div class="mx-auto col-sm-11 col-md-8 p-1 m-1">
                        <div class="card">
                            <div class="card-header row m-0">
                                <h5 class="col-10 p-0 m-0">インターネットやパソコンなどに詳しい方だ</h5>
                                <h5 class="text-left col-2 p-0 m-0">9/23</h5>
                            </div>
                            <div class="card-body">
                                <div class="radio">
                                    <label><input type="radio" name="it" id="radio1" value="1" checked> 良く当てはまる</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="it" id="radio2" value="2"> 少し当てはまる</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="it" id="radio3" value="3"> どちらかというと当てはまる</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="it" id="radio4" value="4"> どちらかというと当てはまらない</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="it" id="radio5" value="5"> あまり当てはまらない</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="it" id="radio6" value="6"> 全く当てはまらない</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mx-auto">
                    <div class="mx-auto col-sm-11 col-md-8 p-1 m-1">
                        <div class="card">
                            <div class="card-header row m-0">
                                <h5 class="col-10 p-0 m-0">買い物に行くときは先に買うものが決まっている</h5>
                                <h5 class="text-left col-2 p-0 m-0">10/23</h5>
                            </div>
                            <div class="card-body">
                                <div class="radio">
                                    <label><input type="radio" name="plan" id="radio1" value="1" checked> 良く当てはまる</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="plan" id="radio2" value="2"> 少し当てはまる</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="plan" id="radio3" value="3"> どちらかというと当てはまる</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="plan" id="radio4" value="4"> どちらかというと当てはまらない</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="plan" id="radio5" value="5"> あまり当てはまらない</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="plan" id="radio6" value="6"> 全く当てはまらない</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mx-auto">
                    <div class="mx-auto col-sm-11 col-md-8 p-1 m-1">
                        <div class="card">
                            <div class="card-header row m-0">
                                <h5 class="col-10 p-0 m-0">よく衝動買いをしてしまう</h5>
                                <h5 class="text-left col-2 p-0 m-0">11/23</h5>
                            </div>
                            <h5 class="card-header"></h5>
                            <div class="card-body">
                                <div class="radio">
                                    <label><input type="radio" name="impulse" id="radio1" value="1" checked> 良く当てはまる</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="impulse" id="radio2" value="2"> 少し当てはまる</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="impulse" id="radio3" value="3"> どちらかというと当てはまる</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="impulse" id="radio4" value="4"> どちらかというと当てはまらない</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="impulse" id="radio5" value="5"> あまり当てはまらない</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="impulse" id="radio6" value="6"> 全く当てはまらない</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mx-auto">
                    <div class="mx-auto col-sm-11 col-md-8 p-1 m-1">
                        <div class="card">
                            <div class="card-header row m-0">
                                <h5 class="col-10 p-0 m-0">時間をかけて安いものを選ぶようにしている</h5>
                                <h5 class="text-left col-2 p-0 m-0">12/23</h5>
                            </div>
                            <div class="card-body">
                                <div class="radio">
                                    <label><input type="radio" name="cheap" id="radio1" value="1" checked> 良く当てはまる</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="cheap" id="radio2" value="2"> 少し当てはまる</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="cheap" id="radio3" value="3"> どちらかというと当てはまる</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="cheap" id="radio4" value="4"> どちらかというと当てはまらない</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="cheap" id="radio5" value="5"> あまり当てはまらない</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="cheap" id="radio6" value="6"> 全く当てはまらない</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mx-auto">
                    <div class="mx-auto col-sm-11 col-md-8 p-1 m-1">
                        <div class="card">
                            <div class="card-header row m-0">
                                <h5 class="col-10 p-0 m-0">よく同じお菓子を買う</h5>
                                <h5 class="text-left col-2 p-0 m-0">13/23</h5>
                            </div>
                            <div class="card-body">
                                <div class="radio">
                                    <label><input type="radio" name="repeat" id="radio1" value="1" checked> 良く当てはまる</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="repeat" id="radio2" value="2"> 少し当てはまる</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="repeat" id="radio3" value="3"> どちらかというと当てはまる</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="repeat" id="radio4" value="4"> どちらかというと当てはまらない</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="repeat" id="radio5" value="5"> あまり当てはまらない</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="repeat" id="radio6" value="6"> 全く当てはまらない</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mx-auto">
                    <div class="mx-auto col-sm-11 col-md-8 p-1 m-1">
                        <div class="card">
                            <div class="card-header row m-0">
                                <h5 class="col-10 p-0 m-0">セールやクーポンを意識して買い物をする</h5>
                                <h5 class="text-left col-2 p-0 m-0">14/23</h5>
                            </div>
                            <div class="card-body">
                                <div class="radio">
                                    <label><input type="radio" name="sale" id="radio1" value="1" checked> 良く当てはまる</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="sale" id="radio2" value="2"> 少し当てはまる</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="sale" id="radio3" value="3"> どちらかというと当てはまる</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="sale" id="radio4" value="4"> どちらかというと当てはまらない</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="sale" id="radio5" value="5"> あまり当てはまらない</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="sale" id="radio6" value="6"> 全く当てはまらない</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mx-auto">
                    <div class="mx-auto col-sm-11 col-md-8 p-1 m-1">
                        <div class="card">
                            <div class="card-header row m-0">
                                <h5 class="col-10 p-0 m-0">甘いものが好きである</h5>
                                <h5 class="text-left col-2 p-0 m-0">15/23</h5>
                            </div>
                            <div class="card-body">
                                <div class="radio">
                                    <label><input type="radio" name="sweet" id="radio1" value="1" checked> 良く当てはまる</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="sweet" id="radio2" value="2"> 少し当てはまる</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="sweet" id="radio3" value="3"> どちらかというと当てはまる</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="sweet" id="radio4" value="4"> どちらかというと当てはまらない</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="sweet" id="radio5" value="5"> あまり当てはまらない</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="sweet" id="radio6" value="6"> 全く当てはまらない</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mx-auto">
                    <div class="mx-auto col-sm-11 col-md-8 p-1 m-1">
                        <div class="card">
                            <div class="card-header row m-0">
                                <h5 class="col-10 p-0 m-0">辛いものが好きである</h5>
                                <h5 class="text-left col-2 p-0 m-0">16/23</h5>
                            </div>
                            <div class="card-body">
                                <div class="radio">
                                    <label><input type="radio" name="spicy" id="radio1" value="1" checked> 良く当てはまる</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="spicy" id="radio2" value="2"> 少し当てはまる</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="spicy" id="radio3" value="3"> どちらかというと当てはまる</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="spicy" id="radio4" value="4"> どちらかというと当てはまらない</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="spicy" id="radio5" value="5"> あまり当てはまらない</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="spicy" id="radio6" value="6"> 全く当てはまらない</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mx-auto">
                    <div class="mx-auto col-sm-11 col-md-8 p-1 m-1">
                        <div class="card">
                            <div class="card-header row m-0">
                                <h5 class="col-10 p-0 m-0">すっぱいものが好きである</h5>
                                <h5 class="text-left col-2 p-0 m-0">17/23</h5>
                            </div>
                            <div class="card-body">
                                <div class="radio">
                                    <label><input type="radio" name="sour" id="radio1" value="1" checked> 良く当てはまる</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="sour" id="radio2" value="2"> 少し当てはまる</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="sour" id="radio3" value="3"> どちらかというと当てはまる</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="sour" id="radio4" value="4"> どちらかというと当てはまらない</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="sour" id="radio5" value="5"> あまり当てはまらない</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="sour" id="radio6" value="6"> 全く当てはまらない</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mx-auto">
                    <div class="mx-auto col-sm-11 col-md-8 p-1 m-1">
                        <div class="card">
                            <div class="card-header row m-0">
                                <h5 class="col-10 p-0 m-0">しょっぱいものが好きである</h5>
                                <h5 class="text-left col-2 p-0 m-0">18/23</h5>
                            </div>
                            <div class="card-body">
                                <div class="radio">
                                    <label><input type="radio" name="salty" id="radio1" value="1" checked> 良く当てはまる</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="salty" id="radio2" value="2"> 少し当てはまる</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="salty" id="radio3" value="3"> どちらかというと当てはまる</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="salty" id="radio4" value="4"> どちらかというと当てはまらない</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="salty" id="radio5" value="5"> あまり当てはまらない</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="salty" id="radio6" value="6"> 全く当てはまらない</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mx-auto">
                    <div class="mx-auto col-sm-11 col-md-8 p-1 m-1">
                        <div class="card">
                            <div class="card-header row m-0">
                                <h5 class="col-10 p-0 m-0">ストレス解消のためにお菓子を食べることがある</h5>
                                <h5 class="text-left col-2 p-0 m-0">19/23</h5>
                            </div>
                            <div class="card-body">
                                <div class="radio">
                                    <label><input type="radio" name="stress" id="radio1" value="1" checked> 良く当てはまる</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="stress" id="radio2" value="2"> 少し当てはまる</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="stress" id="radio3" value="3"> どちらかというと当てはまる</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="stress" id="radio4" value="4"> どちらかというと当てはまらない</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="stress" id="radio5" value="5"> あまり当てはまらない</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="stress" id="radio6" value="6"> 全く当てはまらない</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mx-auto">
                    <div class="mx-auto col-sm-11 col-md-8 p-1 m-1">
                        <div class="card">
                            <div class="card-header row m-0">
                                <h5 class="col-10 p-0 m-0">お酒のつまみでお菓子を食べることがある</h5>
                                <h5 class="text-left col-2 p-0 m-0">20/23</h5>
                            </div>
                            <div class="card-body">
                                <div class="radio">
                                    <label><input type="radio" name="sake" id="radio1" value="1" checked> 良く当てはまる</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="sake" id="radio2" value="2"> 少し当てはまる</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="sake" id="radio3" value="3"> どちらかというと当てはまる</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="sake" id="radio4" value="4"> どちらかというと当てはまらない</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="sake" id="radio5" value="5"> あまり当てはまらない</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="sake" id="radio6" value="6"> 全く当てはまらない</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mx-auto">
                    <div class="mx-auto col-sm-11 col-md-8 p-1 m-1">
                        <div class="card">
                            <div class="card-header row m-0">
                                <h5 class="col-10 p-0 m-0">仕事や勉強をしながらお菓子を食べることがある</h5>
                                <h5 class="text-left col-2 p-0 m-0">21/23</h5>
                            </div>
                            <div class="card-body">
                                <div class="radio">
                                    <label><input type="radio" name="work" id="radio1" value="1" checked> 良く当てはまる</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="work" id="radio2" value="2"> 少し当てはまる</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="work" id="radio3" value="3"> どちらかというと当てはまる</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="work" id="radio4" value="4"> どちらかというと当てはまらない</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="work" id="radio5" value="5"> あまり当てはまらない</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="work" id="radio6" value="6"> 全く当てはまらない</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mx-auto">
                    <div class="mx-auto col-sm-11 col-md-8 p-1 m-1">
                        <div class="card">
                            <div class="card-header row m-0">
                                <h5 class="col-10 p-0 m-0">お菓子を食べるときに罪悪感を感じる</h5>
                                <h5 class="text-left col-2 p-0 m-0">22/23</h5>
                            </div>
                            <div class="card-body">
                                <div class="radio">
                                    <label><input type="radio" name="guilty" id="radio1" value="1" checked> 良く当てはまる</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="guilty" id="radio2" value="2"> 少し当てはまる</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="guilty" id="radio3" value="3"> どちらかというと当てはまる</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="guilty" id="radio4" value="4"> どちらかというと当てはまらない</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="guilty" id="radio5" value="5"> あまり当てはまらない</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="guilty" id="radio6" value="6"> 全く当てはまらない</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mx-auto mb-3">
                    <div class="mx-auto col-sm-11 col-md-8 p-1 m-1">
                        <div class="card">
                            <div class="card-header row m-0">
                                <h5 class="col-10 p-0 m-0">新商品を見るとつい買ってしまう</h5>
                                <h5 class="text-left col-2 p-0 m-0">23/23</h5>
                            </div>
                            <div class="card-body">
                                <div class="radio">
                                    <label><input type="radio" name="new_item" id="radio1" value="1" checked> 良く当てはまる</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="new_item" id="radio2" value="2"> 少し当てはまる</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="new_item" id="radio3" value="3"> どちらかというと当てはまる</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="new_item" id="radio4" value="4"> どちらかというと当てはまらない</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="new_item" id="radio5" value="5"> あまり当てはまらない</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="new_item" id="radio6" value="6"> 全く当てはまらない</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="menu-submit">
                    <button type="submit" class="btn btn-primary btn-block">Part2へ進む</button>
                </div>
            </form>
        </div>
    </body>
</html>
