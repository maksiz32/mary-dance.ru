@extends('layouts.app')

@push("head")
  <script src="/js/jquery.js"></script>
  <script src="/js/jquery-ui.js"></script>
  <script src="/js/what-input.js"></script>
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
    }); // end ready
  </script>
@endpush

    <?php $h = ($dog->id_dogs) ? "Редактирование " . $dog->name : "Добавление" ?>
@section("title", $h . " - Собаки")
@section("main")
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    
                    <h1>@if ($dog->id_dogs) Правка информации о собаке {{ $dog->name }}
                        @else Добавление новой собаки 
                        @endif</h1></div>
                    <div class="panel-body">    
                <form action="{{ action('DogController@save') }}" method="POST">
                    @if ($dog->id_dogs)
                    {{ method_field('PUT') }}                
                <input type="hidden" name="id_dogs" value="{{ old('id_dogs', $dog->id_dogs) }}">
                    @endif
                    {{ csrf_field() }}
                    <?php
                        if (!empty(filter_input(INPUT_GET, 'page'))) {
                            $page = filter_input(INPUT_GET, 'page');
                        } else {
                            $page = "";
                        }
                    ?>
                <input type="hidden" name="page" value="{{ old('page', $page) }}">                    
                <label for="sex" class="col-md-4 control-label">Пол собачки:</label>
                <div class="col-md-6">
                    <select name="sex" required>
                    @if ($dog->sex == 0)
                        <option value="0" selected>Сука</option>
                        <option value="1">Кобель</option>
                    @else
                        <option value="0">Сука</option>
                        <option value="1" selected>Кобель</option>
                    @endif
                    </select>
                    @include("common.errors", ["el" => "sex"])
                </div>
                <label for="name" class="col-md-4 control-label">Имя</label>
                <div class="col-md-6">
                <input id="name" type="text" class="form-control" name="name" value="{{ old('name', $dog->name) }}" required>
                </div>
                    @include("common.errors", ["el" => "name"])
                <label for="date_age" class="col-md-4 control-label">Дата рождения</label>
                <div class="col-md-6">
                <input id="dogsDate" type="text" class="form-control" name="date_age" value="{{ old('dateDog', $dog->date_age) }}" required>
                </div>
                    @include("common.errors", ["el" => "dateDog"])
                <label for="family" class="col-md-4 control-label">Помёт:</label>
                <div class="col-md-6">
                <input id="family" type="text" class="form-control" name="family" value="{{ old('family', $dog->family) }}" required>
                </div>
                    @include("common.errors", ["el" => "family"])
                <label for="dbres" class="col-md-4 control-label">Ссылка на БД:</label>
                <div class="col-md-6">
                <input id="dbres" type="text" class="form-control" name="dbres" value="{{ old('dbres', $dog->dbres) }}">
                </div>
                    @include("common.errors", ["el" => "dbres"])
                <label for="sale" class="col-md-4 control-label">На продажу?</label>
                <div class="col-md-6">
                    <select name="sale" required>
                    @if ($dog->sale == 0)
                        <option value="0" selected>Нет</option>
                        <option value="1">Да</option>
                    @else
                        <option value="0">Нет</option>
                        <option value="1" selected>Да</option>
                    @endif
                    </select>
                    @include("common.errors", ["el" => "sale"])
                </div>
                <label for="little" class="col-md-4 control-label">Собака/Щенок?</label>
                <div class="col-md-6">
                    <select name="little" required>
                    @if ($dog->little == 0)
                        <option value="0" selected>Собака</option>
                        <option value="1">Щенок</option>
                    @else
                        <option value="0">Собака</option>
                        <option value="1" selected>Щенок</option>
                    @endif
                    </select>
                    @include("common.errors", ["el" => "little"])
                </div>
                
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

