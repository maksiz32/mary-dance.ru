@extends('layouts.app')
@section("title", "$content->title")
@section("main")
<div class="p-3 mb-2 bg-secondary text-white text-center">
    <h1><strong>{{ $content->title }}</strong></h1>
</div>
<div class="container">
    <div class="row">
        <div class="col-12">
            <img class="img-thumbnail h-n" src="<?php public_path();?>/{{ $content->photo }}">
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <?php echo (html_entity_decode($content->pageContent)); ?>
        </div>
    </div>
            @if (auth()->check())
            <a href="{{ action('MainController@input', ['id' => $content->id]) }}" class="btn btn-primary btn-lg btn-block">
                Редактировать
            </a>
            <a href="{{ action('MainController@destroy', ['id' => $content->id]) }}" class="btn btn-success btn-lg btn-block" onclick="return confirm('Подтверждаете удаление?')">
                Удалить
            </a>
            @endif
</div>
@endsection