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

<h1>Наши новости</h1>
<p>
@if (auth()->check())
      <a href="{{ route('news.create') }}" class="btn btn-outline-info">Добавить новость</a>
@endif
</p>
  <div class="container">
      <div class="row">
          
          @foreach ($news1 as $news)
          <div class="col-12">
            <a href="/news/{{$news->id}}">
              <div class="card">
        <h5 class="mh-2 text-center">{{ $news->title }}</h5>
       <div class="row">
           <div class="col-1"> </div>
            @if(!@empty($news->photo))
            <div class="col-3">
                <img class="img-thumbnail h-n" src="{{ '../../myfiles/'.$news->photo }}">
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
    </div>
             </a> 
              
          </div>
          @endforeach
          {{ $news1->links() }}
      </div>
  </div>
@endsection