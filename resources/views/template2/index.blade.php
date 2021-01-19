<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>{{ isset($domain) ? strtr($domain[0]->url, array('http://' => '', 'https://'=>'', 'www'=> '')) : 'Template2'}} | Domain Store</title>

  <!-- Bootstrap core CSS -->
  <link href="{{asset('template3/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="{{asset('template3/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('template3/vendor/simple-line-icons/css/simple-line-icons.css')}}">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">

  <!-- Plugin CSS -->
  <link rel="stylesheet" href="{{asset('template3/device-mockups/device-mockups.min.css')}}">

  <!-- Custom styles for this template -->
  <link href="{{asset('template3/css/new-age.min.css')}}" rel="stylesheet">
  @if(isset($form))
  <style>
    .btn-default, button[type=submit]{
      background-color: rgb(239, 239, 239) !important;
    }
  </style>
  @endif
</head>

<body id="page-top">
<input type="hidden" value="{{isset($did) ? $did : '0'}}" id="did">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">{{ isset($domain) ? strtr($domain[0]->url, array('http://' => '', 'https://'=>'', 'www'=> '')) : 'Template1'}}</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <!-- <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#download">Download</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#features">Features</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
          </li> -->
        </ul>
      </div>
    </div>
  </nav>

  <header class="masthead">
    <div class="container h-100">
      <div class="row h-100">
        <div class="col-lg-7 my-auto">
          <div class="header-content mx-auto">
            <h1 class="mb-5">{{$headline}}</h1>
            <a href="//domainstore.me" class="btn btn-outline btn-xl js-scroll-trigger">Start Now for Free!</a>
          </div>
        </div>
        <div class="col-lg-5 my-auto">
          <!-- <div class="device-container">
            <div class="device-mockup iphone6_plus portrait white">
              <div class="device">
                <div class="screen">
                  <img src="{{asset('template3/img/demo-screen-1.jpg')}}" class="img-fluid" alt="">
                </div>
              </div>
            </div>
          </div> -->
          @foreach($domain_html as $d_html)
              {!! $d_html->domain_html !!}
            @endforeach
          <form class="build">
          @if(!isset($form))
          <div class="form-group">
          <label for="">Name:</label>
          <input type="text" class="form-control">
          </div>

          <div class="form-group">
          <label for="">Email:</label>
          <input type="email" class="form-control">
          </div>

          <div class="form-group">
          <label for="">Message:</label>
          <textarea class="form-control"></textarea>
          </div>

          <button class="btn btn-outline btn-xl js-scroll-trigger" type="submit">Send</button>
          @endif
          </form>
        </div>
      </div>
    </div>
  </header>



  <footer>
    <div class="container">
      <p>&copy; DomainStore {{date('Y')}}. All Rights Reserved.</p>
      <ul class="list-inline">
        <li class="list-inline-item">
          <a href="#">Privacy</a>
        </li>
        <li class="list-inline-item">
          <a href="#">Terms</a>
        </li>
        <li class="list-inline-item">
          <a href="#">FAQ</a>
        </li>
      </ul>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="{{asset('template3/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('template3/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Plugin JavaScript -->
  <script src="{{asset('template3/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

  <!-- Custom scripts for this template -->
  <script src="{{asset('template3/js/new-age.min.js')}}"></script>
  @include('layouts.tmp_common')
</html>
