<!DOCTYPE html>
<html>
    <head>
        <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}">
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0">
        <!-- <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <!-- <script src="{{ mix('js/app.js') }}" defer></script> -->

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('custom/css/custom.css') }}" rel="stylesheet">

        
        <title>CandyBox</title>
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
            <div class="col-3 text-center border" style="background-color:orange;">
                <p>Part2</p>
                <p class="text-nowrap small" style="font-size:9px;">CandyBox</p>
            </div>
            <div class="col-3 text-center border" style="background-color:gray;">
                <p>Part3</p>
                <p class="text-nowrap small" style="font-size:9px;">事後アンケート</p>
            </div>
        </nav>
        <div class="container p-2 mb-2 my-2 border-success bg-warning">
            <h5 class="">あなたが今、家にあったらうれしいお菓子を <strong>合計金額1000円まで</strong> 選んでください</h5>
            <p class="m-0">※
                <button type="button" class="p-1 m-1">追加 <i class="fas fa-cart-arrow-down"></i></button>
                からお菓子をカートに追加して、
                <button type="button" class="btn btn-primary m-1 p-1">
                    カートを見る
                </button>
                ⇒
                <button type="button" class="btn btn-primary m-1 p-1">
                    購入する
                </button>
                を押してください
            </p>
            <p class="m-0">※同じお菓子を複数追加しても構いません</p>
            <p  class="m-0">※架空の販売サイトですので、実際に購入はされません</p>
        </div>
        <form id="to-category" method='GET' action="/candybox/category">
        
            <div class='container-fluid'>
                <div class="card">
                    <div class="card-header row p-0 pb-1 pt-1 sticky-top" style="background-color:#FFD033;">
                        <button type="submit" class="btn btn-primary btn-block p-2 ml-1 mr-1 back-to-the-category border-0" style="background-color:orange;">
                                カテゴリ選択画面へ
                        </button>
                    </div>
                    <div class="card-body mb-5 p-0">
                        <div id="app" class='row m-0'>
                            @foreach ($candies as $candy)
                                <div class='col-md-2 col-sm-3 col-4 float-left p-1 my-1 border'>
                                    @php
                                        $image_num = $candy->id - 1;
                                        $reviews = $candy->reviews;
                                        $review_count = 0
                                    @endphp
                                    
                                    <div class="w-100"><img class="w-100" src="{{ $url }}/{{ $image_num }}.png" alt="{{ $candy->name }}"></div>
                                    <div class="w-100 text-center">
                                        <p class="font-weight-bold overflow-auto mb-0" style="height:40px">{{$candy->name}}</p>
                                        <p class="marginLefttttt m-0">
                                            <star-rating
                                                :rating="{{$candy->score}}" 
                                                :read-only="true" 
                                                :increment="0.01"
                                                v-bind:star-size="15"
                                                v-bind:increment="0.1"
                                            ></star-rating>
                                        </p>
                                        <p class="text-danger font-weight-bold mb-0 text-center">価格：<strong>{{$candy->price}}</strong> 円</p>
                                        <p class="overflow-auto mb-0 text-center" style="height:30px">容量：{{$candy->weight}}</p>
                                        @foreach($reviews as $review)
                                            @if($review->candy_id == $candy->id)
                                                @php
                                                    $review_count += 1;
                                                @endphp
                                            @endif
                                        @endforeach
                                        <button type="button" class="btn btn-link p-0 m-0 text-center" data-toggle="modal" data-target="#modal1" data-reviews='{{$reviews}}' data-candy='{{$candy}}' data-id='{{$candy->id}}'>
                                            <p class="font-weight-bold p-0 mb-0 text-center">口コミ<i class="far fa-thumbs-up"></i>:{{$review_count}}件</p>
                                        </button>
                                        
                                    </div>
                                    <div class='row p-0 m-1'>
                                        <button type="button" class="add_cart col p-0 m-1" data-item='{{$candy->name}}' data-id='{{$candy->id}}' data-cost='{{$candy->price}}'>追加 <i class="fas fa-cart-arrow-down"></i></button>
                                    </div>
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
                                                <div class="reviews">
                                                    
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- カートモーダル -->
                                <div class="modal fade show" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="Modal" aria-hidden="true">
                                    <div class="modal-dialog modal-xl" role="document">
                                        <div class="modal-content w-100">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="Modal">あなたが今、家にあったらうれしいお菓子を<strong>合計1000円まで</strong>選んでください</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="sum-price">
                                                </div>
                                                <div class="cart_items row">
                                                    
                                                </div>
                                                <div>
                                                    <button class='btn btn-primary btn-block purchase' type="button">購入する</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>  
                                </div>
                            @endforeach
                            
                            <footer class="footer fixed-bottom bg-info pb-1 pt-1">
                                <div class="cart_items">
                                </div>
                                <button type="button" class="btn btn-primary btn-block ml-1 mr-1" data-toggle="modal" data-target="#cartModal">
                                    カートを見る
                                </button>
                            </footer>
                        </div>
                    </div>
                </div>
            </div>
        </form>
          
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    </body>
</html>

<script type="text/javascript">
        
    //ページ遷移情報＆＆遷移時間追加メソッド
    var add_page = function(page){
        if(sessionStorage.getItem("page_list")){
            var page_list = JSON.parse(sessionStorage.getItem("page_list"));
        }else{
            var page_list = [];
        }
        page_list.push({id:page})
        console.log(page_list)
        sessionStorage.setItem("page_list", JSON.stringify(page_list));

        if(sessionStorage.getItem("time_list")){
            var time_list = JSON.parse(sessionStorage.getItem("time_list"));
        }else{
            var time_list = [];
        }
        const date = new Date();
        // 2020/2/1 20:49:28
        time_list.push({time:date.toLocaleString()})
        console.log(time_list)
        sessionStorage.setItem("time_list", JSON.stringify(time_list));
    }

    //カテゴリ画面へ遷移
    $(function(){
        $('.back-to-the-category').on('click', function(e){
            var page = 'movecategory';
            add_page(page);
        })
    })
  
    //商品をカートに追加
    $(function(){
        $('.add_cart').on('click', function(e) {
            if(sessionStorage.getItem("cart_list")){
                var cart_list = JSON.parse(sessionStorage.getItem("cart_list"));
            }else{
                var cart_list = [];
            }
            //カート内合計金額計算
            var sum_price = 0;
            for(i=0; i<cart_list.length; i++){
                sum_price += parseInt(cart_list[i].cost,10);
            }
            console.log("sum:"+sum_price)
            if(sum_price+parseInt(e.currentTarget.dataset['cost'],10) > 1000){
                alert('1000円以上カートに入れることはできません。カートから商品を削除してください')
            }else{
                var data = e.currentTarget.dataset['item'];
                var index = e.currentTarget.dataset['id'];
                var cost = e.currentTarget.dataset['cost'];
                cart_list.push({id:index,   name:data, cost:cost})
                console.log(cart_list)
                sessionStorage.setItem("cart_list", JSON.stringify(cart_list));
                
                //ページ遷移情報追加
                var page = 'addcart'+index;
                add_page(page)

                //アラート表示
                alert('カートに追加しました');
            }
        });
    });

    //商品をカートから削除
    $(function(){
        $(document).on('click', '.remove_cart', function(e) {
            //カート情報と削除する商品IDを取得
            var cart_list = JSON.parse(sessionStorage.getItem("cart_list"));
            var index = e.currentTarget.dataset['id'];
            for(var i=0; i<cart_list.length; i++){
                if(cart_list[i].id == index){
                    cart_list.splice(i, 1);
                    break;
                }
            }
            console.log(cart_list)
            sessionStorage.setItem("cart_list", JSON.stringify(cart_list));
            //ページ遷移情報追加
            var page = 'removecart'+index;
            add_page(page)

            //アラート表示
            alert('カートから削除しました');
            $('#cartModal').modal('hide');
        });
    });
    
    //カートモーダル
    $(function(){
        $("#cartModal").on('show.bs.modal',function(event){
            var cart_list = JSON.parse(sessionStorage.getItem("cart_list"));
            var modal = $(this)
            //カート内合計金額計算
            var sum_price = 0;
            if(cart_list && cart_list.length != 0){
                for(i=0; i<cart_list.length; i++){
                    sum_price += parseInt(cart_list[i].cost,10);
                }
            }
            console.log("sum:"+sum_price)
            $(".modal-body > .cart_items").empty();
            $(".modal-body > .sum-price > h5").empty();
            if(cart_list && cart_list.length != 0){
                modal.find('.modal-body > .sum-price').append(`<h5 class="text-center m-2">合計金額：${sum_price}円（あと${1000-sum_price}円分選べます）</h5>`)
                for(var i=0; i<cart_list.length; i++){
                    const HTML = `
                        <div class="col-sm-3 col-4 p-1 my-1 border float-left cart_item">
                            <div class="w-100"><img class="w-100" src="{{$url}}/${cart_list[i].id-1}.png"></div>
                            <div class="w-100">
                                <p class="font-weight-bold overflow-auto mb-0 text-center" style="height:60px">${cart_list[i].name}</p>
                                <p class="text-danger mb-0 text-center">価格：<strong>${cart_list[i].cost}</strong> 円</p>
                            </div>
                            <div class="row p-0 m-1">
                                <button type="button" class="remove_cart p-1 w-100" data-id="${cart_list[i].id}">削除 <i class="fas fa-trash-alt"></i></button>
                            </div>
                        </div>
                    `
                    modal.find('.modal-body > .cart_items').append(HTML)
                }
                // for(var j=0; j<5-cart_list.length; j++){
                //     var x = cart_list.length+j
                //     modal.find('.modal-body > .cart_items > .cart_item'+x).append('<div class="w-100"><img class="w-100" src="{{$url}}/no-item.png"></div>')
                //     modal.find('.modal-body > .cart_items > .cart_item'+x).append('<div class="w-100">')
                //     modal.find('.modal-body > .cart_items > .cart_item'+x).append('<p style="height:60px">商品が選択されていません</p>')
                //     modal.find('.modal-body > .cart_items > .cart_item'+x).append('</div>')
                // }
            }else{
                modal.find('.modal-body > .sum-price').append(`<h5 class="text-center m-2">合計金額：${sum_price}円（あと${1000-sum_price}円分選べます）</h5></br><h5 class="text-center m-2 mb-4">カートにお菓子を追加してください。</h5>`)
                // for(var j=0; j<5; j++){
                //     modal.find('.modal-body > .cart_items > .cart_item'+j).append('<div class="w-100"><img class="w-100" src="{{$url}}/no-item.png"></div>')
                //     modal.find('.modal-body > .cart_items > .cart_item'+j).append('<div class="w-100">')
                //     modal.find('.modal-body > .cart_items > .cart_item'+j).append('<p style="height:60px">商品が選択されていません</p>')
                //     modal.find('.modal-body > .cart_items > .cart_item'+j).append('</div>')
                // }
            }

            //ページ遷移情報追加
            var page = 'checkcart';
            add_page(page)
        });
    });
    
    //口コミモーダル
    $(function(){
        $("#modal1").on('show.bs.modal',function(event){
            //口コミ情報取得
            var button = $(event.relatedTarget)
            var reviews = button.data('reviews')
            var candy = button.data('candy')
            var index = button.data('id')
            // console.log(reviews)

            //モーダル内に書き込み
            var modal = $(this)
            $(".modal-body > .reviews").empty();    
            modal.find('.modal-title').text(candy.name+'の口コミ')
            if(reviews.length != 0){
                for(i=0; i<reviews.length; i++){
                    if(reviews[i].score == 0){
                        const HTML = `
                            <hr class="m-1">
                            <div id="app" class="row">
                                <p class="col">${reviews[i].name}</p>
                                <p class="col">${reviews[i].review_time}</p>
                                <p class="col">
                                    (${reviews[i].score})
                                </p>
                            </div>
                        `
                        modal.find('.modal-body > .reviews').append(HTML)
                        modal.find('.modal-body > .reviews').append('<p class="text-info">'+reviews[i].review+'</p>')
                    }else if(reviews[i].score == 1){
                        const HTML = `
                            <hr class="m-1">
                            <div id="app" class="row">
                                <p class="col">${reviews[i].name}</p>
                                <p class="col">${reviews[i].review_time}</p>
                                <p class="col text-warning">
                                    ★(${reviews[i].score})
                                </p>
                            </div>
                        `
                        modal.find('.modal-body > .reviews').append(HTML)
                        modal.find('.modal-body > .reviews').append('<p class="text-info">'+reviews[i].review+'</p>')
                    }else if(reviews[i].score == 2){
                        const HTML = `
                            <hr class="m-1">
                            <div id="app" class="row">
                                <p class="col">${reviews[i].name}</p>
                                <p class="col">${reviews[i].review_time}</p>
                                <p class="col text-warning">
                                    ★★(${reviews[i].score})
                                </p>
                            </div>
                        `
                        modal.find('.modal-body > .reviews').append(HTML)
                        modal.find('.modal-body > .reviews').append('<p class="text-info">'+reviews[i].review+'</p>')
                    }else if(reviews[i].score == 3){
                        const HTML = `
                            <hr class="m-1">
                            <div id="app" class="row">
                                <p class="col">${reviews[i].name}</p>
                                <p class="col">${reviews[i].review_time}</p>
                                <p class="col text-warning">
                                    ★★★(${reviews[i].score})
                                </p>
                            </div>
                        `
                        modal.find('.modal-body > .reviews').append(HTML)
                        modal.find('.modal-body > .reviews').append('<p class="text-info">'+reviews[i].review+'</p>')
                    }else if(reviews[i].score == 4){
                        const HTML = `
                            <hr class="m-1">
                            <div id="app" class="row">
                                <p class="col">${reviews[i].name}</p>
                                <p class="col">${reviews[i].review_time}</p>
                                <p class="col text-warning">
                                    ★★★★(${reviews[i].score})
                                </p>
                            </div>
                        `
                        modal.find('.modal-body > .reviews').append(HTML)
                        modal.find('.modal-body > .reviews').append('<p class="text-info">'+reviews[i].review+'</p>')
                    }else if(reviews[i].score == 5){
                        const HTML = `
                            <hr class="m-1">
                            <div id="app" class="row">
                                <p class="col">${reviews[i].name}</p>
                                <p class="col">${reviews[i].review_time}</p>
                                <p class="col text-warning">
                                    ★★★★★(${reviews[i].score})
                                </p>
                            </div>
                        `
                        modal.find('.modal-body > .reviews').append(HTML)
                        modal.find('.modal-body > .reviews').append('<p class="text-info">'+reviews[i].review+'</p>')
                    }
                } 
            }else{
                modal.find('.modal-body > .reviews').append('<p>この商品に口コミはありません</p>')
            }
            //ページ遷移情報追加
            var page = 'review'+index;
            add_page(page)
        });
    });

    
    //購入情報送信Ajax
    $(function() {
        $('.purchase').on('click', function() {
            var item = JSON.parse(sessionStorage.getItem("cart_list"));
            var move = JSON.parse(sessionStorage.getItem("page_list"));
            var move_time = JSON.parse(sessionStorage.getItem("time_list"));
            //カート内合計金額計算
            var sum_price = 0;
            console.log(item)
            if(item && item.length != 0){
                for(i=0; i<item.length; i++){
                    sum_price += parseInt(item[i].cost,10);
                }
            }
            // console.log("sum:"+sum_price)
            if(item && item.length != 0){
                var flag = confirm(`あと${1000-sum_price}円分選択できます。\nよろしいですか？`)
            }else{
                alert('1つ以上お菓子をカートに追加してください')
            }
            if(flag == true){
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: '/candybox/store',
                    type: 'POST',
                    dataType: 'json',
                    data: {purcahse:item,movement:move,movement_time:move_time},
                })
                // Ajaxリクエスト成功時の処理
                .done(function(res) {
                    sessionStorage.clear()
                    window.location=res.url;
                    console.log("success!")
                })
                // Ajaxリクエスト失敗時の処理
                .fail(function(e) {
                    alert('Ajaxリクエスト失敗したため購入できません\n申し訳ないですが最初からやり直してください');
                    console.log(e)
                    sessionStorage.clear()
                    window.location='/questionary'
                });
            }
        });
    });

</script>