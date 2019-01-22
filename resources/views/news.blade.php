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
      <a href="{{ route('news.create') }}" class="btn">Добавить новость</a>
@endif
</p>
  <div class="container">
      <div class="row">
          
          @foreach ($news1 as $news)
          <div class="col-12">
              
            <a href="/news/{{$news->id}}">
              <div class="card">
                  
        <h5 class="mh-2 text-center">{{ $news->title }}</h5>
                  
        <div class="card-body">
            @if(!@empty($news->photo))
                <div style="background: url('img/{{$news->photo}}') no-repeat 50% 50%; background-size: contain;">
                h</div>              
            @endif
            
            <p class="card-text">{{ $news->text }}</p>                     
        </div>
        <div class="card-footer">
            Автор: {{ $news->author }} :: <small class="text-muted">
                {{ $news->date }}
                    <?php
        $date1 = new DateTime("now");
		$date3 = new DateTime($news->date);
		$interval2 = $date1->diff($date3);
		$nowT2 = format_interval($interval2);?>
        <?=" (" . $nowT2 . " назад)";?></small>
      </div>
    </div>
             </a> 
              
          </div>
          @endforeach
      </div>
  </div>
@endsection