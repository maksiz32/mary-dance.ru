@extends('layouts.app')
@section('main')
<?php $h = "Административный модуль" ?>
@section("title", $h . "")
<div class="container">
<div class="row">
    <div class="col-3">
        <div class="card">
            <h5 class="mh-2 text-center">Главная страница</h5>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <a href="/content">
                        Редактирование разделов главной страницы
                        </a>
                    </li>
                </ul>
        </div>
    </div>
    <div class="col-3">
        <div class="card">
            <h5 class="mh-2 text-center">Помёты</h5>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <a href="/litters">
                        Редактирование раздела Помёты
                        </a></li>
                </ul>
        </div>
    </div>
    <div class="col-3">
        <div class="card">
            <h5 class="mh-2 text-center">Наши собаки</h5>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <a href="/dogs">
                        Редактирование раздела Наши собаки
                        </a></li>
                </ul>
        </div>
    </div>
    <div class="col-3">
        <div class="card">
            <h5 class="mh-2 text-center">Новости</h5>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <a href="/news">
                        Редактирование раздела Новости
                        </a></li>
                </ul>
        </div>
    </div>    
</div>
<div class="row">
    <div class="col-3">
        <div class="card">
            <h5 class="mh-2 text-center">Пользователи</h5>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <a href="/users">
                            Редактирование пользователей
                        </a>
                    </li>
                </ul>
        </div>
    </div>
</div>
    
    
    
</div>
@endsection
