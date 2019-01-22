@extends('layouts.app')

@section('main')
<?php $h = ($nes->id) ? $nes->title : "Добавление" ?>
@section("title", $h . " - Новости")
@section("main")
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    
                    <h1>@if ($nes->id) Правка новости {{ $nes->title }}
                        @else Добавление новости 
                        @endif</h1></div>
                    <div class="panel-body">    
                <form action="{{ action('NewsController@save') }}" method="POST">
                    @if ($nes->id)
                    {{ method_field('PUT') }}                
                <input type="hidden" name="id" value="{{ old('id', $nes->id) }}">
                <input type="hidden" name="author" value="{{ old('author', $nes->author) }}">
                <input type="text" name="id" value="<?php echo (new \DateTime())->format('Y-m-d');?>">
                    @endif
                    {{ csrf_field() }}
                <label for="title" class="col-md-4 control-label">Заголовок новости:</label>                
                <div class="col-md-6">
                <input id="title" type="text" class="form-control" name="title" value="{{ old('title', $nes->title) }}" required>
                </div>
                    @include("common.errors", ["el" => "title"])
                <label for="text" class="col-md-4 control-label">Текст новости:</label>
                <div class="col-md-6">
                <input id="text" type="text" class="form-control" name="text" value="{{ old('text', $nes->text) }}" required>
                </div>
                    @include("common.errors", ["el" => "text"])
                <label for="photo" class="col-md-4 control-label">Фотки:</label>
                <div class="col-md-6">
                <input id="photo" type="text" class="form-control" name="photo" value="{{ old('photo', $nes->photo) }}" required>
                </div>
                    @include("common.errors", ["el" => "photo"])
                
                
                    <div class="col-md-8 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Сохранить
                        </button>
                    </div>
                
                </form>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
