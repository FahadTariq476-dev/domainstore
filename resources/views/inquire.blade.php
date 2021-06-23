<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Domain Store</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <!-- Bootstrap Core Css -->
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- JQuery DataTable Css -->
    <link href="../../plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
	<link href="../../css/stylelink.css" rel="stylesheet" />
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
        </div>
        <div class="navbar-nav ml-auto">
            <a href="#" class="nav-item nav-link btn-new btn-dark">LOG IN</a>
        </div>
    </div>
</nav>
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
</body>
</html>