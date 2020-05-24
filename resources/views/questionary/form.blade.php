<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>QuestionaryPart1</title>

        
    </head>
    <body>
        <h1>Part1</h1>
        <div>
            <form name="questionary" action="/questionay/store" method="post">
                @csrf
                <label><input class="check" type="checkbox" id="hoge"  value="hoge">hoge</label>
                <label><input class="check" type="checkbox" id="hoge2" value="hoge2">hoge2</label>
                <label><input class="check" type="checkbox" id="hoge3" value="hoge3">hoge3</label>
                <div class="menu-submit">
                    <button type="submit" value="送信">次へ</button>
                </div>
            </form>
        </div>
    </body>
</html>
