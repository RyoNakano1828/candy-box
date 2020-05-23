<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>QuestionaryToppage</title>

        
    </head>
    <body>
        <h1>Part2</h1>
        <div>
            <p>
            早稲田大学創造理工学部経営システム工学科学部4年の中野と申します。
            この度は、アンケートにご協力くださいましてありがとうございます。
            このアンケートの目的は、、、
            </P>
        </div>
        <a href="{{ url('/questionary/form') }}">
            <button>次へ</button>
        </a>
    </body>
</html>
