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
  <a class="navbar-brand" href="#">MaryDance</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
    <div class="navbar-nav">
        <?php $p = request()->path(); ?>
        <a class="nav-item nav-link <?php if ($p == '/') { echo 'active'; } ?>" href="/">Главная</a>
      <a class="nav-item nav-link <?php if ($p == 'news') { echo 'active'; } ?>" href="/news">Новости</a>
      <a class="nav-item nav-link <?php if ($p == 'care') { echo 'active'; } ?>" href="/care">Содержание</a>
      <a class="nav-item nav-link <?php if ($p == 'dogs') { echo 'active'; } ?>" href="/dogs">О породе</a>
    </div>
  </div>
</nav>
        </header>
    <section>
        @if (session('status'))
            <p>{{ session('status') }}</p>
        @endif
        @yield("main")
    </section>
    <footer>
        
    </footer>

</body>
</html>
