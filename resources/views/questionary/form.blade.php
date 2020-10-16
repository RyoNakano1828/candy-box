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
        <div class="container mb-5">
            <form name="questionary" action="/questionary/store" method="post">
                {{ csrf_field() }}
                <h5 class='m-3 text-center'>事前アンケートです。普段の消費行動について教えてください。</h5>
                <div class="row mx-auto">
                    <div class="mx-auto col-sm-11 col-md-8 p-1 m-1">
                        <div class="card">
                            <div class="card-header row m-0">
                                <h5 class="col-10 p-0 m-0">性別</h5>
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
                                <h5 class="col-10 p-0 m-0">年齢</h5>
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
                                <h5 class="col-10 p-0 m-0">どの商品/どのブランドを選択するか店頭でよく迷う</h5>
                                <h5 class="text-left col-2 p-0 m-0">3/23</h5>
                            </div>
                            <div class="card-body">
                                <div class="radio">
                                    <label><input type="radio" name="Q1" id="radio1" value="1" checked> 非常に当てはまる</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="Q1" id="radio2" value="2"> やや当てはまる</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="Q1" id="radio3" value="3"> あまり当てはまらない</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="Q1" id="radio4" value="4"> 全く当てはまらない</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mx-auto">
                    <div class="mx-auto col-sm-11 col-md-8 p-1 m-1">
                        <div class="card">
                            <div class="card-header row m-0">
                                <h5 class="col-10 p-0 m-0">お店でどの商品を買うか考えているときが楽しい</h5>
                                <h5 class="text-left col-2 p-0 m-0">4/23</h5>
                            </div>
                            <div class="card-body">
                                <div class="radio">
                                    <label><input type="radio" name="Q2" id="radio1" value="1" checked> 非常に当てはまる</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="Q2" id="radio2" value="2"> やや当てはまる</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="Q2" id="radio3" value="3"> あまり当てはまらない</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="Q2" id="radio4" value="4"> 全く当てはまらない</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mx-auto">
                    <div class="mx-auto col-sm-11 col-md-8 p-1 m-1">
                        <div class="card">
                            <div class="card-header row m-0">
                                <h5 class="col-10 p-0 m-0">商品ごとに買い物をするお店が決まっている</h5>
                                <h5 class="text-left col-2 p-0 m-0">5/23</h5>
                            </div>
                            <h5 class="card-header"></h5>
                            <div class="card-body">
                                <div class="radio">
                                    <label><input type="radio" name="Q3" id="radio1" value="1" checked> 非常に当てはまる</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="Q3" id="radio2" value="2"> やや当てはまる</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="Q3" id="radio3" value="3"> あまり当てはまらない</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="Q3" id="radio4" value="4"> 全く当てはまらない</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mx-auto">
                    <div class="mx-auto col-sm-11 col-md-8 p-1 m-1">
                        <div class="card">
                            <div class="card-header row m-0">
                                <h5 class="col-10 p-0 m-0">よく衝動買いをする</h5>
                                <h5 class="text-left col-2 p-0 m-0">6/23</h5>
                            </div>
                            <div class="card-body">
                                <div class="radio">
                                    <label><input type="radio" name="Q4" id="radio1" value="1" checked> 非常に当てはまる</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="Q4" id="radio2" value="2"> やや当てはまる</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="Q4" id="radio3" value="3"> あまり当てはまらない</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="Q4" id="radio4" value="4"> 全く当てはまらない</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mx-auto">
                    <div class="mx-auto col-sm-11 col-md-8 p-1 m-1">
                        <div class="card">
                            <div class="card-header row m-0">
                                <h5 class="col-10 p-0 m-0">高かったり手間がかかっても、環境によいものを買う</h5>
                                <h5 class="text-left col-2 p-0 m-0">7/23</h5>
                            </div>
                            <div class="card-body">
                                <div class="radio">
                                    <label><input type="radio" name="Q5" id="radio1" value="1" checked> 非常に当てはまる</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="Q5" id="radio2" value="2"> やや当てはまる</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="Q5" id="radio3" value="3"> あまり当てはまらない</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="Q5" id="radio4" value="4"> 全く当てはまらない</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mx-auto">
                    <div class="mx-auto col-sm-11 col-md-8 p-1 m-1">
                        <div class="card">
                            <div class="card-header row m-0">
                                <h5 class="col-10 p-0 m-0">自分のセンスや直感で、商品、ブランドを選択・購入する</h5>
                                <h5 class="text-left col-2 p-0 m-0">8/23</h5>
                            </div>
                            <div class="card-body">
                                <div class="radio">
                                    <label><input type="radio" name="Q6" id="radio1" value="1" checked> 非常に当てはまる</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="Q6" id="radio2" value="2"> やや当てはまる</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="Q6" id="radio3" value="3"> あまり当てはまらない</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="Q6" id="radio4" value="4"> 全く当てはまらない</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mx-auto">
                    <div class="mx-auto col-sm-11 col-md-8 p-1 m-1">
                        <div class="card">
                            <div class="card-header row m-0">
                                <h5 class="col-10 p-0 m-0">商品・サービスは自分の好みに合わせて、できるだけこだわって買う</h5>
                                <h5 class="text-left col-2 p-0 m-0">9/23</h5>
                            </div>
                            <div class="card-body">
                                <div class="radio">
                                    <label><input type="radio" name="Q7" id="radio1" value="1" checked> 非常に当てはまる</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="Q7" id="radio2" value="2"> やや当てはまる</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="Q7" id="radio3" value="3"> あまり当てはまらない</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="Q7" id="radio4" value="4"> 全く当てはまらない</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mx-auto">
                    <div class="mx-auto col-sm-11 col-md-8 p-1 m-1">
                        <div class="card">
                            <div class="card-header row m-0">
                                <h5 class="col-10 p-0 m-0">商品やサービスは、価格が高くても品質の良いものを選ぶ</h5>
                                <h5 class="text-left col-2 p-0 m-0">10/23</h5>
                            </div>
                            <div class="card-body">
                                <div class="radio">
                                    <label><input type="radio" name="Q8" id="radio1" value="1" checked> 非常に当てはまる</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="Q8" id="radio2" value="2"> やや当てはまる</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="Q8" id="radio3" value="3"> あまり当てはまらない</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="Q8" id="radio4" value="4"> 全く当てはまらない</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mx-auto">
                    <div class="mx-auto col-sm-11 col-md-8 p-1 m-1">
                        <div class="card">
                            <div class="card-header row m-0">
                                <h5 class="col-10 p-0 m-0">商品・サービスは、一通り安心できれば、あまりこだわらずに購入する</h5>
                                <h5 class="text-left col-2 p-0 m-0">11/23</h5>
                            </div>
                            <h5 class="card-header"></h5>
                            <div class="card-body">
                                <div class="radio">
                                    <label><input type="radio" name="Q9" id="radio1" value="1" checked> 非常に当てはまる</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="Q9" id="radio2" value="2"> やや当てはまる</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="Q9" id="radio3" value="3"> あまり当てはまらない</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="Q9" id="radio4" value="4"> 全く当てはまらない</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mx-auto">
                    <div class="mx-auto col-sm-11 col-md-8 p-1 m-1">
                        <div class="card">
                            <div class="card-header row m-0">
                                <h5 class="col-10 p-0 m-0">店頭のポスター・ステッカー・説明書などを参考にして選択・購入する</h5>
                                <h5 class="text-left col-2 p-0 m-0">12/23</h5>
                            </div>
                            <div class="card-body">
                                <div class="radio">
                                    <label><input type="radio" name="Q10" id="radio1" value="1" checked> 非常に当てはまる</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="Q10" id="radio2" value="2"> やや当てはまる</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="Q10" id="radio3" value="3"> あまり当てはまらない</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="Q10" id="radio4" value="4"> 全く当てはまらない</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mx-auto">
                    <div class="mx-auto col-sm-11 col-md-8 p-1 m-1">
                        <div class="card">
                            <div class="card-header row m-0">
                                <h5 class="col-10 p-0 m-0">SNSやブログ、サイトなどで推奨されているものを購入することが多い</h5>
                                <h5 class="text-left col-2 p-0 m-0">13/23</h5>
                            </div>
                            <div class="card-body">
                                <div class="radio">
                                    <label><input type="radio" name="Q11" id="radio1" value="1" checked> 非常に当てはまる</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="Q11" id="radio2" value="2"> やや当てはまる</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="Q11" id="radio3" value="3"> あまり当てはまらない</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="Q11" id="radio4" value="4"> 全く当てはまらない</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mx-auto">
                    <div class="mx-auto col-sm-11 col-md-8 p-1 m-1">
                        <div class="card">
                            <div class="card-header row m-0">
                                <h5 class="col-10 p-0 m-0">購入する商品の良し悪しは、自分で確認したい</h5>
                                <h5 class="text-left col-2 p-0 m-0">14/23</h5>
                            </div>
                            <div class="card-body">
                                <div class="radio">
                                    <label><input type="radio" name="Q12" id="radio1" value="1" checked> 非常に当てはまる</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="Q12" id="radio2" value="2"> やや当てはまる</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="Q12" id="radio3" value="3"> あまり当てはまらない</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="Q12" id="radio4" value="4"> 全く当てはまらない</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mx-auto">
                    <div class="mx-auto col-sm-11 col-md-8 p-1 m-1">
                        <div class="card">
                            <div class="card-header row m-0">
                                <h5 class="col-10 p-0 m-0">商品を購入するときに役立つのはクチコミ情報だ</h5>
                                <h5 class="text-left col-2 p-0 m-0">15/23</h5>
                            </div>
                            <div class="card-body">
                                <div class="radio">
                                    <label><input type="radio" name="Q13" id="radio1" value="1" checked> 非常に当てはまる</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="Q13" id="radio2" value="2"> やや当てはまる</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="Q13" id="radio3" value="3"> あまり当てはまらない</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="Q13" id="radio4" value="4"> 全く当てはまらない</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mx-auto">
                    <div class="mx-auto col-sm-11 col-md-8 p-1 m-1">
                        <div class="card">
                            <div class="card-header row m-0">
                                <h5 class="col-10 p-0 m-0">季節限定や数量限定の食品が売られているとつい買ってしまう</h5>
                                <h5 class="text-left col-2 p-0 m-0">16/23</h5>
                            </div>
                            <div class="card-body">
                                <div class="radio">
                                    <label><input type="radio" name="Q14" id="radio1" value="1" checked> 非常に当てはまる</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="Q14" id="radio2" value="2"> やや当てはまる</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="Q14" id="radio3" value="3"> あまり当てはまらない</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="Q14" id="radio4" value="4"> 全く当てはまらない</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mx-auto">
                    <div class="mx-auto col-sm-11 col-md-8 p-1 m-1">
                        <div class="card">
                            <div class="card-header row m-0">
                                <h5 class="col-10 p-0 m-0">スマートフォンやタブレット端末からネットで注文する通信販売には抵抗がない</h5>
                                <h5 class="text-left col-2 p-0 m-0">17/23</h5>
                            </div>
                            <div class="card-body">
                                <div class="radio">
                                    <label><input type="radio" name="Q15" id="radio1" value="1" checked> 非常に当てはまる</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="Q15" id="radio2" value="2"> やや当てはまる</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="Q15" id="radio3" value="3"> あまり当てはまらない</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="Q15" id="radio4" value="4"> 全く当てはまらない</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mx-auto">
                    <div class="mx-auto col-sm-11 col-md-8 p-1 m-1">
                        <div class="card">
                            <div class="card-header row m-0">
                                <h5 class="col-10 p-0 m-0">店頭よりもネットで買い物することの方が多い</h5>
                                <h5 class="text-left col-2 p-0 m-0">18/23</h5>
                            </div>
                            <div class="card-body">
                                <div class="radio">
                                    <label><input type="radio" name="Q16" id="radio1" value="1" checked> 非常に当てはまる</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="Q16" id="radio2" value="2"> やや当てはまる</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="Q16" id="radio3" value="3"> あまり当てはまらない</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="Q16" id="radio4" value="4"> 全く当てはまらない</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mx-auto">
                    <div class="mx-auto col-sm-11 col-md-8 p-1 m-1">
                        <div class="card">
                            <div class="card-header row m-0">
                                <h5 class="col-10 p-0 m-0">味覚センスに自信がある</h5>
                                <h5 class="text-left col-2 p-0 m-0">19/23</h5>
                            </div>
                            <div class="card-body">
                                <div class="radio">
                                    <label><input type="radio" name="Q17" id="radio1" value="1" checked> 非常に当てはまる</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="Q17" id="radio2" value="2"> やや当てはまる</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="Q17" id="radio3" value="3"> あまり当てはまらない</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="Q17" id="radio4" value="4"> 全く当てはまらない</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mx-auto">
                    <div class="mx-auto col-sm-11 col-md-8 p-1 m-1">
                        <div class="card">
                            <div class="card-header row m-0">
                                <h5 class="col-10 p-0 m-0">おいしいものを食べたり、食生活を楽しむためにお金をかけたい</h5>
                                <h5 class="text-left col-2 p-0 m-0">20/23</h5>
                            </div>
                            <div class="card-body">
                                <div class="radio">
                                    <label><input type="radio" name="Q18" id="radio1" value="1" checked> 非常に当てはまる</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="Q18" id="radio2" value="2"> やや当てはまる</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="Q18" id="radio3" value="3"> あまり当てはまらない</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="Q18" id="radio4" value="4"> 全く当てはまらない</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mx-auto">
                    <div class="mx-auto col-sm-11 col-md-8 p-1 m-1">
                        <div class="card">
                            <div class="card-header row m-0">
                                <h5 class="col-10 p-0 m-0">食品を購入するときは、セールなど少しでも安い食品を優先して選ぶ</h5>
                                <h5 class="text-left col-2 p-0 m-0">21/23</h5>
                            </div>
                            <div class="card-body">
                                <div class="radio">
                                    <label><input type="radio" name="Q19" id="radio1" value="1" checked> 非常に当てはまる</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="Q19" id="radio2" value="2"> やや当てはまる</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="Q19" id="radio3" value="3"> あまり当てはまらない</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="Q19" id="radio4" value="4"> 全く当てはまらない</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mx-auto">
                    <div class="mx-auto col-sm-11 col-md-8 p-1 m-1">
                        <div class="card">
                            <div class="card-header row m-0">
                                <h5 class="col-10 p-0 m-0">食品を選ぶときにはカロリー表示を気にする</h5>
                                <h5 class="text-left col-2 p-0 m-0">22/23</h5>
                            </div>
                            <div class="card-body">
                                <div class="radio">
                                    <label><input type="radio" name="Q20" id="radio1" value="1" checked> 非常に当てはまる</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="Q20" id="radio2" value="2"> やや当てはまる</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="Q20" id="radio3" value="3"> あまり当てはまらない</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="Q20" id="radio4" value="4"> 全く当てはまらない</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mx-auto mb-3">
                    <div class="mx-auto col-sm-11 col-md-8 p-1 m-1">
                        <div class="card">
                            <div class="card-header row m-0">
                                <h5 class="col-10 p-0 m-0">食品を選ぶときは、賞味期限や鮮度をよく見て買う</h5>
                                <h5 class="text-left col-2 p-0 m-0">23/23</h5>
                            </div>
                            <div class="card-body">
                                <div class="radio">
                                    <label><input type="radio" name="Q21" id="radio1" value="1" checked> 非常に当てはまる</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="Q21" id="radio2" value="2"> やや当てはまる</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="Q21" id="radio3" value="3"> あまり当てはまらない</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="Q21" id="radio4" value="4"> 全く当てはまらない</label>
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
