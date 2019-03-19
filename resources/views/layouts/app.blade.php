<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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
              <div class="col-4">
                  <span class="text-muted">Содержимое футера, в который мы добавим адреса и информацию о владельце.</span>
              </div>
              <div class="col-4">
                  <span class="text-muted">Содержимое футера, в который мы добавим различные ссылки на разделы сайта.</span>
              </div>
              <div class="col-4">
                  <?php
                  $start_Year = "2018";
                  $this_Year = date('Y');
                  if ($start_Year == $this_Year) {
                      $years = $start_Year;
                  } else {
                      $years = "{$start_Year} - {$this_Year}";
                      }
                  ?>
                  <span class="text-muted">Содержимое футера, в который мы добавим информацию об авторских правах.
                      <br />&copy; &nbsp;&nbsp;&nbsp;<?=$years?>
                  </span>
              </div>
          </div>
      </div>
    </footer>
</body>
</html>
