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
	
  <h1>Наши щенки</h1>
  <p>
@if (auth()->check())
      <a href="{{ route('dog.create', ['page' => '2']) }}" class="btn">Добавить собаку</a></p>
@endif

<div class="container">
    <div class="row">
  @foreach ($dogs as $dog)
       <a href="/dog/{{$dog->id_dogs}}">
    <div class="col-3">
    <div class="card">
        @if($dog->photo)
                <div class="card-img-top mh-8" style="background: url('img/{{$dog->photo}}') no-repeat 50% 50%; background-size: contain;">
                </div>
              @else
                <div class="card-img-top mh-8" style="background: url('./img/nophoto.jpg') no-repeat 50% 50%; background-size: cover;">
                </div>
              @endif
        <div class="card-body">
            <h5 class="card-title">{{ $dog->name }}</h5>
            <p class="card-text">{{ $dog->sex }}</p>
            <p class="card-text">{{ $dog->family }}</p>
            </a>
            @if ($dog->dbres)
            <div class="text-center">
                  <a href="{{ $dog->dbres }}" class="btn btn-primary">Посмотреть</a>
            </div>
            @endif
        </div>
<a href="/dog/{{$dog->id_dogs}}">
        <div class="card-footer">
        <small class="text-muted"><?php
        $date1 = new DateTime("now");
		$date3 = new DateTime($dog->date_age);
		$interval2 = $date1->diff($date3);
		$nowT2 = format_interval($interval2);?>
        <?=$nowT2;?></small>
      </div>
    </div>
    </div>
</a>
    @endforeach
    </div>
</div>
@endsection
