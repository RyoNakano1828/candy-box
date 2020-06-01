<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/css/app.css">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <title>QuestionaryToppage</title>

        
    </head>
    <body>
        <h1>Part2</h1>
        <!-- 切り替えボタンの設定 -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modal">
        カートを見る
        </button>
        @if (Session::has('message'))
            <p class="flash_message">{{ session('message') }}</p>
        @endif
        <div class='items'>
           @foreach ($candies as $candy)
                <div class='item'>
                    <div class="item-img"><img class="imageSize" src="images/test.jpg" alt="test"></div>
                    <div class="item-body">
                    <div class="item-title">{{$candy->name}}</div>
                    <p>価格：{{$candy->price}}円</p>
                    <p>容量：{{$candy->weight}}</p>
                    <p>評価：{{$candy->score}}</p>
                    </div>
                    <form method="POST" action="candybox" name="candybox">
                        {{ csrf_field() }}
                        <input type="hidden" name="candy_id" value="{{ $candy->id }}">
                        <button type="submit" class="">カートに入れる</button>
                    </form>
                    <!-- <button type="button" class="add_candy" onclick='add_candy'>カートに入れる</button> -->
                </div> 
            @endforeach
        </div>
        

        <!-- モーダルの設定 -->

        <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="Modal" aria-hidden="true">
        <!--以下modal-dialogのCSSの部分で modal-lgやmodal-smを追加するとモーダルのサイズを変更することができる-->
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
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
                <form method="POST" action="candybox/store" name="candybox">
                    {{ csrf_field() }}
                    <input type="hidden" name="candy_id" value="{{ $candy->id }}">
                    <button type="submit" class="btn btn-primary">購入</button>
                </form>
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