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
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
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
                <a href="{{route('logout')}}"><i class="icon_key_alt"></i> Log Out</a>
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
           @if(Auth::user()->isRole('admin'))
          <li class="active">
            <a class="" href="{{ url('admin')}}">
                <i class="icon_house_alt"></i>
                <span>Dashboard</span>
            </a>
          </li>
          
          <li class="sub-menu">
            <a href="javascript:;" class="">
                <i class="icon_document_alt"></i>
                <span>Premiums</span>
                <span class="menu-arrow arrow_carrot-right"></span>
            </a>
            <ul class="sub">
              <li><a class="" href="{{url('addpremium')}}">Add Premium</a></li>
              <li><a class="" href="{{url('allpremiums')}}">All Premiums</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;" class="">
                <i class="icon_desktop"></i>
                <span>Territories</span>
                <span class="menu-arrow arrow_carrot-right"></span>
            </a>
            <ul class="sub">
              <li><a class="" href="{{url('addterritory')}}">Add Territory</a></li>
              <li><a class="" href="{{url('allterritories')}}">All Territories</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;" class="">
                <i class="icon_desktop"></i>
                <span>Class Factor</span>
                <span class="menu-arrow arrow_carrot-right"></span>
            </a>
            <ul class="sub">
              <li><a class="" href="{{url('addclassfactor')}}">Add Class Factor</a></li>
              <li><a class="" href="{{url('allclassfactors')}}">All Class Factors</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;" class="">
                <i class="icon_desktop"></i>
                <span>Car Rate Group</span>
                <span class="menu-arrow arrow_carrot-right"></span>
            </a>
            <ul class="sub">
              <li><a class="" href="{{url('addcarrategroups')}}">Add Car Rate Group</a></li>
              <li><a class="" href="{{url('allcarrategroups')}}">All Car Rate Groups</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;" class="">
                 <i class="icon_piechart"></i>
                <span>Group Factors</span>
                <span class="menu-arrow arrow_carrot-right"></span>
            </a>
            <ul class="sub">
              <li><a class="" href="{{url('addnewgroupfactors')}}">Add Group Factor</a></li>
              <li><a class="" href="{{url('allgroupfactors')}}">All Group Factors</a></li>
            </ul>
          </li>
           <li class="sub-menu">
            <a href="javascript:;" class="">
                 <i class="icon_piechart"></i>
                <span>Collisions</span>
                <span class="menu-arrow arrow_carrot-right"></span>
            </a>
            <ul class="sub">
              <li><a class="" href="{{url('addcollision')}}">Add Collision</a></li>
              <li><a class="" href="{{url('allcollisions')}}">All Collisions</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;" class="">
                 <i class="icon_table"></i>
                <span>Comprehensive</span>
                <span class="menu-arrow arrow_carrot-right"></span>
            </a>
            <ul class="sub">
              <li><a class="" href="{{url('addcomprehensive')}}">Add Comprehensive</a></li>
              <li><a class="" href="{{url('allcomprehensives')}}">All Comprehensives</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;" class="">
                 <i class="icon_table"></i>
                <span>Liability</span>
                <span class="menu-arrow arrow_carrot-right"></span>
            </a>
            <ul class="sub">
              <li><a class="" href="{{url('addliability')}}">Add Liability</a></li>
              <li><a class="" href="{{url('allliabilities')}}">All Liabilities</a></li>
            </ul>
          </li>
          @else
          <li class="sub-menu">
            <a href="{{route('add-report')}}" class="">
                <i class="icon_desktop"></i>
                <span>Application Form</span>
                
            </a>
            
          </li>
          @endif
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->
    <section id="main-content">
      <section class="wrapper">
        @yield('content')
        
    </section>
   
   
  <!-- container section start -->
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
 
   
   
    <!-- custom select -->
    <script src="{{asset('js/jquery.customSelect.min.js')}}"></script>
     

    <!--custome script for all page-->
    <script src="{{asset('js/scripts.js')}}"></script>
    <script src="{{asset('js/jquery.slimscroll.min.js')}}"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    @yield('scripts')

</body>

</html>
