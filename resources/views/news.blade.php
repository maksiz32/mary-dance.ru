@extends('layouts.app')
@section("title", "Новости")
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
      <a href="{{ route('news.create') }}" class="btn btn-outline-info">Добавить новость</a>
@endif
</p>
  <div class="container-fluid">
      <div class="row justify-content-md-center">
          @foreach ($news1 as $news)
          <div class="col-10">
            <a class="nonund" href="/news/{{$news->id}}">
              <div class="card">
        <h5 class="mh-2 text-center">{{ $news->title }}</h5>
       <div class="row">
           <div class="col-1"> </div>
            @if(!@empty($news->photo))
            <div class="col-3">
                <img class="img-thumbnail h-n" src="{{ asset($news->photo) }}">
            </div>          
            <div class="col-7">
            {!! html_entity_decode($news->text) !!}
            </div>
            @else
            <div class="col-10">
            {!! html_entity_decode($news->text) !!}
            </div>
            @endif
            <div class="col-1"> </div>
            </div>
        <div class="card-footer">
            Автор: {{ $news->author }} :: <small class="text-muted">
                {{ $news->date }}
                    </small>
      </div>
              @if (auth()->check())
            <a href="{{ action('NewsController@input', ['id' => $news->id]) }}" class="btn btn-primary btn-lg btn-block">
                Редактировать
            </a>
            <a href="{{ action('NewsController@destroy', ['nes' => $news->id]) }}" class="btn btn-success btn-lg btn-block" onclick="return confirm('Подтверждаете удаление?')">
                Удалить
            </a>
            @endif
              </div>
            </a>
          </div>
          @endforeach
      </div>
        {{ $news1->links() }}
  </div>
@endsection