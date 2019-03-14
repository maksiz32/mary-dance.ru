@extends('layouts.app')
@section("title", "Собаки")
@section("main")
<?php
function format_interval(DateInterval $interval) {	
    $result = "0 мес.";
    if ($interval->y) {
		$result = $interval->format("%y г. ");
		} else {
		$result = "";
		}
    if ($interval->m) {
		$result .= $interval->format("%m мес.");
		} else {
		$result .= "0 мес.";
		}
    return $result;
}
?>
<p>
@if (auth()->check())
      <a href="{{ route('dog.create', ['page' => '1']) }}" class="btn btn-outline-info">Добавить собаку</a>
@endif
</p>
<div class="container">
<div class="row">
@foreach ($dogs as $dog)
    <div class="col-3">
    <div class="card">
        <a href="/dog/{{$dog->id_dogs}}">
        @if($dog->photo)
            <div class="card-img-top mh-8" style="background: url('{{$dog->photo}}') no-repeat 50% 50%; background-size: contain;">
            </div>
        @else
            <div class="card-img-top mh-8" style="background: url('./img/nophoto.jpg') no-repeat 50% 50%; background-size: cover;">
            </div>
        @endif
        <div class="card-body">
            <h4 class="card-title"><b>{{ $dog->name }}</b></h4>
            <p class="card-text"><b>Пол: </b>
                @if ($dog->sex == 0)
                Сука
                @else
                Кобель
                @endif
            </p>
            <p class="card-text">Помёт: {{ $dog->family }}</p>
        @if ($dog->dbres)
            <p class="card-text"><b>Ссылка на родословную:</b> <small class="text-muted">{{ $dog->dbres }}</small></p>
        @endif
        </div>
        <div class="card-footer">Возраст: 
        <small class="text-muted">
            <?php
            $date1 = new DateTime("now");
            $date3 = new DateTime($dog->date_age);
            $interval2 = $date1->diff($date3);
            $nowT2 = format_interval($interval2);?>
        <?=$nowT2;?></small>
        </div>
        </a>
        @if (auth()->check())
        <a href="{{ action('DogController@input', ['id' => $dog->id_dogs]) }}" class="btn btn-primary">
            Редактировать
        </a>
        <a href="{{ action('DogController@destroy', ['id' => $dog->id_dogs]) }}" class="btn btn-success" onclick="return confirm('Подтверждаете удаление?')">
            Удалить
        </a>
        @endif
    </div>
    </div>
@endforeach
</div>
    {{ $dogs->links() }}
</div>
@endsection
