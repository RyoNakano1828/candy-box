<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/css/app.css">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <title>QuestionaryToppage</title>
    </head>
    <body>
        <h1>Part2</h1>
        <!-- 切り替えボタンの設定 -->
        
        @if (Session::has('message'))
            <p class="flash_message">{{ session('message') }}</p>
        @endif
        <div class='container'>
            <div class="card">
                <div class="card-header sticky-top bg-secondary row">
                    <div class="dropdown col4 m-1 w-25">
                        <button type="button" id="dropdown1"
                            class="btn btn-secondary dropdown-toggle border w-100"
                            data-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false">
                            カテゴリ選択
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdown1">
                            <a class="dropdown-item" href="#">Menu #1</a>
                            <a class="dropdown-item" href="#">Menu #2</a>
                            <a class="dropdown-item" href="#">Menu #3</a>
                        </div>
                    </div>
                    <div class="dropdown col4 m-1 w-25">
                        <button type="button" id="dropdown1"
                            class="btn btn-secondary dropdown-toggle border w-100"
                            data-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false">
                            並び替え
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdown1">
                            <a class="dropdown-item" href="#">値段が安い順</a>
                            <a class="dropdown-item" href="#">値段が高い順</a>
                            <a class="dropdown-item" href="#">評価が低い順</a>
                            <a class="dropdown-item" href="#">評価が高い順</a>
                        </div>
                    </div>
                    <div class="col6 m-1 w-25">
                        <input type="text" class="form-control" placeholder="自由検索">
                    </div>
                </div>
                <div class="card-body">
                    <div class='row'>
                        @foreach ($candies as $candy)
                            <div class='col-sm-2 col-6 mx-auto p-1 my-1 border'>
                                <div class="w-100"><img class="w-100" src="images/{{$candy->id}}.png" alt="{{ $candy->name }}"></div>
                                <div class="w-100">
                                    <p style="height:60px">{{$candy->name}}</p>
                                    <p>価格：<strong>{{$candy->price}}</strong> 円</p>
                                    <p style="height:40px">容量：{{$candy->weight}}</p>
                                    <p>評価：{{$candy->score}}</p>
                                </div>
                                <div class='row p-0 m-1'>
                                    <form class='col p-0'method="POST" action="candybox" name="candybox">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="candy_id" value="{{ $candy->id }}">
                                        <button type="submit" class="w-100">追加 <i class="fas fa-cart-arrow-down"></i></button>
                                    </form>
                                    <button type="button" class="col p-0 btn btn-primary" data-toggle="modal" data-target="#modal1">
                                        口コミ <i class="far fa-thumbs-up"></i>
                                    </button>
                                </div>
                                <!-- <button type="button" class="add_candy" onclick='add_candy'>カートに入れる</button> -->
                            </div> 
                        @endforeach
                    </div>
                </div>
                <footer class="footer fixed-bottom bg-info p-1">
                    <button type="button" class="btn btn-primary m-1" data-toggle="modal" data-target="#Modal">
                        カートを見る
                    </button>
                </footer>
            </div>
            
        </div>
       
        <!-- 口コミモーダル -->
        <div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="label1" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="label1">口コミ</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        口コミデータ取得
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">OK</button>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- カートモーダル -->
        <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="Modal" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="Modal">カート内アイテム</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @if ($carts)
                    @foreach ($candies as $candy)
                        @foreach ($carts as $cart)
                            @if ($candy->id == $cart)
                                <form method="POST" action="candybox/{{$candy->id}}/delete" name="candybox">
                                    {{ csrf_field() }}
                                    <div class='flex'>
                                        <div class="item-title">{{$candy->name}}</div>
                                        <div class='delete_button'>
                                            <input type="hidden" name="candy_id" value="{{ $candy->id }}">
                                            <button type="submit">削除する</button>
                                        </div>
                                    </div>
                                </form>
                            @endif
                        @endforeach
                    @endforeach
                @else
                    <p>カートにアイテムはありません</p>
                @endif
            </div>
            
            </div>
        </div>  
        </div>

        <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script> -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    </body>
</html>

<script type="text/javascript">
    //大域変数
    var cart_list = [];

    // フラッシュメッセージのfadeout
    $(function(){
        $('.flash_message').fadeOut(3000);
    });

</script>