<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>公告刪除</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net" />
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/bulletin.css') }}" />
    </head>
    <body>
        @if(isset($bulletin))
            <div class="bulletin_action_block">
                <a class="btn btn-dark" target="_blank" href="/">列表</a>
                <a class="btn btn-dark" target="_blank" href="/create">新增</a>
            </div>

            <div class="alert alert-danger">公告確認刪除後便無法復原，請謹慎操作！</div>

            <form action="/{{ $bulletin->id }}/delete" method="POST">
                @csrf

                <div class="form-group">
                    <label for="bulletin_input_creation">建立</label>
                    <input type="text" class="form-control" id="bulletin_input_creation" value="{{ $bulletin->created_at }}" readonly>
                </div>

                <div class="form-group">
                    <label for="bulletin_input_update">最後修改</label>
                    <input type="text" class="form-control" id="bulletin_input_update" value="{{ $bulletin->updated_at }}" readonly>
                </div>

                <div class="form-group">
                    <label for="bulletin_input_type">類型</label>
                    <input type="text" class="form-control bulletin_type_{{ $bulletin->type }}" id="bulletin_input_type" value="{{ $bulletin->type_chinese }}" readonly>
                </div>

                <div class="form-group">
                    <label for="bulletin_input_title">標題</label>
                    <input type="text" class="form-control" id="bulletin_input_title" value="{{ $bulletin->title }}" readonly>
                </div>

                <div class="form-group">
                    <label for="bulletin_input_contents">內文</label>
                    <textarea class="form-control" id="bulletin_input_contents" rows="10" readonly>{{ $bulletin->content }}</textarea>
                </div>

                <button type="submit" class="btn btn-danger">確認刪除</button>
            </form>
        @else
            <div class="alert alert-info">該則公告不存在，因此無法刪除。</div>
        @endif

        <footer>
            System built by Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
        </footer>
    </body>
</html>
