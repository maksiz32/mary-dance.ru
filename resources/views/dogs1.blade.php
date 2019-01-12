@extends('layouts.app')

@section("title", "Щенки")
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
	
<div class="container">
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
    @foreach ($dogs1 as $dog)
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
</div>
@endsection
