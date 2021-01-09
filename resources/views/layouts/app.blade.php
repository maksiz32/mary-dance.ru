<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Maksim Manzulin">
    <meta name="keywords" content='собаки на продажу, питомник собак, 
          китайская хохлатая, купить собаку, порода, породы, породистая собака'>
    <meta name="description" content='Питомник собак породы китайская хохлатая. 
          В Брянске. В Москве. Наши питомники предлагают только качественных, породистых собачек'>

    <!-- Styles -->
    <link href="{{ asset('/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/bootstrap-grid.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/bootstrap-reboot.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/open-iconic-bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/mary.css') }}" rel="stylesheet">
    <script src="{{ asset('/js/jquery.js') }}"></script>
    <script src="{{ asset('/js/bootstrap.js') }}"></script>
    <script src="{{ asset('/js/bootstrap.bundle.js') }}"></script>
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    @stack("head")
    <title>@yield("title")</title>
</head>
<body>
        <header>
            <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="/"><div class="for2">
                        <img class="logo" src="{{asset('/logo/logo4.png')}}">
                        <strong>MaryDance</strong></div></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
    <div class="navbar-nav">
        <?php $p = request()->path(); ?>
        <a class="nav-item nav-link <?php if ($p == '/') { echo 'active'; } ?>" href="/">Главная</a>
      <a class="nav-item nav-link <?php if ($p == 'dogs1') { echo 'active'; } ?>" href="/litters">Помёты</a>
      <a class="nav-item nav-link <?php if ($p == 'dogs') { echo 'active'; } ?>" href="/alldogs">Наши собаки</a>
      <a class="nav-item nav-link <?php if ($p == 'news') { echo 'active'; } ?>" href="/news">Новости</a>
      @if (auth()->check())
      <a class="nav-item nav-link <?php if ($p == 'adm') { echo 'active'; } ?>" href="/adm">Admin</a>
      <a class="nav-item nav-link" href="/logout">Выход</a>
      @else
      <a class="nav-item nav-link" href="/login"><span class="oi oi-account-login" title="Вход" aria-hidden="true"></span></a>
      @endif
    </div>
  </div>
</nav>
        </header>
    <section>
        <div class="top60">
        @yield("main")
        </div>
    </section>
    <footer class="footer">
      <div class="container-fluid">
          <div class="row">
              <div class="col-lg-4">
                  <span class="text-muted">
                      <strong>Наши адреса:</strong>
                  </span>
                      <p>
                  <span class="text-muted">
                      МО, г. Апрелевка, ул. Жасминовая, д.4
                      <br /><br />
                      г. Брянск, ул. Грибоедова, д. 27
                  </span>
                      </p>
                      <span class="text-muted">
                      <b>E-mail:</b> <a href="mailto:Maria-NastasinaGAVyandexDDOTru" onclick="this.href=this.href.replace(/GAV/,'@').replace(/DDOT/,'.')">Написать нам на email</a>
                      </span>
              </div>
              <div class="col-lg-4">
                  <span class="text-muted"><strong>Полезные ссылки:</strong>
                      <br />
                      <a href="http://www.rkf.org.ru">
                      Российская Кинологическая Федерация
                      </a>
                  </span>
              </div>
              <div class="col-lg-4 align-items-center text-center">
                  <?php
                  $start_Year = "2018";
                  $this_Year = date('Y');
                  if ($start_Year == $this_Year) {
                      $years = $start_Year;
                  } else {
                      $years = "{$start_Year} - {$this_Year}";
                      }
                  ?>
                  <span class="text-muted">
                      <img src="{{asset('logo/logo3.png')}}" alt="Зарегистрированный ТЗ" class="logofoot">
                      <small>
                      <br />Свидетельство №20306<br />Российской Кинологической Федерации
                      <br />&copy; &nbsp;&nbsp;&nbsp;<?=$years?></small>
                  </span>
              </div>
          </div>
      </div>
    </footer>
</body>
</html>
