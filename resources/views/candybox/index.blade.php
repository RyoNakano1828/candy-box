<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
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
                                <div class="w-100"><img class="w-100" src="/images/{{$image_num}}.png" alt="{{ $candy->name }}"></div>
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

    $(function(){
        // モーダルウィンドウが開くときの処理    
        $("#modal1").on('show.bs.modal',function(event){
            var button = $(event.relatedTarget)
            var reviews = button.data('reviews')
            var candy = button.data('candy')
            console.log(reviews)
            var modal = $(this)
            $(".modal-body").empty();
            modal.find('.modal-title').text(candy.name+'の口コミ')
            if(reviews.length != 0){
                for(i=0; i<reviews.length; i++){
                    modal.find('.modal-body').append('<p>'+reviews[i].review+'</p>')
                }
            }else{
                modal.find('.modal-body').append('<p>この商品に口コミはありません</p>')
            }
        });
    });

</script>
<script type="text/javascript">
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
</script>