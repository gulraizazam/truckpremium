@extends('admin/layout/default')
@section('content')

<!--main content start-->
    <section id="">
      @if(Session::has('Success'))
        <div class="alert alert-success">
            {{Session::get('Success')}}
        </div>
      @endif
      @if(Session::has('Error'))
        <div class="alert alert-danger">
            {{Session::get('Error')}}
        </div>
      @endif
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-table"></i>All Car Rate Group Factors Table</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="#">Home</a></li>
              <li><i class="fa fa-table"></i>Tables</li>
              <li><i class="fa fa-th-list"></i>All Car Rate Group Factors Table</li>
            </ol>
          </div>
        </div>
        
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                All Class Factors
              </header>

              <table class="table table-striped table-advance table-hover" id="example" style="display: inline-table;">
                <thead>
                  
                    <th><i class="icon_profile"></i> ID</th>
                    <th><i class="icon_calendar"></i> Min Price Range </th>
                    <th><i class="icon_calendar"></i> Max Price Range </th>
                    <th><i class="icon_mail_alt"></i> Notes</th>
                    <th ><i class="icon_pin_alt" ></i> Action</th>
                   
                  </thead>
                  <tbody>
                   @foreach($fetchAllCarRateGroups as $AllCarRateGroups)
                  <tr>
                    <td>{{$AllCarRateGroups->id}}</td>
                    <td>{{$AllCarRateGroups->car_pricing_rating_min}}</td>
                    <td>{{$AllCarRateGroups->car_pricing_rating_max}}</td>
                    <td>{{$AllCarRateGroups->notes}}</td>
                    
                    <td><a class="btn btn-success" data-toggle="modal" data-target="#myModal-{{$AllCarRateGroups->id}}">View</a>
                    <a href="{{ url('editcarrate/'.$AllCarRateGroups->id)}}" class="btn btn-primary">Edit</a>
                    <a href="{{ url('deletecarrate/'.$AllCarRateGroups->id)}}" class="btn btn-danger">Delete</a></td>
                    
                  </tr>
                </tbody>
                  <!-- Modal -->
                  <div class="modal fade" id="myModal-{{$AllCarRateGroups->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title" id="myModalLabel">Car Rate Group</h4>
                        </div>
                        <?php
                          $getData = \App\Car_Rate_Group::where('id',$AllCarRateGroups->id)->get();
                        ?>
                        @foreach($getData as $d)
                        <div class="modal-body">
                          <div class="col-md-12">
                            <ul style="display:flex;">
                              <li class="servicetable">ID</li>
                              <li class="servicetable">Min Price Range</li>
                              <li class="servicetable">Max Price Range</li>
                              <li class="servicetable">Notes</li>
                            </ul>
                            
                          </div>
                          <div class="col-md-12">
                            <ul style="display:flex;">
                              <li class="servicetable">{{$d->id}}</li>
                              <li class="servicetable">{{$d->car_pricing_rating_min}}</li>
                              <li class="servicetable">{{$d->car_pricing_rating_max}}</li>
                              <li class="servicetable">{{$d->notes}}</li>
                            </ul>
                            
                          </div>
                        </div>
                        @endforeach
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            
                        </div>
                      </div>
                    </div>
                  </div>
                    @endforeach
                </tbody>
              </table>
            </section>
          </div>
        </div>
        <!-- page end-->
      </section>
    </section>
 
@endsection
@section('scripts')
  <script type="text/javascript">
    $(document).ready(function() {
    $('#example').DataTable();
} );
  </script>
@endsection