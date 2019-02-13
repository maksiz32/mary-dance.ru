@extends('layouts.app')
@section("title", "Все разделы")
@section("main")
<h1>Все разделы</h1>
@if (session('status'))
    <p>{{ session('status') }}</p>
@endif
<p>
@if (auth()->check())
      <a href="{{ route('contents.create') }}" class="btn btn-outline-info">Добавить раздел</a>
@endif
</p>
<div class="container">
<div class="row">
    <table class="table table-striped table-bordered">
        <caption>Список разделов для просмотра и редактирования</caption>
        <thead class="thead-dark">
            <tr>
                <th scope="col">№</th>
                <th scope="col">Изображение</th>
                <th scope="col">Заголовок</th>
                <th scope="col">Содержание раздела</th>
                <th scope="col">Инструменты</th>
            </tr>
        </thead>
        <tbody>
    @foreach ($cont as $conts)
            <tr>
                <th scope="row">{{ $conts->id }}</th>
                <th>{{ $conts->photo }}</th>
                <th>{{ $conts->title }}</th>
                <th>{!! html_entity_decode($conts->pageContent) !!}</th>
                <th>
                    @if (auth()->check())
                    <p>
                        <a href="{{ action('MainController@input', ['id' => $conts->id]) }}" class="btn btn-primary">
                            Редактировать
                        </a>
                    </p>
                        <a href="{{ action('MainController@destroy', ['id' => $conts->id]) }}" class="btn btn-success">
                            Удалить
                        </a>
                    @endif
                </th>
            </tr>
    @endforeach
        </tbody>
    </table>
</div>
</div>
@endsection    
