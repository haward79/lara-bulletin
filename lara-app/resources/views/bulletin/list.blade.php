<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>公告列表</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net" />
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/bulletin.css') }}" />
    </head>
    <body>
        <div class="bulletin_action_block">
            <a class="btn btn-dark" target="_blank" href="/create">新增</a>
        </div>

        @if(session('success'))
            <div class="alert alert-info">{{ session('success') }}</div>
        @elseif(session('fail'))
            <div class="alert alert-danger">{!! session('fail') !!}</div>
        @endif

        @if(!isset($bulletins) or $bulletins->isEmpty())
            <div class="alert alert-info">目前沒有公告喔，稍後再回來看看吧！</div>
        @else
            <div class="bulletin_list">
                @foreach($bulletins as $bulletin)
                    <div class="bulletin_list_element">
                        <div class="bulletin_list_type bulletin_type_{{ $bulletin->type }}">{{ $bulletin->type_chinese }}</div>
                        <div class="bulletin_list_title"><a target="_blank" href="/{{ $bulletin->id }}">{{ $bulletin->title }}</a></div>
                        <div class="bulletin_list_update">{{ $bulletin->updated_at->format('m/d') }}</div>
                    </div>
                @endforeach
            </div>
        @endif

        <footer>
            System built by Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
        </footer>
    </body>
</html>
