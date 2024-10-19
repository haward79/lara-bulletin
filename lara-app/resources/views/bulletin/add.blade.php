<?php
    $page_title = '公告新增';
?>

@extends('bulletin.common_template')

@section('content')
    <form class="default" action="/create" method="POST">
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
            <input type="text" class="form-control" id="bulletin_input_title" name="title" required>
        </div>

        <div class="form-group">
            <label for="bulletin_input_contents">內文</label>
            <textarea class="form-control" id="bulletin_input_contents" name="contents" rows="10" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">新增</button>
    </form>
@endsection
