@extends('layouts.app')

@section("title", "Новости")
@section("main")

  <h1>Всякие новости</h1>
  <div class="container">
  <table class="list">
    <tr>
      <th>Заголовок</th>
      <th>Текст</th>
      <th>Фото</th>
      <th>Дата</th>
      <th>Автор</th>
    <tr>
    @foreach ($news1 as $news)
      <tr>
        <td>{{ $news->title }}</td>
        <td>{{ $news->text }}</td>
        <td>{{ $news->name_photo }}</td>
        <td>{{ $news->date }}</td>
        <td>{{ $news->author }}</td>
      </tr>
    @endforeach
  </table>
  </div>
@endsection