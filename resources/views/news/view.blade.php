@extends('layouts.app')
@section('main')
<?php $h = "Новость :: " . ($nes->title) ?>
@section("title", $h . "")
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-2">
        <div class="card">
            <h5 class="mh-2 text-center">{{ $nes->title }}</h5>
            <div class="row">
            @if(!@empty($nes->photo))
            <div class="col-3">
                <img class="img-thumbnail h-n" src="{{ $nes->photo }}">
            </div>
            <div class="col-9">
            <p class="card-text">{!! html_entity_decode($nes->text) !!}</p>
            </div>
            @else
            <div class="col-1"></div>
            <div class="col-10">
            <p class="card-text">{!! html_entity_decode($nes->text) !!}</p>
            </div>
            <div class="col-1"></div>
            @endif
            </div>
        <div class="card-footer">
        <small class="text-muted">
        Автор: {{ $nes->author }} :: {{ $nes->date }}
        </small>
      </div>       
    </div>
            @if (auth()->check())
            <a href="{{ action('NewsController@input', ['id' => $nes->id]) }}" class="btn btn-primary btn-lg btn-block">
                Редактировать
            </a>
            <a href="{{ action('NewsController@destroy', ['nes' => $nes->id]) }}" class="btn btn-success btn-lg btn-block" onclick="return confirm('Подтверждаете удаление?')">
                Удалить
            </a>
            @endif
    </div>    
</div>
</div>
@endsection