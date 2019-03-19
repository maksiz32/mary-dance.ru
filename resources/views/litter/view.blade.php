@extends('layouts.app')
<?php $h = "Помёт -- " . ($litter->litter) ?>
@section("title", $h)
@section('main')
<div class="container-fluid">
<div class="p-3 mb-2 bg-secondary text-white text-center">
    <h1>{{ strtoupper($litter->litter) }}</h1>
</div>
    <div class="row align-items-center text-center">
        <div class="col-lg-3">
            <img class="h-n" src="{{ asset($litter->photo1) }}">
        </div>
        <div class="col-lg-6 text-center">
            {!! $litter->descrp !!}
        </div>
        <div class="col-lg-3">
            <img class="h-n" src="{{ asset($litter->photo2) }}">
        </div>
    </div>
    <div class="row align-items-center">
        <div class="col-lg-3 text-center">
            {{ $litter->name1 }}
        </div>
        <div class="col-lg-6">
        </div>
        <div class="col-lg-3 text-center">
            {{ $litter->name2 }}
        </div>
    </div>
<br />
<hr class="mt-2 mb-5">
<div class="container">
 <div class="row text-center text-lg-left no-gutters">
@foreach ($photo as $photka)
<div class="col-lg-3 col-md-4 col-6">
    <a class="fancyimage" rel="group" href="{{ $photka->photo }}" target="_blanck">
        <img class="img-fluid" src="{{ asset($photka->photo) }}" alt="">
    </a>
</div>
@endforeach
</div>
</div>
</div>
@endsection
