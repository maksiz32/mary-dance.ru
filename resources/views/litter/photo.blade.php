@extends('layouts.app')
<?php $pageTitle = "Добавление фотографий в раздел: " . $litter->litter ?>
@section("title", $pageTitle)
@section("main")
<div class="container top60">
    <div class="row">
@foreach ($photos as $photo1)
    <div class="col-md-3 col-md-offset-2">
<img class="img-thumbnail" src="{{ asset($photo1->photo) }}">
<a href="{{ action('LitterController@delphoto', ['idLitt' => $photo1->idLitt, 'photo' => $photo1->id]) }}" class="btn btn-success btn-lg btn-block" onclick="return confirm('Подтверждаете удаление?')">
    Удалить
</a>
    </div>
@endforeach
{{ $photos->links() }}
    </div>
</div>
@if (session('status'))
    <p>{{ session('status') }}</p>
@endif
<hr class="mt-2 mb-5">
<div class="p-1 bg-secondary text-white text-center">
    <h3>Добавить изображения здесь:</h3>
</div>
<form action="{{ action('LitterController@savePhoto') }}" method="POST" enctype="multipart/form-data">
{{ method_field('PUT') }}                
<input type="hidden" name="id" value="{{ $litter->id }}">
{{ csrf_field() }}
<div class="form-group" id="hidepr1">
    <label for="photo[]" class="col-md-4 control-label">Изображения:</label>
    @if (count($errors) > 0)
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif
    <input id="photo" type="file" class="form-control" name="photo[]" required multiple>
</div>
    <button type="submit" class="btn btn-primary">
        Сохранить
    </button>
</form>

@endsection