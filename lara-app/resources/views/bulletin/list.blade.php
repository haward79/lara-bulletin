<?php
    $page_title = '公告列表';
?>

@extends('bulletin.common_template')

@section('content')
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
                    <div class="bulletin_list_title"><a target="_self" href="/{{ $bulletin->id }}">{{ $bulletin->title }}</a></div>
                    <div class="bulletin_list_update">{{ $bulletin->updated_at->format('m/d') }}</div>
                </div>
            @endforeach
        </div>
    @endif
@endsection
