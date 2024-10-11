<?php
    $page_title = '公告詳情';
?>

@extends('bulletin.common_template')

@section('content')
    @if(isset($bulletin))
        @if(session('success'))
            <div class="alert alert-info">{{ session('success') }}</div>
        @endif

        <form>
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
        </form>
    @else
        <div class="alert alert-info">該則公告不存在，因此無法顯示。</div>
    @endif
@endsection
