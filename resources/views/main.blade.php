@extends('layouts.app')
@section("title", "Главная")
@section("main")
    <div id="carouselMainControls" class="carousel slide carousel-fade" data-ride="carousel">
        
  <ol class="carousel-indicators">
@for($i = 0; $i < $count; $i++)
    <li data-target="#carouselExampleIndicators" data-slide-to="$i" <?php if ($i==0) { echo 'class="active"'; }?>></li>
@endfor
  </ol>

  <div class="carousel-inner">
    <?php $i=0; ?>
@foreach ($content as $cont)
    <div class="carousel-item <?php if ($i==0) { echo 'active'; }?>">
      <img class="d-block w-100" src="{{ $cont->photo }}">
            <div class="carousel-caption d-none d-md-block">
                <h5>{{ $cont->title }}</h5>
                <p>
                <?php echo (html_entity_decode(mb_strimwidth($cont->pageContent,0,200,"...",mb_internal_encoding()))); ?>
                </p>
            </div>
    </div>
    <?php $i++; ?>
@endforeach    
  </div>
  <a class="carousel-control-prev" href="#carouselMainControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselMainControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>    
    <div class="container marketing">
        <div class="row">
@foreach ($content as $cont)
          <div class="col-lg-4">
            <img class="rounded-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">
          <h2>{{ $cont->title }}</h2>
          <p>{!! html_entity_decode($cont->pageContent) !!}</p>
          <!-- <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p> -->
        </div>
@endforeach
        </div>
        </div>
@endsection