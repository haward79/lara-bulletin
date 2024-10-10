<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>List Bulletins</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net" />
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/bulletin.css') }}" />
    </head>
    <body>
        @if($bulletins->isEmpty())
            <div class="alert alert-info">There is no bulletin.</div>
        @else
            <table class="bulletin_list">
                @foreach($bulletins as $bulletin)
                    <tr>
                        <td class="bulletin_list_type {{ $bulletin->type }}">{{ $bulletin->type }}</td>
                        <td class="bulletin_list_title">{{ $bulletin->title }}</td>
                        <td class="bulletin_list_update">{{ $bulletin->updated_at->format('m/d') }}</td>
                    </tr>
                @endforeach
            </table>
        @endif

        <footer>
            System built by Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
        </footer>
    </body>
</html>
