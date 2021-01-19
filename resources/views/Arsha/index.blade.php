<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Domain Store - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ url('/') }}/assets/img/favicon.png" rel="icon">
  <link href="{{ url('/') }}/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ url('/') }}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{ url('/') }}/assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="{{ url('/') }}/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="{{ url('/') }}/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="{{ url('/') }}/assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="{{ url('/') }}/assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="{{ url('/') }}/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="{{ url('/') }}/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
  <!-- Template Main CSS File -->
  <link href="{{ url('/') }}/assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Arsha - v2.3.0
  * Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

      <h1 class="logo mr-auto"><a href="/domainstore"><img src="{{ url('/') }}/images/logo_transparent.png"></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="/domainstore">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#services">Services</a></li>
          <li><a href="#pricing">Pricing</a></li>
          <li><a href="#team">Team</a></li>
          <li class="drop-down"><a href="#">Available Domains</a>
            <ul>
              @foreach($domains AS $i=>$domain)
              <li><a href="{{route('domain.sendquery', $domain->id)}}" target="_blank">{{$domain->url}}</a></li>
              @endforeach
              <!-- <li class="drop-down"><a href="#">Deep Drop Down</a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li> -->
            </ul>
          </li>
          <li><a href="#contact">Contact</a></li>
        </ul>
      </nav><!-- .nav-menu -->
      <!-- <a href="#about" class="get-started-btn scrollto">Get Started</a> -->
    </div>
  </header><!-- End Header -->
  <!-- ======= Hero Section ======= -->

  <section id="hero" class="d-flex align-items-center">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
          <h1>Better Domains For Your Business</h1>
          <h2>Domains of your choice available here. Terms and Conditions are applied.</h2>
          <div class="d-lg-flex">
            <!-- <a href="#about" class="btn-get-started scrollto">Get Started</a> -->
            <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="venobox btn-watch-video" data-vbtype="video" data-autoplay="true"> Watch Video <i class="icofont-play-alt-2"></i></a>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
          <img src="assets/img/hero-img.png" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>
  </section><!-- End Hero -->
  @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if(session()->has('message'))
                            <div class="alert alert-success">
                                {{ session()->get('message') }}
                            </div>
                        @endif
  <main id="main">
    <!---------Domain Section-------------------->
    <section>
      <div class="container">
        <div class="section-title" data-aos="zoom-out">
            <h2>Available Domains</h2>
            <p>All Domains</p>
        </div>
      <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
            <thead>
                <tr>
                <th>#</th>
                <th>URL</th>
                <th>Status</th>
                <th>Registered At</th>
                <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                <th>#</th>
                <th>URL</th>
                <th>Status</th>
                <th>Registered At</th>
                <th>Action</th>
                </tr>
            </tfoot>
            <tbody>
              @foreach($domains AS $i=>$domain)
              <tr>
                <td>{{$i+1}}</td>                             
                <td>
                  <a href="{{route('domain.sendquery', $domain->id)}}" target="_blank">{{$domain->url}}</a>
                </td>
                <td>Active</td>
                <td>{{date('d-m-Y', strtotime($domain->created_at))}}</td>
                <td>
                  <div class="btn-group">
                    <button class="btn btn-info btn-sm view-domain">Send Query</button>
                    <!-- <button class="btn btn-primary btn-sm edit-domain">Edit</button>
                    <button class="btn btn-danger btn-sm del-domain">Delete</button> -->
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
      </div>
    </div>
    </section>
    <!-------end domain section------------------>
    <!-----ABout section----------->
    <section id="about" class="about">
          <div class="container">
            <div class="section-title" data-aos="zoom-out">
              <h2>About</h2>
              <p>Who we are</p>
            </div>
            <div class="row content" data-aos="fade-up">
              <div class="col-lg-6">
                <p>
                  We are selling domains that are very useful in market level. We are the company that consist of the many peoples. We are real in our term.
                </p>
                <ul>
                  <li><i class="ri-check-double-line"></i> Domain Store is a global online marketplace where individuals and business owners buy and sell websites, online businesses and other digital real estate</li>
                  <li><i class="ri-check-double-line"></i> On Domain Store, sellers are selling their passion projects, side hustles and online businesses. We make the process super easy by connecting you with these sellers and streamlining the negotiation and transaction</li>
                  <li><i class="ri-check-double-line"></i> We have an integrated offers platform. You can safely use our escrow services, contracts of sale and sales support team.</li>
                </ul>
              </div>
              <div class="col-lg-6 pt-4 pt-lg-0">
                <p>
                  Life changing site. I sold for $550,000. It gave me what I wanted, volume. I had at least 50 requests to view the listing. And of those I received two serious buyers. I was able to leverage competing offers. Flippa’s fee is literally half to 75% less than working with a broker
                </p>
                <a href="#" class="btn-learn-more">Learn More</a>
              </div>
            </div>
          </div>
        </section><!----------End about section------->
        <!-------------What we do section-------------->
        <section id="services" class="services">
      <div class="container">

        <div class="section-title aos-init aos-animate" data-aos="zoom-out">
          <h2>Services</h2>
          <p>What we do offer</p>
        </div>
        <div class="row">
          <div class="col-lg-4 col-md-6">
            <div class="icon-box aos-init aos-animate" data-aos="zoom-in-left">
              <div class="icon"><i class="las la-basketball-ball" style="color: #ff689b;"></i></div>
              <h4 class="title"><a href="">.com Extension</a></h4>
              <p class="description text-justify">As the most recognizable domain extension, .com stands for commercial. Some may say it stands for computer or for commerce, but it was created with the intent or representing commercial websites. It is also the most popular with over 100 million registered domains</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mt-5 mt-md-0">
            <div class="icon-box aos-init aos-animate" data-aos="zoom-in-left" data-aos-delay="100">
              <div class="icon"><i class="las la-book" style="color: #e9bf06;"></i></div>
              <h4 class="title"><a href="">.pk Extension</a></h4>
              <p class="description text-justify">The .PK domain extension is best suited for local businesses in Pakistan. Buying a .PK domain name and registering it is not as difficult as it sounds. ServerSea is one of the leading domain registrars in Pakistan. They take care of all the important .PK or .COM.PK domain registration requirements for you.</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mt-5 mt-lg-0 ">
            <div class="icon-box aos-init aos-animate" data-aos="zoom-in-left" data-aos-delay="200">
              <div class="icon"><i class="las la-file-alt" style="color: #3fcdc7;"></i></div>
              <h4 class="title"><a href="">.xyz Extension</a></h4>
              <p class="description text-justify">.xyz is a top-level domain name. It was proposed in ICANN's New generic top-level domain Program, and became available to the general public on June 2, 2014. XYZ.com and CentralNic are the registries for the domain</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mt-5">
            <div class="icon-box aos-init aos-animate" data-aos="zoom-in-left" data-aos-delay="300">
              <div class="icon"><i class="las la-tachometer-alt" style="color:#41cf2e;"></i></div>
              <h4 class="title"><a href="">.in Extension</a></h4>
              <p class="description text-justify">India is a fast-growing market, and many businesses are using .in domain names to make headway in the country. The .in domain extension is a country code TLD (top-level domain) with no geographical requirements; anyone in any country may register a domain with this TLD</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mt-5">
            <div class="icon-box aos-init aos-animate" data-aos="zoom-in-left" data-aos-delay="400">
              <div class="icon"><i class="las la-globe-americas" style="color: #d6ff22;"></i></div>
              <h4 class="title"><a href="">.info Extension</a></h4>
              <p class="description text-justify">The domain name info is a generic top-level domain (gTLD) in the Domain Name System (DNS) of the Internet. The name is derived from information, although registration requirements do not prescribe any particular purpose.
              </p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mt-5">
            <div class="icon-box aos-init aos-animate" data-aos="zoom-in-left" data-aos-delay="500">
              <div class="icon"><i class="las la-clock" style="color: #4680ff;"></i></div>
              <h4 class="title"><a href="">.org Extension</a></h4>
              <p class="description">The domain name org is a generic top-level domain (gTLD) of the Domain Name System (DNS) used in the Internet. The name is truncated from organization. It was one of the original domains established in 1985, and has been operated by the Public Interest Registry since 2003.</p>
            </div>
          </div>
        </div>
      </div>
    </section><!-------End of what we do section---------------------->
    <!------------Testimonials---------------------------->
    <section id="pricing" class="pricing">
      <div class="container">
        <div class="section-title aos-init aos-animate" data-aos="zoom-out">
          <h2>Pricing</h2>
          <p>Our Competing Prices</p>
        </div>
        <div class="row">
          <div class="col-lg-3 col-md-6">
            <div class="box aos-init aos-animate" data-aos="zoom-in">
              <h3>Free</h3>
              <h4><sup>$</sup>0<span> / month</span></h4>
              <ul>
                <li>Aida dere</li>
                <li>Nec feugiat nisl</li>
                <li>Nulla at volutpat dola</li>
                <li class="na">Pharetra massa</li>
                <li class="na">Massa ultricies mi</li>
              </ul>
              <div class="btn-wrap">
                <a href="#" class="btn-buy">Buy Now</a>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 mt-4 mt-md-0">
            <div class="box featured aos-init aos-animate" data-aos="zoom-in" data-aos-delay="100">
              <h3>Business</h3>
              <h4><sup>$</sup>19<span> / month</span></h4>
              <ul>
                <li>Aida dere</li>
                <li>Nec feugiat nisl</li>
                <li>Nulla at volutpat dola</li>
                <li>Pharetra massa</li>
                <li class="na">Massa ultricies mi</li>
              </ul>
              <div class="btn-wrap">
                <a href="#" class="btn-buy">Buy Now</a>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
            <div class="box aos-init aos-animate" data-aos="zoom-in" data-aos-delay="200">
              <h3>Developer</h3>
              <h4><sup>$</sup>29<span> / month</span></h4>
              <ul>
                <li>Aida dere</li>
                <li>Nec feugiat nisl</li>
                <li>Nulla at volutpat dola</li>
                <li>Pharetra massa</li>
                <li>Massa ultricies mi</li>
              </ul>
              <div class="btn-wrap">
                <a href="#" class="btn-buy">Buy Now</a>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
            <div class="box aos-init aos-animate" data-aos="zoom-in" data-aos-delay="300">
              <span class="advanced">Advanced</span>
              <h3>Ultimate</h3>
              <h4><sup>$</sup>49<span> / month</span></h4>
              <ul>
                <li>Aida dere</li>
                <li>Nec feugiat nisl</li>
                <li>Nulla at volutpat dola</li>
                <li>Pharetra massa</li>
                <li>Massa ultricies mi</li>
              </ul>
              <div class="btn-wrap">
                <a href="#" class="btn-buy">Buy Now</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section><!-------end of testimonial section-------------->
    <!-----------Clients------------------>
    <!-- <section id="clients" class="section-bg">
      <div class="container aos-init aos-animate" data-aos="fade-up">
        <div class="section-header">
          <h3>Our CLients</h3>
          <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque dere santome nida.</p>
        </div>
        <div class="row no-gutters clients-wrap clearfix aos-init aos-animate" data-aos="zoom-in" data-aos-delay="100">
          <div class="col-lg-3 col-md-6 col-xs-6">
            <div class="client-logo">
              <img src="assets/img/clients/client-1.png" class="img-fluid" alt="">
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-xs-6">
            <div class="client-logo">
              <img src="assets/img/clients/client-2.png" class="img-fluid" alt="">
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-xs-6">
            <div class="client-logo">
              <img src="assets/img/clients/client-3.png" class="img-fluid" alt="">
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-xs-6">
            <div class="client-logo">
              <img src="assets/img/clients/client-4.png" class="img-fluid" alt="">
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-xs-6">
            <div class="client-logo">
              <img src="assets/img/clients/client-5.png" class="img-fluid" alt="">
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-xs-6">
            <div class="client-logo">
              <img src="assets/img/clients/client-6.png" class="img-fluid" alt="">
            </div>
          </div>
        </div>
      </div>
    </section> -->
    <!-----------end of clients--------------->
    <!-- ======= Team Section ======= -->
    <section id="team" class="team section-bg">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Team</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>
        <div class="row">
          <div class="col-lg-6">
            <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="100">
              <div class="pic"><img src="assets/img/team/team-1.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Fahad Bin Tariq</h4>
                <span>Chief Executive Officer</span>
                <p>Domain Store</p>
                <div class="social">
                  <a href=""><i class="ri-twitter-fill"></i></a>
                  <a href=""><i class="ri-facebook-fill"></i></a>
                  <a href=""><i class="ri-instagram-fill"></i></a>
                  <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6 mt-4 mt-lg-0">
            <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="200">
              <div class="pic"><img src="assets/img/team/team-2.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Muhammad Imran</h4>
                <span>Product Manager</span>
                <p>Domain Store</p>
                <div class="social">
                  <a href=""><i class="ri-twitter-fill"></i></a>
                  <a href=""><i class="ri-facebook-fill"></i></a>
                  <a href=""><i class="ri-instagram-fill"></i></a>
                  <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6 mt-4">
            <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="300">
              <div class="pic"><img src="assets/img/team/team-3.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Muhammad Nabeel</h4>
                <span>CTO</span>
                <p>Domain Store</p>
                <div class="social">
                  <a href=""><i class="ri-twitter-fill"></i></a>
                  <a href=""><i class="ri-facebook-fill"></i></a>
                  <a href=""><i class="ri-instagram-fill"></i></a>
                  <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6 mt-4">
            <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="400">
              <div class="pic"><img src="assets/img/team/team-4.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Waqar Sarwar</h4>
                <span>Accountant</span>
                <p>Domain Store</p>
                <div class="social">
                  <a href=""><i class="ri-twitter-fill"></i></a>
                  <a href=""><i class="ri-facebook-fill"></i></a>
                  <a href=""><i class="ri-instagram-fill"></i></a>
                  <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Team Section -->
    <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq section-bg">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Frequently Asked Questions</h2>
          <p>Here all the question that are in your mind</p>
        </div>
        <div class="faq-list">
          <ul>
            <li data-aos="fade-up" data-aos-delay="100">
              <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" class="collapse" href="#faq-list-1">Why we use domain store? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-1" class="collapse show" data-parent=".faq-list">
                <p>
                  Domain store is the site that helps us to buy the domain that we wanted to buy for our organization. You can buy this according to convenience.
                </p>
              </div>
            </li>
            <li data-aos="fade-up" data-aos-delay="200">
              <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-2" class="collapsed">From where this domains comes? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-2" class="collapse" data-parent=".faq-list">
                <p>
                  This domains are the asset of the borkers who registered domains to our system using our admin panel.
                </p>
              </div>
            </li>
            <li data-aos="fade-up" data-aos-delay="300">
              <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-3" class="collapsed">From where we register our domains? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-3" class="collapse" data-parent=".faq-list">
                <p>
                  You can register your domain using our admin panel and sell it to customers who wanted to buy.
                </p>
              </div>
            </li>
            <li data-aos="fade-up" data-aos-delay="400">
              <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-4" class="collapsed">What is query against domain? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-4" class="collapse" data-parent=".faq-list">
                <p>
                  If buyer wanted to buy any domain he has to send the query against this domain. Broker receive this query and then he/she send the acknowledgement email.
                </p>
              </div>
            </li>
            <li data-aos="fade-up" data-aos-delay="500">
              <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-5" class="collapsed">From where broker communicate to buyer? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-5" class="collapse" data-parent=".faq-list">
                <p>
                  Buyer communicate with the broker through the link recieve in the email. Then open a chat box where they both communicate easily. And decide the payment method.
                </p>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </section><!-- End Frequently Asked Questions Section -->
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Contact</h2>
          <p>Contact us using this form or postal address.</p>
        </div>
        <div class="row">
          <div class="col-lg-5 d-flex align-items-stretch">
            <div class="info">
              <div class="address">
                <i class="icofont-google-map"></i>
                <h4>Location:</h4>
                <p>Habib Calony Street no. 4 Burewala-Vehari</p>
              </div>
              <div class="email">
                <i class="icofont-envelope"></i>
                <h4>Email:</h4>
                <p>fahadtariq476@gmail.com</p>
                <p>fahadtariqhashmi476@gmail.com</p>
                <p>fahadtariqgithub476@gmail.com</p>
              </div>
              <div class="phone">
                <i class="icofont-phone"></i>
                <h4>Call:</h4>
                <p>+92 306 8142339</p>
                <p>+92 310 6301418</p>
              </div>
              <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe> -->
              <div class="mapouter">
                <div class="gmap_canvas">
                  <iframe width="100%" height="290px" frameborder="0" src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;saddr=burewala&amp;daddr=uaf subcampus burewala&amp;t=&amp;z=10&amp;ie=UTF8&amp;iwloc=B&amp;output=embed" allowfullscreen>
                  </iframe>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">

            <form action="{{route('contact.save')}}" method="post" role="form" class="email-form">
              {{csrf_field()}}
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="name">Your Name</label>
                  <input type="text" name="name" class="form-control" id="name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validate"></div>
                </div>
                <div class="form-group col-md-6">
                  <label for="name">Your Email</label>
                  <input type="email" class="form-control" name="email" id="email" data-rule="email" data-msg="Please enter a valid email" />
                  <div class="validate"></div>
                </div>
              </div>
              <div class="form-group">
                <label for="name">Subject</label>
                <input type="text" class="form-control" name="subject" id="subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <label for="name">Message</label>
                <textarea class="form-control" name="message" rows="10" data-rule="required" data-msg="Please write something for us"></textarea>
                <div class="validate"></div>
              </div>
              <div class="mb-3">
                <div class="loading">Loading</div>
                <div class=""></div>
                <div class="error-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
          </div>
        </div>
      </div>
    </section><!-- End Contact Section -->
  </main><!-- End #main -->
  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-6 footer-contact">
            <h3>Domain Store</h3>
            <p>
              Habib calony street no. 4 buewala-vehari Pakistan<br><br>
              <strong>Phone:</strong> +92 306 8142339<br>
              <strong>Email:</strong> fahadtariq476@gmail.com<br>
            </p>
          </div>
          <div class="col-lg-4 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>
          <!-- <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div> -->
          <div class="col-lg-4 col-md-6 footer-links">
            <h4>Our Social Networks</h4>
            <p>You can contact us using these Social Media Platforms</p>
            <div class="social-links mt-3">
              <a href="https://twitter.com/FahadTa65772406" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="https://web.facebook.com/fahad.insafi/" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="https://www.instagram.com/fahadbintariq476/" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
              <a href="https://www.linkedin.com/in/fahad-bin-tariq-3617581b2/" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container footer-bottom clearfix">
      <div class="copyright">
        &copy; Copyright <strong><span>UAF subcampus Burewala-Vehari 2021-2022</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/ -->
        Designed by <a href="https://webisticsmfn.xyz/">Fahad Bin Tariq <i>2017-ag-8948</i></a>
      </div>
    </div>
  </footer><!-- End Footer -->
  <a href="#" class="back-to-top"><i class="ri-arrow-up-line"></i></a>
  <div id="preloader"></div>
  <!-- Vendor JS Files -->
  <script src="{{ url('/') }}/assets/vendor/jquery/jquery.min.js"></script>
  <script src="{{ url('/') }}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{ url('/') }}/assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="{{ url('/') }}/assets/vendor/php-email-form/validate.js"></script>
  <script src="{{ url('/') }}/assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="{{ url('/') }}/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="{{ url('/') }}/assets/vendor/venobox/venobox.min.js"></script>
  <script src="{{ url('/') }}/assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="{{ url('/') }}/assets/vendor/aos/aos.js"></script>
  <!-----Datatable------------->
    <script src="{{ url('/') }}/plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="{{ url('/') }}/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="{{ url('/') }}/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="{{ url('/') }}/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="{{ url('/') }}/plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="{{ url('/') }}/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="{{ url('/') }}/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="{{ url('/') }}/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="{{ url('/') }}/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>
    <script src="{{ url('/') }}/js/pages/tables/jquery-datatable.js"></script>
  <!-- Template Main JS File -->
  <script src="{{ url('/') }}/assets/js/main.js"></script>
</body>
</html>