@extends('layouts.app')
@section("title", "Главная")
@section("main")
<div id="carouselMainControls" class="container-fluid carousel slide carousel-fade" data-ride="carousel">        
  <ol class="carousel-indicators">
@for($i = 0; $i < $count; $i++)
    <li data-target="#carouselExampleIndicators" data-slide-to="$i" <?php if ($i==0) { echo 'class="active"'; }?>></li>
@endfor
  </ol>
  <div class="carousel-inner">
    <?php $i=0; ?>
@foreach ($content as $cont)
    <div class="carousel-item <?php if ($i==0) { echo 'active'; }?>">
                    <a href="#{{ $cont->id }}" class="text-white">
      <img class="d-block w-100 h-70" src="{{ $cont->photo }}">
            <div class="carousel-caption d-none d-md-block">
                <dl class="cont4car rounded">
                    <dt class="head4car">{{ $cont->title }}</dt>
                    <dd class="body4car">
                <?php echo (html_entity_decode(mb_strimwidth($cont->pageContent,0,200,"...",mb_internal_encoding()))); ?>
                    </dd>
                </dl>
            </div>
                    </a>
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
        <div class="col-lg-4" id="{{ $cont->id }}">
          <h2>{{ $cont->title }}</h2>
          <p>
              <?php echo (html_entity_decode(mb_strimwidth($cont->pageContent,0,300,"...",mb_internal_encoding()))); ?>
          </p>
          <p><a class="btn btn-secondary" href="{{ action('MainController@onepart', ['id' => $cont->id]) }}" role="button">Перейти в раздел <span class="oi oi-share" title="Перейти" aria-hidden="true"></span></a></p>
        </div>
@endforeach
        </div>
        </div>
@endsection