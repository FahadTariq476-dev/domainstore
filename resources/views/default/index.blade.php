<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>{{ isset($domain) ? strtr($domain[0]->url, array('http://' => '', 'https://'=>'', 'www'=> '')) : 'Default'}} - Domain Store</title>

  <!-- Bootstrap core CSS -->
  <link href="{{asset('template1/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="{{asset('template1/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
  <link href="{{asset('template1/vendor/simple-line-icons/css/simple-line-icons.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template -->
  <link href="{{asset('template1/css/landing-page.min.css')}}" rel="stylesheet">

  <style>
    .btn-default, button[type=submit]{
      background-color: rgb(239, 239, 239) !important;
    }
  </style>

</head>

<body>
  <input type="hidden" value="{{isset($did) ? $did : '0'}}" id="did">

  <!-- Navigation -->
  <nav class="navbar navbar-light bg-light static-top">
    <div class="container">
      <a class="navbar-brand" href="#">{{ isset($domain) ? strtr($domain[0]->url, array('http://' => '', 'https://'=>'', 'www'=> '')) : 'Default'}}</a>
      <!-- <a class="btn btn-primary" href="#">Sign In</a> -->
    </div>
  </nav>

  <!-- Call to Action -->
  <section class="call-to-action text-white text-center">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-xl-9 mx-auto">
          <h2 class="mb-4">{{$headline}}</h2>
        </div>
        <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
          <!-- <form>
            <div class="form-row">
              <div class="col-12 col-md-9 mb-2 mb-md-0">
                <input type="email" class="form-control form-control-lg" placeholder="Enter your email...">
              </div>
              <div class="col-12 col-md-3">
                <button type="submit" class="btn btn-block btn-lg btn-primary">Sign up!</button>
              </div>
            </div>
          </form> -->
          @foreach($domain_html as $d_html)
              {!! $d_html->domain_html !!}
            @endforeach
          <form class="build">

          @if(!isset($form))
            <h3>Contact US</h3>
            <div class="form-group">
              <label for="">Your Email:</label>
              <input type="text" class="form-control">
            </div>

            <div class="form-group">
              <label for="">Price:</label>
              <input type="number" class="form-control" placeholder="$">
            </div>
            <button class="btn btn-default" type="submit">Send</button>
            @endif
          </form>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="footer bg-light">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 h-100 text-center text-lg-left my-auto">
          <ul class="list-inline mb-2">
            <li class="list-inline-item">
              <a href="#">About</a>
            </li>
            <li class="list-inline-item">&sdot;</li>
            <li class="list-inline-item">
              <a href="#">Contact</a>
            </li>
            <li class="list-inline-item">&sdot;</li>
            <li class="list-inline-item">
              <a href="#">Terms of Use</a>
            </li>
            <li class="list-inline-item">&sdot;</li>
            <li class="list-inline-item">
              <a href="#">Privacy Policy</a>
            </li>
          </ul>
          <p class="text-muted small mb-4 mb-lg-0">&copy; DomainStore 2020. All Rights Reserved.</p>
        </div>
        <div class="col-lg-6 h-100 text-center text-lg-right my-auto">
          <ul class="list-inline mb-0">
            <li class="list-inline-item mr-3">
              <a href="#">
                <i class="fab fa-facebook fa-2x fa-fw"></i>
              </a>
            </li>
            <li class="list-inline-item mr-3">
              <a href="#">
                <i class="fab fa-twitter-square fa-2x fa-fw"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <i class="fab fa-instagram fa-2x fa-fw"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="{{asset('template1/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('template1/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  @include('layouts.tmp_common')
</body>

</html>
