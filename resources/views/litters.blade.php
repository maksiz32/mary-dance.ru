@extends('layouts.app')
@section("title", "Помёты")
@section("main")
<p>
@if (auth()->check())
      <a href="{{ route('litter.create') }}" class="btn btn-outline-info">Создать новый помёт</a></p>
@endif
<?php
function rndColor() {
    $arrColor = ['#F2B4F2','#D4D4FB','#B4FCBA','#B4F6FC','#FCB4F6','#FCBAB4'];
    $i = (mt_rand(1, count($arrColor)) - 1);
    echo $arrColor[$i];
}
?>
<div class="container">
@if (session('status'))
<p>{{ session('status') }}</p>
@endif
  @foreach ($litt as $litters)
     <a class="nonund" href="{{ action('LitterController@vlitt', ['id' => $litters->id]) }}">
    <div class="card card-body shadow" style="background-color:<?= rndColor(); ?>;">        
    <div class="row align-items-center text-center">
        <div class="col-lg-4">
            <img class="h-n" src="{{ $litters->photo1 }}">
        </div>
        <div class="col-lg-4 text-center for3">
            &nbsp;&nbsp;{!! strtoupper($litters->litter) !!}&nbsp;&nbsp;
        </div>
        <div class="col-lg-4">
            <img class="h-n" src="{{ $litters->photo2 }}">
        </div>
    </div>
    <div class="row align-items-center">
        <div class="col-lg-4 text-left">
            {{ $litters->name1 }}
        </div>
        <div class="col-lg-4 text-center">
            <?php echo (html_entity_decode($litters->descrp));?>
        </div>
        <div class="col-lg-4 text-right">
            {{ $litters->name2 }}
        </div>
    </div>
@if (auth()->check())
<div class="row text-center">
    <div class="col">
        <br />
    </a>
            <a href="{{ action('LitterController@input', ['id' => $litters->id]) }}" class="btn btn-primary btn-lg btn-block">
                Редактировать
            </a>
            <a href="{{ action('LitterController@photo', ['id' => $litters->id]) }}" class="btn btn-secondary btn-lg btn-block">
                Добавить фоток в Помёт
            </a>
            <a href="{{ action('LitterController@destroy', ['id' => $litters->id]) }}" class="btn btn-success btn-lg btn-block" onclick="return confirm('Подтверждаете удаление?')">
                Удалить
            </a>
    </div>
</div>
@endif
    </div>
    @endforeach
        {{ $litt->links() }}
</div>
@endsection
