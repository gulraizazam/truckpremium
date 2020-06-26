<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Truck Premium</title>

  <!-- Bootstrap CSS -->
  <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="{{asset('css/bootstrap-theme.css')}}" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="{{asset('css/elegant-icons-style.css')}}" rel="stylesheet" />
  <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet" />
 
  <!-- Custom styles -->
   
  
  <link href="{{asset('css/style.css')}}" rel="stylesheet">
  <link href="{{asset('css/style-responsive.css')}}" rel="stylesheet" />
  <link href="{{asset('css/jquery-ui-1.10.4.min.css')}}" rel="stylesheet">
   
</head>

<body>
  <!-- container section start -->
  <section id="container" class="">


    <header class="header dark-bg">
      <div class="toggle-nav">
        <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
      </div>

      <!--logo start-->
      <a href="index.html" class="logo">Truck <span class="lite">Premium</span></a>
      <!--logo end-->

      <div class="nav search-row" id="top_menu">
        <!--  search form start -->
        <!-- <ul class="nav top-menu">
          <li>
            <form class="navbar-form">
              <input class="form-control" placeholder="Search" type="text">
            </form>
          </li>
        </ul> -->
        <!--  search form end -->
      </div>

      <div class="top-nav notification-row">
        <!-- notificatoin dropdown start-->
        <ul class="nav pull-right top-menu">

          <!-- user login dropdown start-->
          <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                                <img alt="" src="img/avatar1_small.jpg">
                            </span>
                            <span class="username">{{Session::get('name')}}</span>
                            <b class="caret"></b>
                        </a>
            <ul class="dropdown-menu extended logout">
              <div class="log-arrow-up"></div>
              <!-- <li class="eborder-top">
                <a href="#"><i class="icon_profile"></i> My Profile</a>
              </li> -->
              <li>
                <a href="/logout"><i class="icon_key_alt"></i> Log Out</a>
              </li>
              
            </ul>
          </li>
          <!-- user login dropdown end -->
        </ul>
        <!-- notificatoin dropdown end-->
      </div>
    </header>
    <!--header end-->

    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">
           
          <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="icon_document_alt"></i>
                          <span>Forms</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="form_component.html">Application Form</a></li>
            </ul>
          </li>
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
  </section>
  <section id="main-content">
      <section class="wrapper">
          @yield('content')
      </section>
  </section>

  <!-- javascripts -->
  <script src="{{asset('js/jquery.js')}}"></script>
  <script src="{{asset('js/jquery-ui-1.10.4.min.js')}}"></script>
  <script src="{{asset('js/jquery-1.8.3.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/jquery-ui-1.9.2.custom.min.js')}}"></script>
  <!-- bootstrap -->
  <script src="{{asset('js/bootstrap.min.js')}}"></script>
  <!-- nice scroll -->
  <script src="{{asset('js/jquery.scrollTo.min.js')}}"></script>
  <script src="{{asset('js/jquery.nicescroll.js')}}" type="text/javascript"></script>
   
   
    <!-- custom select -->
    <script src="{{asset('js/jquery.customSelect.min.js')}}"></script>
     

    <!--custome script for all page-->
    <script src="{{asset('js/scripts.js')}}"></script>
    <script src="{{asset('js/jquery.slimscroll.min.js')}}"></script>
    @yield('scripts')

  </body>
</html>