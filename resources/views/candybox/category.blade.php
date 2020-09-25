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
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

        
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
            <h5 class="">あなたが今、家にあったらうれしいお菓子を <strong>5つ</strong> 選んでください</h5>
            <p class="m-0">※
                <button type="button" class="p-1 m-1">追加 <i class="fas fa-cart-arrow-down"></i></button>
                からお菓子を5つカートに追加して、
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
        <form id="submit_form" method='GET' action="/candybox/search">
            <input type="hidden" id="category_id" name="category_id" value="">
            <div class='container-fluid'>

                <div id="app" class='row'>
                    @foreach ($categories as $category)
                        <div id='category{{$category->id}}' class='col-4 float-left p-1 my-1 border'>
                            <p class='text-center'>{{$category->name}}</p>
                            <div class="w-100"><img class="w-100" src="{{ $url }}/{{ $category->name }}.png" alt="{{ $category->name }}"></div>
                        </div>
                    @endforeach
                    
                    <footer class="footer fixed-bottom bg-info p-1">
                        <div class="cart_items">
                        </div>
                        <button type="button" class="btn btn-primary btn-block m-1" data-toggle="modal" data-target="#cartModal">
                            カートを見る
                        </button>
                    </footer>
                </div>
            </div>
        </form>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    </body>
</html>

<script type="text/javascript">
        
    //ページ遷移情報追加メソッド
    var add_page = function(page){
        if(sessionStorage.getItem("page_list")){
            var page_list = JSON.parse(sessionStorage.getItem("page_list"));
        }else{
            var page_list = [];
        }
        page_list.push({id:page})
        console.log(page_list)
        sessionStorage.setItem("page_list", JSON.stringify(page_list));
    }

    //商品をカートに追加
    $(function(){
        $('.add_cart').on('click', function(e) {
            if(sessionStorage.getItem("cart_list")){
                var cart_list = JSON.parse(sessionStorage.getItem("cart_list"));
            }else{
                var cart_list = [];
            }
            if(cart_list.length >= 5){
                alert('5つ以上カートに入れることはできません。カートから商品を削除してください')
            }else{
                var data = e.currentTarget.dataset['item'];
                var index = e.currentTarget.dataset['id'];
                var cost = e.currentTarget.dataset['cost'];
                cart_list.push({id:index, name:data, cost:cost})
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
            $(".modal-body > .cart_items > div").empty();
            $(".modal-body > .cart_items > h5").empty();
            if(cart_list){
                for(var i=0; i<cart_list.length; i++){
                    const HTML = `
                        <div class="w-100"><img class="w-100" src="{{$url}}/${cart_list[i].id-1}.png"></div>
                        <div class="w-100">
                            <p class="font-weight-bold overflow-auto mb-0 text-center" style="height:60px">${cart_list[i].name}</p>
                            <p class="text-danger mb-0 text-center">価格：<strong>${cart_list[i].cost}</strong> 円</p>
                        </div>
                        <div class="row p-0 m-1">
                            <button type="button" class="remove_cart p-1 w-100" data-id="${cart_list[i].id}">削除 <i class="fas fa-trash-alt"></i></button>
                        </div>
                    `
                    modal.find('.modal-body > .cart_items > .cart_item'+i).append(HTML)
                }
                for(var j=0; j<5-cart_list.length; j++){
                    var x = cart_list.length+j
                    modal.find('.modal-body > .cart_items > .cart_item'+x).append('<div class="w-100"><img class="w-100" src="{{$url}}/no-item.png"></div>')
                    modal.find('.modal-body > .cart_items > .cart_item'+x).append('<div class="w-100">')
                    modal.find('.modal-body > .cart_items > .cart_item'+x).append('<p style="height:60px">商品が選択されていません</p>')
                    modal.find('.modal-body > .cart_items > .cart_item'+x).append('</div>')
                }
            }else{
                $(".modal-body > .cart_items > h5").empty();
                modal.find('.modal-body > .cart_items').append('<h5 class="text-center m-2">カートにお菓子を追加してください。</h5>')
                for(var j=0; j<5; j++){
                    modal.find('.modal-body > .cart_items > .cart_item'+j).append('<div class="w-100"><img class="w-100" src="{{$url}}/no-item.png"></div>')
                    modal.find('.modal-body > .cart_items > .cart_item'+j).append('<div class="w-100">')
                    modal.find('.modal-body > .cart_items > .cart_item'+j).append('<p style="height:60px">商品が選択されていません</p>')
                    modal.find('.modal-body > .cart_items > .cart_item'+j).append('</div>')
                }
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
                    const HTML = `
                        <hr class="m-1">
                        <div id="app" class="row">
                            <p class="col">${reviews[i].name}</p>
                            <p class="col">${reviews[i].review_time}</p>
                            <p class="col">
                                <star-rating :rating="${reviews[i].score}" 
                                                        :read-only="true" 
                                                        :increment="0.01"
                                                        v-bind:star-size="15"
                                                        v-bind:increment="0.1"
                                ></star-rating>
                            </p>
                        </div>
                    `
                    modal.find('.modal-body > .reviews').append(HTML)
                    modal.find('.modal-body > .reviews').append('<p class="text-info">'+reviews[i].review+'</p>')
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
            if(item.length < 5){
                alert('カートに5つの商品を追加してください');
            }else{
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
                .fail(function(e) {
                    alert('Ajaxリクエスト失敗したため購入できません');
                    console.log(e)
                });
            }
        });
    });

    //ゴミ検索ロジック
    $(function(){
        $("#category1").on('click', function(){
            //ページ遷移情報追加
            var page = document.getElementById("category1").firstElementChild.textContent;
            add_page("search_category"+page)
            $('#category_id').attr('value', 1);
            $("#submit_form").submit();
        });
        $("#category2").on('click', function(){
            //ページ遷移情報追加
            var page = document.getElementById("category2").firstElementChild.textContent;
            add_page("search_category"+page)
            $('#category_id').attr('value', 2);
            $("#submit_form").submit();
        });
        $("#category3").on('click', function(){
            //ページ遷移情報追加
            var page = document.getElementById("category3").firstElementChild.textContent;
            add_page("search_category"+page)
            $('#category_id').attr('value', 3);
            $("#submit_form").submit();
        });
        $("#category4").on('click', function(){
            //ページ遷移情報追加
            var page = document.getElementById("category4").firstElementChild.textContent;
            add_page("search_category"+page)
            $('#category_id').attr('value', 4);
            $("#submit_form").submit();
        });
        $("#category5").on('click', function(){
            //ページ遷移情報追加
            var page = document.getElementById("category5").firstElementChild.textContent;
            add_page("search_category"+page)
            $('#category_id').attr('value', 5);
            $("#submit_form").submit();
        });
        $("#category6").on('click', function(){
            //ページ遷移情報追加
            var page = document.getElementById("category6").firstElementChild.textContent;
            add_page("search_category"+page)
            $('#category_id').attr('value', 6);
            $("#submit_form").submit();
        });
        $("#category7").on('click', function(){
            //ページ遷移情報追加
            var page = document.getElementById("category7").firstElementChild.textContent;
            add_page("search_category"+page)
            $('#category_id').attr('value', 7);
            $("#submit_form").submit();
        });
        $("#category8").on('click', function(){
            //ページ遷移情報追加
            var page = document.getElementById("category8").firstElementChild.textContent;
            add_page("search_category"+page)
            $('#category_id').attr('value', 8);
            $("#submit_form").submit();
        });
        $("#category9").on('click', function(){
            //ページ遷移情報追加
            var page = document.getElementById("category9").firstElementChild.textContent;
            add_page("search_category"+page)
            $('#category_id').attr('value', 9);
            $("#submit_form").submit();
        });
        // $("#submit_sort").change(function(){
        //     //ページ遷移情報追加
        //     var page = document.getElementById("submit_sort").value;
        //     add_page("search_sort"+page)
        //     $("#submit_form").submit();
        // });
        // $("#submit_keyword").change(function(){
        //     //ページ遷移情報追加
        //     var page = document.getElementById("submit_keyword").value;
        //     add_page("search_keyword"+page)
        //     $("#submit_form").submit();
        // });
    });


</script>