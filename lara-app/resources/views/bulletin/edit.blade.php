<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>公告編輯</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net" />
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/bulletin.css') }}" />

        <!-- JavaScripts -->
        <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>

        <script type="text/javascript">
            $(document).ready(function () {
                @if(isset($bulletin))
                    $('#bulletin_input_type').val('{{ $bulletin->type }}');
                @endif
            });
        </script>
    </head>
    <body>
        @if(isset($bulletin))
            <div class="bulletin_action_block">
                <a class="btn btn-dark" target="_self" href="/">列表</a>
                <a class="btn btn-dark" target="_blank" href="/create">新增</a>
            </div>

            @if(session('fail'))
                <div class="alert alert-danger">{!! session('fail') !!}</div>
            @endif

            <form action="/{{ $bulletin->id }}/edit" method="POST">
                @csrf

                <div class="form-group">
                    <label for="bulletin_input_type">類型</label>
                    <select class="form-control" id="bulletin_input_type" name="type" required>
                        <option value="activity">活動</option>
                        <option value="urgency">緊急</option>
                        <option value="staff">職員</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="bulletin_input_title">標題</label>
                    <input type="text" class="form-control" id="bulletin_input_title" name="title" value="{{ $bulletin->title }}" required>
                </div>

                <div class="form-group">
                    <label for="bulletin_input_contents">內文</label>
                    <textarea class="form-control" id="bulletin_input_contents" name="contents" rows="10" required>{{ $bulletin->content }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">編輯</button>
            </form>
        @else
            <div class="alert alert-info">該則公告不存在，因此無法編輯。</div>
        @endif

        <footer>
            System built by Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
        </footer>
    </body>
</html>
