@extends('layouts.app')

@section("title", "Собаки")
@section("main")
<?php
function format_interval(DateInterval $interval) {
	/*
	можно без использования функции:
	в самой форме:
	$date1 = new DateTime();
	$date2 = new DateTime($row['date_age']);
	$interval = $date1->diff($date2);
	echo $interval->format('%y г. %m мес.');
	*/	
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

<!-- Yandex.Metrika counter -->

<!-- /Yandex.Metrika counter -->
<div class="row">
    @foreach ($dogs as $dog)
    <div class="col-2">
    <div class="card">
        @foreach($photos as $photo)
              @if($photo->id_dogs == $dog->id_dogs)
                <img class="card-img-top mh-10" src="./img/{{$photo->photo}}" alt="Photo {{ $dog->name }}">
                @break
              @else
                <img class="card-img-top mh-10" src="./img/nophoto.jpg" alt="No-photo">
                @break
              @endif
        @endforeach
        <div class="card-body">
            <h5 class="card-title">{{ $dog->name }}</h5>
            <p class="card-text">{{ $dog->sex }}</p>
            <p class="card-text">{{ $dog->family }}</p>
            @if ($dog->dbres)
            <div class="text-center">
                  <a href="{{ $dog->dbres }}" class="btn btn-primary">Посмотреть</a>
            </div>
            @endif
        </div>
        <div class="card-footer">
        <small class="text-muted">
          {{ $dog->date_age }}
        </small>
      </div>
    </div>
    </div>
    @endforeach
</div>

    <!--
  <h1>Список пользователей</h1>
  <table class="list">
    <tr>
      <th>Имя</th>
      <th>Пол</th>
      <th>Возраст</th>
      <th>Помет</th>
      <th>Фотография</th>
      <th>БД</th>
    <tr>
    @foreach ($dogs as $dog)
      <tr>
        <td>{{ $dog->name }}</td>
        <td>{{ $dog->sex }}</td>
        <td>{{ $dog->date_age }}</td>
        <td>{{ $dog->family }}</td>
        <td>
           @foreach($photos as $photo)
              @if($photo->id_dogs == $dog->id_dogs)
                {{$photo->photo}}
              @endif
            @endforeach
        </td>
        @if ($dog->dbres)
        <td class="links">
          <a href="{{ $dog->dbres }}">Посмотреть</a>
        </td>
        @else
        <td>
          Ссылка пока недоступна
        </td>
        @endif
      </tr>
    @endforeach
  </table>
    -->
    
    
@endsection
