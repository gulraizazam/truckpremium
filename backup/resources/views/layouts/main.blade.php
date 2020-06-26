<!DOCTYPE html>
<html>
<head>
	<title>Truck Primium</title>
    <link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet"></link>
    <link href="{{asset('bootstrap/css/main-style.css')}}" rel="stylesheet"></link>
    @yield('css')
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-dark font-color-white">
        <a class="navbar-brand" href="#">TruckPrimium</a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#navbar-collapesdfirst" aria-controls="navbar-collapesdfirst"
            aria-expanded="false" aria-label="Toggle navigation"></button>
        <div class="collapse navbar-collapse" id="navbar-collapesdfirst">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                    <div class="dropdown-menu" aria-labelledby="dropdownId">
                        <a class="dropdown-item" href="#">Action 1</a>
                        <a class="dropdown-item" href="#">Action 2</a>
                    </div>
                </li>
            </ul>
            <!-- <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form> -->
        </div>
    </nav>
    
    
<div class="container-fluid">
    <h1>Application Form Generation</h1>
    @yield('content')
</div>
<footer class="bg-dark">
    <div class="text-center font-color-white">&copy;2020 <b>TruckPrimium</b> ALl Rights Are Reserved</div>

</footer>
<script src="{{asset('bootstrap/js/jquery.min.js')}}"></script>
<script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
    @yield('scripts')
</body>
</html>