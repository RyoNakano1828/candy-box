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
                {{-- エラーメッセージ --}}
                @if ($errors->any())
                    <div class="alert alert-danger m-2">
                        <h4>未回答項目があります</h4>
                    </div>
                @endif

                <div class="row mx-auto">
                    <div class="mx-auto col-sm-11 col-md-8 p-1 m-1">
                        <div class="card">
                            <h5 class="card-header">アンケートでのお菓子の販売サイトは使いやすかったですか？</h5>
                            <div class="card-body">
                                <div class="radio">
                                    <label><input type="radio" name="assessment" id="radio1" value="1" {{ old('assessment') == '1' ? 'checked' : '' }}> とても使いやすかった</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="assessment" id="radio2" value="2" {{ old('assessment') == '2' ? 'checked' : '' }}> どちらかというと使いやすかった</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="assessment" id="radio3" value="3" {{ old('assessment') == '3' ? 'checked' : '' }}> どちらかというと使いにくかった</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="assessment" id="radio4" value="4" {{ old('assessment') == '4' ? 'checked' : '' }}> とても使いにくかった</label>
                                </div>
                                @error('assessment')
                                    <div class="alert alert-danger m-0"><strong>選択してください</strong></div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mx-auto mb-3">
                    <div class="mx-auto col-sm-11 col-md-8 p-1 m-1">
                        <div class="card">
                            <h5 class="card-header">上の質問の選択肢を選んだ理由を教えてください</h5>
                            <div class="card-body">
                                <div class="form-group">
                                    <textarea id="textarea1" name='assessment_reason' class="form-control">{{ old('assessment_reason') }}</textarea>
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
                                    <label><input type="radio" name="indecisive" id="radio1" value="1" {{ old('indecisive') == '1' ? 'checked' : '' }}> とても迷った</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="indecisive" id="radio2" value="2" {{ old('indecisive') == '2' ? 'checked' : '' }}>少し迷った</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="indecisive" id="radio3" value="3" {{ old('indecisive') == '3' ? 'checked' : '' }}> あまり迷わなかった</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="indecisive" id="radio4" value="4" {{ old('indecisive') == '4' ? 'checked' : '' }}> 全く迷わなかった</label>
                                </div>
                                @error('indecisive')
                                    <div class="alert alert-danger m-0"><strong>選択してください</strong></div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mx-auto mb-3">
                    <div class="mx-auto col-sm-11 col-md-8 p-1 m-1">
                        <div class="card">
                            <h5 class="card-header">上の質問の選択肢を選んだ理由を教えてください</h5>
                            <div class="card-body">
                                <div class="form-group">
                                    <textarea id="textarea1" name='indecisive_reason' class="form-control">{{ old('indecisive_reason') }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mx-auto">
                    <div class="mx-auto col-sm-11 col-md-8 p-1 m-1">
                        <div class="card">
                            <h5 class="card-header">商品の選択に対する満足度を教えてください</h5>
                            <div class="card-body">
                                <div class="radio">
                                    <label><input type="radio" name="consent" id="radio1" value="1" {{ old('consent') == '1' ? 'checked' : '' }}> とても満足している</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="consent" id="radio2" value="2" {{ old('consent') == '2' ? 'checked' : '' }}> 少し満足している</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="consent" id="radio3" value="3" {{ old('consent') == '3' ? 'checked' : '' }}> あまり満足していない</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="consent" id="radio4" value="4" {{ old('consent') == '4' ? 'checked' : '' }}> 全く満足していない</label>
                                </div>
                                @error('consent')
                                    <div class="alert alert-danger m-0"><strong>選択してください</strong></div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mx-auto mb-3">
                    <div class="mx-auto col-sm-11 col-md-8 p-1 m-1">
                        <div class="card">
                            <h5 class="card-header">上の質問の選択肢を選んだ理由を教えてください</h5>
                            <div class="card-body">
                                <div class="form-group">
                                    <textarea id="textarea1" name='consent_reason' class="form-control">{{ old('consent_reason') }}</textarea>
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
