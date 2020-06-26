@extends('admin/layout/default')
@section('content')
        
        <!-- start section -->
        <section class="section white-backgorund fullscreen">
            <div class="middle">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 text-center">
                            <h1 class="text-danger alt-font" style="font-size: 10em;">Sorry</h1>
                            <h2>Restricted Area</h2>
                            <p class="lead">We're sorry, the page you requested cannot be found. Please go back to Home Page.</p>
                            <a href="{{route('add-report')}}" class="btn btn-default round btn-lg">Back to Home</a>
                        </div><!-- end col -->    
                    </div><!-- end row -->
                </div><!-- end container -->
            </div><!-- end middle -->
        </section>
        <!-- end section -->
               
       @stop
      
         
        
    