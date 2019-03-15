@extends("layouts.app")

@section("title", $user->name . " :: Пользователи")
@section("main")
  <h1>Пользователь {{ $user->name }}</h1>
  <form method="POST" action="/users">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
    <input type="hidden" name="id" value="{{ old("id", $user->id) }}">
    <label>Имя</label>
    <input type="text" name="name" value="{{ old('name', $user->name) }}" required>
    <label>E-mail</label>
    <input type="email" name="email" value="{{ old('email', $user->email) }}" required>
    <label>Pass</label>
    <input type="text" name="password" value="{{ old('password', $user->password) }}" required>
    <label>Роль</label>
    <?php $r = old('role', $user->role); ?>
    <select name="role">
      <option value="a" @if ($r == "a") selected @endif>Автор</option>
      <option value="e" @if ($r == "e") selected @endif>Редактор</option>
      <option value="m" @if ($r == "m") selected @endif>Администратор</option>
    </select>
    <input type="submit" value="Сохранить">
  </form>
  <p><a href="/users">Список пользователей</a></p>
@endsection
