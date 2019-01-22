@extends('layouts.app')
@push("head")
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
  <script src="{{ asset('/js/jquery.js') }}"></script>
  <script src="{{ asset('/js/jquery-ui.js') }}"></script>
  <script src="{{ asset('/js/what-input.js') }}"></script>
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
@section('main')
<?php $h = "Информация :: " . ($dog->id_dogs) ?>
@section("title", $h . "")
<h1>{{ $dog->name }}</h1>
<div class="container">
    <div class="row">
        <div class="col-md-7 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">                    
                    <div class="panel-body">                
        <div class="card-body">
            <h5 class="card-title">{{ $dog->name }}</h5>
            <p class="card-text">{{ $dog->sex }}</p>
            <p class="card-text">{{ $dog->family }}</p>
            @if ($dog->dbres)
            <div class="text-center">{{ $dog->dbres }}</div>
            @endif
        </div>
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
        </div>
            <div class="container-fluid">
                <div class="row justify-content-md-center">
                    <?php if (isset($photo)) { ?>
                    @foreach ($photo as $photoDog)
                        <div class="col-md-3 col-md-offset-2">
                            <a href="/dog/{{$dog->id_dogs}}/{{$photoDog->id}}">
                            <img class="img-thumbnail" src="../../img/{{ $photoDog->photo }}" alt="{{ $photoDog->photo }}">
                            </a>
                        </div>
                    @endforeach
                    <?php } ?>
                </div>
            </div>
    </div>
        <div class="col-md-5 col-md-offset-2 row">
            <div class="col-12 justify-content-md-center justify-content-md-center">
                
                @if (@isset($firstPhoto))
                @foreach($firstPhoto as $firstPhoto1)
                <img class="img-fluid" src="../../img/{{ $firstPhoto1->photo }}" alt="{{ $firstPhoto1->photo }}">
                @endforeach
                @elseif (($photo->count()) >= 1)
                <?php $valPhoto = $photo[0]->photo; ?>
                <img class="img-fluid" src="../../img/{{ $valPhoto }}">
                @endif
            </div>
        </div>
</div>
</div>
@endsection
