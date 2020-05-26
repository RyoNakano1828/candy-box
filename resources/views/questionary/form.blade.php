<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/css/app.css">
        <title>QuestionaryPart1</title>

        
    </head>
    <body>
        <h1>Part1</h1>
        <div class="center">
            <form name="questionary" action="/questionary/store" method="post">
                {{ csrf_field() }}
                
                <fieldset>
                <input id="item-1" class="radio-inline__input2" type="radio" name="gender" value="1" checked=""/>
                <label class="radio-inline__label2" for="item-1">
                    男性
                </label>
                <input id="item-2" class="radio-inline__input" type="radio" name="gender" value="2"/>
                <label class="radio-inline__label" for="item-2">
                    女性
                </label>
                </fieldset>
                <div>
                    <label>年齢</label>
                    <input type="text" name="age">
                </div>      
                <div>
                    <label for="height">身長</label>
                    <input type="text" name="height">
                </div>
                <div>
                    <label for="weight">体重</label>
                    <input type="text" name="weight">
                </div>
                <div>
                @foreach ($eats as $eat)
                    <label><input name="eat{{$eat->id}}" type="checkbox" value="{{$eat->id}}">{{$eat->name}}</label>
                @endforeach
                </div>
                <div>
                @foreach ($emotions as $emotion)
                    <label><input name="emotion{{$emotion->id}}" type="checkbox" value="{{$emotion->id}}">{{$emotion->name}}</label>
                @endforeach
                </div>
                <div>
                @foreach ($hobbies as $hobby)
                    <label><input name="hobby{{$hobby->id}}" type="checkbox" value="{{$hobby->id}}">{{$hobby->name}}</label>
                @endforeach
                </div>
                <div>
                @foreach ($personalities as $personality)
                    <label><input name="personality{{$personality->id}}" type="checkbox" value="{{$personality->id}}">{{$personality->name}}</label>
                @endforeach
                </div>
                <div>
                @foreach ($works as $work)
                    <label><input name="work{{$work->id}}" type="checkbox" value="{{$work->id}}">{{$work->name}}</label>
                @endforeach
                </div>
                <div>
                @foreach ($musics as $music)
                    <label><input name="music{{$music->id}}" type="checkbox" value="{{$music->id}}">{{$music->name}}</label>
                @endforeach
                </div>
                <div class="menu-submit">
                    <button type="submit">次へ</button>
                </div>
            </form>
        </div>
        <script src="/js/birthday.js"></script>
    </body>
</html>
