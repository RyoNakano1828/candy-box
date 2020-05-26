<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/css/app.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <title>QuestionaryToppage</title>

        
    </head>
    <body>
        <h1>Part2</h1>
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
                </div> 
            @endforeach
        </div>
    </body>
</html>

<script type="text/javascript">


    // フラッシュメッセージのfadeout
    $(function(){
        $('.flash_message').fadeOut(3000);
    });

</script>