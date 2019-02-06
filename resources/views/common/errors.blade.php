@extends('layouts.app')
@section("title", "Ошибка!")
@section("main")
@if ($errors->has($el))
  <div class="p-3 mb-2 bg-info text-white">{{ $errors->first($el) }}</div>
@endif
@endsection