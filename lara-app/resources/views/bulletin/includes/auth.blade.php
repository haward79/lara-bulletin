<div class="bulletin_auth_block">
    @if(Auth::check())
        您好，管理員 ◇ {{ Auth::user()->name }} ◇ ({{ Auth::user()->email }}) 。
        <a class="btn btn-secondary" target="_self" href="/profile">個人資料</a>
        <form action="/logout" method="POST" style="display: inline-block;">
            @csrf
            <button class="btn btn-secondary" type="submit">登出</button>
        </form>
    @else
        您是管理員嗎？
        <a class="btn btn-secondary" target="_self" href="/login">登入</a>
    @endif
</div>
