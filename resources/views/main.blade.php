<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-grid.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-reboot.css">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
    
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    
</head>
<body>
    <header>
    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    <div class="navbar-collapse" id="navbarTogglerDemo01">
        <a class="navbar-brand" href="#">Hidden brand</a>
    
    <div class="my-2 my-lg-0">
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
      </li>
    </ul>
    </div>
  </div>
</nav>
</header>
    
    <main role="main">
    <div id="carouselExampleControls" class="carousel slide carousel-fade" data-ride="carousel">
        
        <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
        
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="img/1.jpg" alt="First slide">
            <div class="carousel-caption d-none d-md-block">
                <h5>ПЕРВЫЙ СЛАЙД</h5>
                <p>Всякое описание раздела</p>
            </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="img/2.jpg" alt="First slide">
            <div class="carousel-caption d-none d-md-block">
                <h5>ВТОРОЙ СЛАЙД</h5>
                <p>Всякое описание раздела</p>
            </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="img/3.jpg" alt="First slide">
            <div class="carousel-caption d-none d-md-block">
                <h5>ТРЕТИЙ СЛАЙД</h5>
                <p>Всякое описание раздела</p>
            </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
 
    
    <div class="container marketing">

        <!-- Three columns of text below the carousel -->
        <div class="row">
          <div class="col-lg-4">
            <img class="rounded-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">
          <h2>Раздел 1</h2>
          <p>Очень много текста 
		  Очень много текста
		  Очень много текста
		  Очень много текста
		  Очень много текста
		  Очень много текста Очень много текста Очень много текстаОчень много текстаОчень много текстаОчень много текстаОчень много текстаОчень много текстаОчень много текстаОчень много текстаОчень много текстаОчень много текстаОчень много текстаОчень много текстаОчень много текстаОчень много текстаОчень много текстаОчень много текстаОчень много текстаОчень много текстаОчень много текстаОчень много текстаОчень много текстаОчень много текстаОчень много текстаОчень много текстаОчень много текстаОчень много текстаОчень много текстаОчень много текстаОчень много текстаОчень много текстаОчень много текстаОчень много текстаОчень много текстаОчень много текстаОчень много текстаОчень много текстаОчень много текста
		  Очень много текстаОчень много текстаОчень много текстаОчень много текстаОчень много текстаОчень много текстаОчень много текстаОчень много текстаОчень много текстаОчень много текстаОчень много текстаОчень много текстаОчень много текстаОчень много текстаОчень много текстаОчень много текстаОчень много текстаОчень много текстаОчень много текстаОчень много текстаОчень много текстаОчень много текстаОчень много текстаОчень много текстаОчень много текстаОчень много текстаОчень много текстаОчень много текстаОчень много текстаОчень много текстаОчень много текстаОчень много текстаОчень много текстаОчень много текстаОчень много текстаОчень много текстаОчень много текстаОчень много текстаОчень много текстаОчень много текста
		  Очень много текстаОчень много текстаОчень много текстаОчень много текстаОчень много текстаОчень много текстаОчень много текстаОчень много текстаОчень много текстаОчень много текстаОчень много текстаОчень много текстаОчень много текстаОчень много текстаОчень много текстаОчень много текстаОчень много текста</p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div>
        <div class="col-lg-4">
            <img class="rounded-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">
            <h2>Heading</h2>
            <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh.</p>
            <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
          </div><!-- /.col-lg-4 -->
          <div class="col-lg-4">
            <img class="rounded-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">
            <h2>Heading</h2>
            <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
            <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
          </div><!-- /.col-lg-4 -->
        </div><!-- /.row -->
        </div>

<footer>
            
</footer>
</main>
    
</body>
</html>