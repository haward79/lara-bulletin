<div class="bulletin_action_block">
    <a class="btn btn-dark" target="_self" href="/">列表</a>

    @if(Auth::check())
        <a class="btn btn-dark" target="_self" href="/create">新增</a>

        @if(!isset($bulletins) && isset($bulletin))
            <a class="btn btn-dark" target="_self" href="/{{ $bulletin->id }}/edit">編輯這則</a>
            <a class="btn btn-dark" target="_self" href="/{{ $bulletin->id }}/delete">刪除這則</a>
        @endif
    @endif
</div>
