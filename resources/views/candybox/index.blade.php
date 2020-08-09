<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/css/app.css">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <title>CandyBox</title>
    </head>
    <body>
        <h1>CandyBox</h1>
        
        @if (Session::has('message'))
            <p class="flash_message">{{ session('message') }}</p>
        @endif
        <div class='container'>
            <div class="card">
                <form id="submit_form" method='GET' action="/candybox/search" class="sticky-top">
                    <div class="card-header bg-secondary row">
                        <div class="dropdown col3 m-1 w-25">
                            <div class="form-group">
                                <select id="submit_category" name="category_id" class="form-control">
                                    <option disables value="">カテゴリ選択</option>
                                    <option value="">すべて</option>
                                        @foreach ($categories as $category)
                                            @isset($searchCategory)
                                                @if($searchCategory == $category->id)
                                                    <option selected value="{{$category->id}}">{{$category->name}}</option>
                                                @else
                                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                                @endif
                                            @else
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endisset
                                        @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="dropdown col3 m-1 w-25">
                            <div class="form-group">
                                <select id="submit_sort" name="sort" class="form-control">
                                    <option value="" disables>並び替え</option>
                                        @isset($searchSort)
                                            @if($searchSort == 1)
                                                <option selected value="1">値段が安い順</option>
                                                <option value="2">値段が高い順</option>
                                                <option value="3">評価が低い順</option>
                                                <option value="4">評価が高い順</option>
                                            @elseif($searchSort == 2)
                                                <option value="1">値段が安い順</option>
                                                <option selected value="2">値段が高い順</option>
                                                <option value="3">評価が低い順</option>
                                                <option value="4">評価が高い順</option>
                                            @elseif($searchSort == 3)
                                                <option value="1">値段が安い順</option>
                                                <option value="2">値段が高い順</option>
                                                <option selected value="3">評価が低い順</option>
                                                <option value="4">評価が高い順</option>
                                            @elseif($searchSort == 4)
                                                <option value="1">値段が安い順</option>
                                                <option value="2">値段が高い順</option>
                                                <option value="3">評価が低い順</option>
                                                <option selected value="4">評価が高い順</option>
                                            @endif
                                        @else
                                            <option value="1">値段が安い順</option>
                                            <option value="2">値段が高い順</option>
                                            <option value="3">評価が低い順</option>
                                            <option value="4">評価が高い順</option>
                                        @endisset
                                </select>
                            </div>
                        </div>
                        <div class="col3 m-1 w-25 form-group">
                            @isset($searchFreeword)
                                <input id="" type="text" class="form-control" name="freeword" placeholder="{{$searchFreeword}}" value="{{$searchFreeword}}">
                            @else
                                <input id="" type="text" class="form-control" name="freeword" placeholder="商品名フリーワード検索">
                            @endisset
                        </div>
                        <!-- <div class="col3 form-group m-1">
                            <div class="submit_freeword">
                                <button type="submit" class="btn btn-default border bg-primary">検索</button>
                            </div>
                        </div> -->
                    </div>
                </form>
                
                <div class="card-body mb-5">
                    <div class='row'>
                        @foreach ($candies as $candy)
                            <div class='col-sm-2 col-6 mx-auto p-1 my-1 border'>
                                @php
                                    $image_num = $candy->id - 1;
                                    $reviews = $candy->reviews;
                                @endphp
                                
                                <div class="w-100"><img class="w-100" src="{{ $url }}/{{ $image_num }}.png" alt="{{ $candy->name }}"></div>
                                <div class="w-100">
                                    <p style="height:60px">{{$candy->name}}</p>
                                    <p>価格：<strong>{{$candy->price}}</strong> 円</p>
                                    <p style="height:40px">容量：{{$candy->weight}}</p>
                                    <p>評価：{{$candy->score}}</p>
                                </div>
                                <div class='row p-0 m-1'>
                                    <!-- <form class='col p-0'method="POST" action="/candybox/add" name="candybox"> -->
                                        <!-- {{ csrf_field() }} -->
                                        <!-- <input type="hidden" name="candy_id" value="{{ $candy->id }}"> -->
                                        <button type="button" class="add_cart col p-0" data-item='{{$candy->name}}' data-id='{{$candy->id}}'>追加 <i class="fas fa-cart-arrow-down"></i></button>
                                    <!-- </form> -->
                                    <button type="button" class="col p-0 btn btn-primary" data-toggle="modal" data-target="#modal1" data-reviews='{{$reviews}}' data-candy='{{$candy}}'>
                                        口コミ <i class="far fa-thumbs-up"></i>
                                    </button>
                                </div>
                                <!-- <button type="button" class="add_candy" onclick='add_candy'>カートに入れる</button> -->
                            </div> 

                            <!-- 口コミモーダル -->
                            <div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="label1" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="label1"></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">OK</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- カートモーダル -->
                            <div class="modal fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="Modal" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="Modal">カート内アイテム</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="cart_items"></div>
                                    <div>
                                        <button class='btn btn-primary purchase' type="button">購入する</button>
                                    </div>
                                </div>
                                
                                </div>
                            </div>  
                            </div>

                        @endforeach
                    </div>
                </div>
                <footer class="footer fixed-bottom bg-info p-1">
                    <div class="cart_items">
                    </div>
                    <button type="button" class="btn btn-primary m-1" data-toggle="modal" data-target="#cartModal">
                        カートを見る
                    </button>
                </footer>
            </div>
        </div>

        <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script> -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    </body>
</html>

<script type="text/javascript">
    //カートの中身
    // var cart_list = [];
    //ページ遷移情報
    var page_list = [];


    // フラッシュメッセージのfadeout
    $(function(){
        $('.flash_message').fadeOut(3000);
    });

    //商品をカートに追加
    $(function(){
        $('.add_cart').on('click', function(e) {
            if(sessionStorage.getItem("cart_list")){
                var cart_list = JSON.parse(sessionStorage.getItem("cart_list"));
            }else{
                var cart_list = [];
            }
            var data = e.currentTarget.dataset['item'];
            var index = e.currentTarget.dataset['id'];
            cart_list.push({id:index, name:data})
            console.log(cart_list)
            sessionStorage.setItem("cart_list", JSON.stringify(cart_list));
            var cart = sessionStorage.getItem("cart_list");
            console.log("cart:"+cart)
        });
    });

    //カートモーダル
    $(function(){
        $("#cartModal").on('show.bs.modal',function(event){
            var cart_list = JSON.parse(sessionStorage.getItem("cart_list"));
            var modal = $(this)
            $(".modal-body > .cart_items").empty();
            modal.find('.modal-title').text('カート内アイテム')
            if(cart_list){
                for(var i=0; i<cart_list.length; i++){
                    modal.find('.modal-body > .cart_items').append('<p>'+cart_list[i].name+'</p>')
                }
            }else{
                modal.find('.modal-body > .cart_items').append('<p>カートにアイテムはありません</p>')
            }
        });
    });

    //口コミモーダル
    $(function(){
        $("#modal1").on('show.bs.modal',function(event){
            //口コミ情報取得
            var button = $(event.relatedTarget)
            var reviews = button.data('reviews')
            var candy = button.data('candy')
            console.log(reviews)

            //モーダル内に書き込み
            var modal = $(this)
            $(".modal-body").empty();
            modal.find('.modal-title').text(candy.name+'の口コミ')
            if(reviews.length != 0){
                for(i=0; i<reviews.length; i++){
                    modal.find('.modal-body').append('<p class="text-info">'+reviews[i].review+'</p>')
                }
            }else{
                modal.find('.modal-body').append('<p>この商品に口コミはありません</p>')
            }
        });
    });

    //自動検索
    $(function(){
        $("#submit_category").change(function(){
            $("#submit_form").submit();
        });
        $("#submit_sort").change(function(){
            $("#submit_form").submit();
        });
        $("#submit_freeword").change(function(){
            $("#submit_form").submit();
        });
    });

    //購入情報送信Ajax
    $(function() {
        $('.purchase').on('click', function() {
            var item = JSON.parse(sessionStorage.getItem("cart_list"));
            var move = JSON.parse(sessionStorage.getItem("move_list"));
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/candybox/store',
                type: 'POST',
                dataType: 'json',
                data: {purcahse:item,movement:move},
            })
            // Ajaxリクエスト成功時の処理
            .done(function(res) {
                sessionStorage.clear()
                window.location=res.url;
                console.log("success!")
            })
            // Ajaxリクエスト失敗時の処理
            .fail(function(data) {
                alert('Ajaxリクエスト失敗したため購入できません');
            });
        });
    });

</script>