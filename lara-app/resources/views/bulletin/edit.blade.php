<?php
    $page_title = '公告編輯';
?>

@extends('bulletin.common_template')

@section('js')
    $(document).ready(function () {
        @if(isset($bulletin))
            $('#bulletin_input_type').val('{{ $bulletin->type }}');
        @endif
    });
@endsection

@section('content')
    @if(isset($bulletin))
        @if(session('fail'))
            <div class="alert alert-danger">{!! session('fail') !!}</div>
        @endif

        <form class="default" action="/{{ $bulletin->id }}/edit" method="POST">
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
@endsection
