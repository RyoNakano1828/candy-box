<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/css/app.css">
        <title>QuestionaryPart3</title>

        
    </head>
    <body>
        <div class="container">
            <h1>Part3</h1>
            <form name="questionary" action="/after_questionary/store" method="post">
                {{ csrf_field() }}

                <div class="row mx-auto">
                    <div class="mx-auto col-sm-11 col-md-8 p-1 m-1">
                        <div class="card">
                            <h5 class="card-header">アンケートでのお菓子のECサイトは使いやすかったですか？</h5>
                            <div class="card-body">
                                <div class="radio">
                                    <label><input type="radio" name="assessment" id="radio1" value="1" checked> とても使いやすかった</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="assessment" id="radio2" value="2"> 使いやすかった</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="assessment" id="radio3" value="3"> どちらかというと使いやすかった</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="assessment" id="radio4" value="4"> どちらかというと使いにくかった</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="assessment" id="radio5" value="5"> 使いにくかった</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="assessment" id="radio6" value="6"> とても使いにくかった</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mx-auto">
                    <div class="mx-auto col-sm-11 col-md-8 p-1 m-1">
                        <div class="card">
                            <h5 class="card-header">アンケートについての感想をお願いします。</h5>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="textarea1">入力:</label>
                                    <textarea id="textarea1" name='comment' class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="menu-submit">
                    <button type="submit">回答する</button>
                </div>
            </form>
        </div>
    </body>
</html>
