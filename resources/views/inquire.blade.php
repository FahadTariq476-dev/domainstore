<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Domain Store</title>
    <!-- Favicon-->
    <!-- <link rel="icon" href="../../favicon.ico" type="image/x-icon"> -->

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <!-- <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/bootstrap-tagsinput.css') }}"> -->
    <!-- Bootstrap Core Css -->
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link href="../../css/select.css" rel="stylesheet" /> -->
    <!-- Waves Effect Css -->
    <!-- <link href="../../plugins/node-waves/waves.css" rel="stylesheet" /> -->
    <!-- <link href="../../plugins/sweetalert/sweetalert.css" rel="stylesheet" /> -->
    <!-- Animation Css -->
    <!-- <link href="../../plugins/animate-css/animate.css" rel="stylesheet" /> -->

    <!-- JQuery DataTable Css -->
    <link href="../../plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- <link href="../../plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" /> -->
    <!-- <link href="../../plugins/animate-css/animate.css" rel="stylesheet" /> -->
	<link href="../../css/stylelink.css" rel="stylesheet" />
    <!-- Custom Css -->
    <!-- <link href="../../css/style.css" rel="stylesheet"> -->
    <!-- <link href="../../js/editor.css" rel="stylesheet"> -->
    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <!-- <link href="../../css/themes/all-themes.css" rel="stylesheet" /> -->
    <!-- <script src='select2/dist/js/select2.min.js' type='text/javascript'></script> -->
    <!-- CSS -->
    <!-- <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet"> -->
        
</head>

<body>
	<header>
	<nav class="navbar navbar-expand-md navbar-light bg-light fixed-top">
    <a href="#" class="navbar-brand"><img src="../../images/uni-gd-logo-dark.png"></a>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav">
            <a href="#" class="nav-item nav-link active">Market</a>
            <!-- <a href="#" class="nav-item nav-link">Profile</a>
            <a href="#" class="nav-item nav-link">Messages</a>
            <a href="#" class="nav-item nav-link disabled" tabindex="-1">Reports</a> -->
        </div>
        <div class="navbar-nav ml-auto">
            <a href="#" class="nav-item nav-link btn-new btn-dark">LOG IN</a>
        </div>
    </div>
</nav>
	<!-- <nav class="navbar navbar-default ">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><img src="../../images/uni-gd-logo-dark.png"></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Market</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Contact</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li role="separator" class="divider"></li>
                <li class="dropdown-header">Nav header</li>
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav pull-right ml-5">
            <li><a href="" class="btn btn-new btn-dark">LOG IN</a></li>
          </ul>
        </div>
    </nav> -->
	<section>
		<div class="panel-container">
			<div class="container">
				<div class="row">
					<div class="col-md-8">
						<div class="top-left">
							<h4>DomainStore.com</h4>
							<p>Continue your negotiation with seller below</p>
						</div>
						<div class="chat-box">
							<div class="container mt-5" id="box">

							  <!-- Grid row -->
							  <div class=" d-flex flex-row-reverse">

							    <!-- Grid column -->
							    <div class="d-flex flex-row-reverse">

							      <div class="card chat-room small-chat wide" id="myForm">
							        <div class="card-header white d-flex justify-content-between p-2" id="toggle" style="cursor: pointer;">
							          <div class="heading d-flex justify-content-start">
							            <div class="profile-photo">
							           	<span class="state"></span>
							            </div>
							            <div class="data">
							              <p class="name mb-0"><strong>CONVERSATION HISTORY</strong></p>
							              <!-- <p class="activity text-muted mb-0">Active now</p> -->
							            </div>
							          </div>
							          
							        </div>
							        <div class="my-custom-scrollbar" id="message">
							          <div class="card-body p-3">
							            <div class="chat-message">
							              <div class="card bg-secondary rounded w-75 float-right z-depth-0 mb-1">
							                <div class="card-body p-2">
							                  <p class="card-text text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit voluptatem cum eum tempore.
							                  </p>
							                </div> 
							              </div>
							              <div class="card bg-light rounded w-75 z-depth-0 mb-1 message-text">
							                <div class="card-body p-2">
							                  <p class="card-text black-text">Nostrum minima cupiditate assumenda, atque cumque hic voluptatibus at corporis maxime quam harum.</p>
							                </div>
							              </div>
							            </div>
							          </div>
							        </div>
							        <!-- <div class="card-footer text-muted white pt-1 pb-2 px-3">
							          <input type="text" id="exampleForm2" class="form-control" placeholder="Type a message...">
							          <button>Send</button>
							        </div> -->
							        <div style="background-color: #f2f2f2;" id="inputbg"><br>
								        <div class="input-group mb-3" >
		  									<input type="text"  class="form-control" placeholder="Enter Message">
		  									<input type="text" class="form-control col-sm-2" placeholder="Offer">
		  									<div class="input-group-prepend">
		    									<button class="btn btn-default" id="btnsend" type="button"><i class="fa fa-paper-plane" aria-hidden="true"></i> Send Message</button>
		  									</div>
										</div>
							        </div>
							      </div>
							    </div>
							    <!-- Grid column -->
							  </div>
  <!-- Grid row -->
						</div>
						</div>
					</div> 
						<div class="col-md-4">
							<div class="top-up">
								<p id="topuppara">Why Is Having The Right Domain So Valuable</p>
								<div id="cardtopup">
									<div class="card" style="width: 22rem;">
									  <div class="card-body">
									    <p id="cardname" class="card-title">the seller</p>
									    @foreach($users as $user)
									    <p class="card-text"><i class="fa fa-user" aria-hidden="true"></i> {{$user->name}}</p>
									    <!-- <a href="#" class="card-link">Card link</a>
									    <a href="#" class="card-link">Another link</a> -->
									    @endforeach
									  </div>
									</div><br>
									<div class="card" style="width: 22rem;">
									  <div class="card-body">
									  	@foreach($dids as $did)
									    <p class="card-title"><i class="fa fa-server" aria-hidden="true"></i> <b>Domain Name:</b> {{$did->url}}</p>
									    @endforeach
									    <p class="card-text">Purchase Price<span>No qouted price</span></p>
									    <p class="card-text">Offered Price<span>&nbsp;&nbsp;$100.00 USD</span></p>
									    <!-- <a href="#" class="card-link">Card link</a>
									    <a href="#" class="card-link">Another link</a> -->
									  </div>
									</div>
								</div>
							</div>
						</div>
				</div>
			</div>
		</div>
	</section><br>
    <!-- Page Loader --> 
    <!-- Jquery Core Js -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- <script src="../../js/editor.js"></script> -->
    <!-- <script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script type="text/javascript" src="{{ URL::asset('css/bootstrap-tagsinput.js') }}"></script>
    Bootstrap Core Js
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script> -->
    <!-- <script src="../../plugins/bootstrap/js/bootstrap.js"></script>
    <script src="bootstrap/js/jquery-1.11.3.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script> -->
    
    <!-- Select Plugin Js -->
    <!-- <script src="../../plugins/bootstrap-select/js/bootstrap-select.js"></script> -->

    <!-- Slimscroll Plugin Js -->
    <!-- <script src="../../plugins/jquery-slimscroll/jquery.slimscroll.js"></script> -->

    <!-- Waves Effect Plugin Js -->
    <!-- <script src="../../plugins/node-waves/waves.js"></script> -->

    <!-- Jquery DataTable Plugin Js -->
    <!-- <script src="../../plugins/jquery-datatable/jquery.dataTables.js"></script> -->
    <!-- <script src="../../plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script> -->
    <!-- <script src="../../plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script> -->
    <!-- <script src="../../plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script> -->

    <!-- <script src="../../plugins/bootstrap-notify/bootstrap-notify.js"></script>
    <script src="../../js/pages/ui/notifications.js"></script> -->
    <!-- Custom Js -->
    <!-- <script src="../../js/admin.js"></script>
    <script src="../../js/pages/tables/jquery-datatable.js"></script>
	<script src="../../plugins/sweetalert/sweetalert.min.js"></script>
    Demo Js
    <script src="../../js/demo.js"></script> -->
</body>
</html>