<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/css/app.css">
        <title>QuestionaryPart1</title>

        
    </head>
    <body>
        <div class="container">
            <h1>Part1</h1>
            <form name="questionary" action="/questionary/store" method="post">
                {{ csrf_field() }}

                <div class="row mx-auto">
                    <div class="mx-auto col-sm-11 col-md-8 p-1 m-1">
                        <div class="card">
                            <h5 class="card-header">性別を教えてください</h5>
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
                            <h5 class="card-header">年齢を教えてください</h5>
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
                            <h5 class="card-header">現在、一緒に住んでいる人の人数を教えてください</h5>
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
                            <h5 class="card-header">普段インターネットショッピングはどれくらいしますか</h5>
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
                            <h5 class="card-header">普段どれくらいお菓子を食べますか</h5>
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
                            <h5 class="card-header">普段何時頃にお菓子を食べることが多いですか</h5>
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
                            <h5 class="card-header">経済的な余裕がある方だ</h5>
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
                            <h5 class="card-header">時間的なゆとりがある方だ</h5>
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
                            <h5 class="card-header">インターネットやパソコンなどに詳しい方だ</h5>
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
                            <h5 class="card-header">買い物に行くときは先に買うものが決まっている</h5>
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
                            <h5 class="card-header">よく衝動買いをしてしまう</h5>
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
                            <h5 class="card-header">時間をかけて安いものを選ぶようにしている</h5>
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
                            <h5 class="card-header">よく同じお菓子を買う</h5>
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
                            <h5 class="card-header">セールやクーポンを意識して買い物をする</h5>
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
                            <h5 class="card-header">甘いものが好きである</h5>
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
                            <h5 class="card-header">辛いものが好きである</h5>
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
                            <h5 class="card-header">すっぱいものが好きである</h5>
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
                            <h5 class="card-header">しょっぱいものが好きである</h5>
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
                            <h5 class="card-header">ストレス解消のためにお菓子を食べることがある</h5>
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
                            <h5 class="card-header">お酒のつまみでお菓子を食べることがある</h5>
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
                            <h5 class="card-header">仕事や勉強をしながらお菓子を食べることがある</h5>
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
                            <h5 class="card-header">お菓子を食べるときに罪悪感を感じる</h5>
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
                <div class="row mx-auto">
                    <div class="mx-auto col-sm-11 col-md-8 p-1 m-1">
                        <div class="card">
                            <h5 class="card-header">新商品を見るとつい買ってしまう</h5>
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
                    <button type="submit">次へ</button>
                </div>
            </form>
        </div>
    </body>
</html>
