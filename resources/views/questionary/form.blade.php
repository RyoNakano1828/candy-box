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
                <div>
                    <input type='text'/>
                </div>
            </form>
        </div>
        <button>次へ</button>
    </body>
</html>
