<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Заявка</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=PT+Sans:400,700&display=swap&subset=cyrillic" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{ mix('css/app.css') }}">

    </head>
    <body>
        <div class="container h-100" id="app">
            <div class="row h-100">
                <div class="col-sm-12 align-self-center">
                    <div class="card card-block shadow-lg py-5 px-3">
                        <ul class="nav nav-tabs" id="tabs">
                            <li class="nav-item">
                                <a class="nav-link active text-primary" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><i class="fas fa-info mr-2"></i> Заявка</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link disabled" href="#"><i class="far fa-copy"></i> Документы</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link disabled" href="#"><i class="far fa-copy"></i> Шаблоны банка</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link disabled" href="#"><i class="far fa-handshake"></i> Предложения</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link disabled" href="#"><i class="far fa-copy"></i> Запрос на данные</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="tabsContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <request-component></request-component>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{ mix('js/app.js') }}" type="text/javascript"></script>
    </body>
</html>
