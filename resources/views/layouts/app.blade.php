<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>商品管理アプリ</title>

    <!-- Fonts -->
{{--    <script type="text/javascript" src="http://use.typekit.com/qcc5ovd.js"></script>--}}
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/snow.css') }}" rel="stylesheet" type="text/css">
{{--    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>--}}
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.jrumble.1.3.js"></script>


    <script type="text/javascript" src="{{ asset('js/snowfall.jquery.js') }}"></script>


    <!-- CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<p>
    <a href="javascript:(function () {var s = document.createElement('script');s.setAttribute('src', 'http://fontbomb.ilex.ca/js/main.js');document.body.appendChild(s);}());"><strong>鎖骨爆発☆</strong></a>
</p>
<div class="container">
    <header>
        <h1>@yield("title",'')</h1>
    </header>

    @yield('content')
</div>
@yield('script')

</body>
</html>