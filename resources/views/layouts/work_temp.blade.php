<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="{{ secure_asset('/css/wk_index.css') }}">
        <title>@yield('title')</title>
    </head>
    <body>
        
        <div class="boxA">
            <ul>
                <li><h1 class="header-logo-design"><a href="{{ route('top') }}">Travel Diary</a></h1></li>
                <li><a href="{{ route('top') }}">TOP</a></li>
                <li><a href="{{ action('Profile\ProfileController@index') }}">PROFILE</a>
                <li><a href="{{ action('Works\WorksController@index') }}">WORKS</a></li>
                <li><a href="{{ action('Mail\MailController@index') }}">MAIL</a></li>
            </ul>
        </div>
        <div class="contents">
            <div id="mainContents">
                @yield('content')
            </div>
        </div>
        <div id="footer">
            <div id="f-inner">
                @yield('footer')
            </div>
        </div>
    </body>
</html>