@extends('layouts.app')
<?php $h = ($dog->id_dogs) ? "Редактирование " . $dog->name : "Добавление" ?>
@section("title", $h . " - Собаки")
@section("main")
@push("head")
<script src="{{ asset('/js/jquery-ui.js') }}" type="text/javascript" charset="utf-8"></script>
<script src="{{ asset('/js/what-input.js') }}" type="text/javascript" charset="utf-8"></script>
<script>
    $(document).ready(function() {
        $('#dogsDate').datepicker({
            changeMonth: true,
            changeYear: true,
            yearRange: '-120:+0',
            width: 500,
            dateFormat: 'yy-mm-dd', //или метку через: dateFormat : '@',
            monthNames: [ "Январь", "Февраль", "Март", "Апрель", "Май", "Июнь", "Июль", "Август", "Сентябрь", "Октябрь", "Ноябрь", "Декабрь" ]
   	});
    });
</script>
@endpush
<div class="container top60">
            <h1>@if ($dog->id_dogs) Правка информации о собаке {{ $dog->name }}
                @else Добавление новой собаки 
                @endif
            </h1>
    <div class="row justify-content-md-center">
        <div class="col-md-7 col-lg-7">
            <form action="{{ action('DogController@save') }}" method="POST">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                        </ul>
                    </div>
                @endif
                @if ($dog->id_dogs)
                {{ method_field('PUT') }}
            <input type="hidden" name="id_dogs" value="{{ old('id_dogs', $dog->id_dogs) }}">
                @endif
                {{ csrf_field() }}
                <div class="form-group">
                <label for="sex" class="col-md-4 control-label">Пол собачки:</label>
                    <select name="sex" required>
                    @if ($dog->sex == 0)
                        <option value="0" selected>Сука</option>
                        <option value="1">Кобель</option>
                    @else
                        <option value="0">Сука</option>
                        <option value="1" selected>Кобель</option>
                    @endif
                    </select>
                </div>
                <div class="form-group">
                <label for="name" class="col-md-4 control-label">Имя</label>
                <input id="name" type="text" class="form-control" name="name" value="{{ old('name', $dog->name) }}" required>
                </div>
                <label for="date_age" class="col-md-4 control-label">Дата рождения</label>
                <input id="dogsDate" type="text" class="form-control" name="date_age" value="{{ old('dateDog', $dog->date_age) }}" required>
                <label for="dbres" class="col-md-4 control-label">Ссылка на БД:</label>
                <input id="dbres" type="text" class="form-control" name="dbres" value="{{ old('dbres', $dog->dbres) }}">
                <div class="form-group">
                <label for="sale" class="col-md-4 control-label">На продажу?</label>
                    <select name="sale" required>
                    @if ($dog->sale == 0)
                        <option value="0" selected>Нет</option>
                        <option value="1">Да</option>
                    @else
                        <option value="0">Нет</option>
                        <option value="1" selected>Да</option>
                    @endif
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">
                    Сохранить
                </button>
            </form>
        </div>
        <div class="col-md-5 col-lg-5">
            <div class="row">
                    @foreach ($photo as $photoDog)
                        <div class="col-md-4">
                            <img class="img-thumbnail" src="{{ asset($photoDog->photo) }}" alt="{{ $photoDog->photo }}">
                            <a href="{{ action('DogController@delphoto', ['idDog' => $photoDog->id_dogs, 'photo' => $photoDog->id]) }}" class="btn btn-success btn-lg btn-block" onclick="return confirm('Подтверждаете удаление?')">
                                Удалить
                            </a>
                        </div>
                    @endforeach
            </div>
        </div>
    </div>
    <hr />
    <div class="p-1 bg-secondary text-white text-center">
    <h3>Добавить изображения здесь:</h3>
</div>
<form action="{{ action('DogController@savePhoto') }}" method="POST" enctype="multipart/form-data">
{{ method_field('PUT') }}                
<input type="hidden" name="id" value="{{ $dog->id_dogs }}">
{{ csrf_field() }}
<div class="form-group" id="hidepr1">
    <label for="photo[]" class="col-md-4 control-label">Изображения:</label>
    <input id="photo" type="file" class="form-control" name="photo[]" required multiple>
</div>
    <button type="submit" class="btn btn-primary">
        Сохранить
    </button>
</form>
</div>
@endsection
