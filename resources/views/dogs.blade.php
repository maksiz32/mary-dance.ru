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

<!-- Yandex.Metrika counter -->

<!-- /Yandex.Metrika counter -->
<h1>Наши собаки</h1>
<p>
@if (auth()->check())
      <a href="{{ route('dog.create', ['page' => '1']) }}" class="btn btn-outline-info">Добавить собаку</a>
@endif
</p>
<div class="container">
<div class="row">
    @foreach ($dogs as $dog)
       
    <div class="col-3">
        <a href="/dog/{{$dog->id_dogs}}">
    <div class="card">
        @if($dog->photo)
                <div class="card-img-top mh-8" style="background: url('./img/{{$dog->photo}}') no-repeat 50% 50%; background-size: contain;">
                </div>
              @else
                <div class="card-img-top mh-8" style="background: url('./img/nophoto.jpg') no-repeat 50% 50%; background-size: cover;">
                </div>
              @endif
        <div class="card-body">
            <h5 class="card-title"><b>Имя:</b> {{ $dog->name }}</h5>
            <p class="card-text"><b>Пол:</b> {{ $dog->sex }}</p>
            <p class="card-text">{{ $dog->family }}</p>
            
            @if ($dog->dbres)
            <p class="card-text"><b>Ссылка на родословную:</b> <small class="text-muted">{{ $dog->dbres }}</small></p>
            <?php /*
            <div class="text-center">
                  <a href="{{ $dog->dbres }}" class="btn btn-primary">Посмотреть</a>
            </div>
             * 
             */?>
            @endif
        </div>

        <div class="card-footer">Возраст: 
        <small class="text-muted"><?php
        $date1 = new DateTime("now");
		$date3 = new DateTime($dog->date_age);
		$interval2 = $date1->diff($date3);
		$nowT2 = format_interval($interval2);?>
        <?=$nowT2;?></small>
      </div>
    </div>
</a>
    </div>

    @endforeach
</div>
    {{ $dogs->links() }}
</div>
@endsection
