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
                <input id="item-1" class="radio-inline__input2" type="radio" name="accessible-radio" value="1" checked=""/>
                <label class="radio-inline__label2" for="item-1">
                    男性
                </label>
                <input id="item-2" class="radio-inline__input" type="radio" name="accessible-radio" value="2"/>
                <label class="radio-inline__label" for="item-2">
                    女性
                </label>
                </fieldset>
                <div>
                    <label>生年月日</label>
                    <input type="date" name="birthday" value="">
                </div>      
                <div>

                    <label>生年月日</label>
                    <select id="year" name="year">
                        <option value="">---</option>
                        <?php $years = array_reverse(range(today()->year - 100, today()->year)); ?>
                        @foreach($years as $year)
                        <option
                            value="{{ $year }}"
                            {{ old('year') == $year ? 'selected' : '' }}
                        >{{ $year }}</option>
                        @endforeach
                    </select>
                    <label for="year">年</label>

                    <select id="month" name="month">
                        <option value="">---</option>
                        @foreach(range(1, 12) as $month)
                        <option
                            value="{{ $month }}"
                            {{ old('month') == $month ? 'selected' : '' }}
                        >{{ $month }}</option>
                        @endforeach
                    </select>
                    <label for="month">月</label>

                    <select
                        id="day"
                        name="day"
                        data-old-value="{{ old('day') }}"
                    ></select>
                    <label for="day">日</label>
                </div>
                <div>
                    <label for="height">身長</label>
                    <input type="text" name="height">
                </div>
                <div>
                    <label for="weight">体重</label>
                    <input type="text" name="weight">
                </div>

                @foreach ($eats as $eat)
                    <label><input name="eat{{$eat->id}}" type="checkbox" value="{{$eat->id}}">{{$eat->name}}</label>
                @endforeach
                <div class="menu-submit">
                    <button type="submit">次へ</button>
                </div>
            </form>
        </div>
        <script src="/js/birthday.js"></script>
    </body>
</html>
