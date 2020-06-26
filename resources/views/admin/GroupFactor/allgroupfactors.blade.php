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
            <h3 class="page-header"><i class="fa fa-table"></i>All Group Factors Table</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="#">Home</a></li>
              <li><i class="fa fa-table"></i>Tables</li>
              <li><i class="fa fa-th-list"></i>All Group Factors Table</li>
            </ol>
          </div>
        </div>
        
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                All Group Factors
              </header>

              <table class="table table-striped table-advance table-hover" id="example" style="display: inline-table;">
                <thead>
                  
                  <th><i class="icon_profile"></i> ID</th>
                  <th><i class="icon_calendar"></i> Year Start</th>
                  <th><i class="icon_mail_alt"></i> Year End</th>
                  <th><i class="icon_mail_alt" ></i> Car Rate Group</th>
                  <th><i class="icon_mail_alt" style="margin-right: 5px;"></i>Group</th>
                 
                  <th ><i class="icon_pin_alt" ></i> Action</th>
                   
                </thead>
                <tbody>
                   @foreach($fetchallGroupFactors as $allGroupFactors)
                  <tr>
                    <td>{{$allGroupFactors->id}}</td>
                    <td>{{$allGroupFactors->year_start}}</td>
                    <td>{{$allGroupFactors->year_end}}</td>
                    <td>{{$allGroupFactors->car_rate_group_id}}</td>
                    <td>{{$allGroupFactors->group}}</td>
                    <td><a class="btn btn-success" data-toggle="modal" data-target="#myModal-{{$allGroupFactors->id}}">View</a>

                    <a href="{{ url('editgroupfactor/'.$allGroupFactors->id)}}" class="btn btn-primary">Edit</a>
                   <a href="{{ url('deletegroupfactors/'.$allGroupFactors->id)}}" class="btn btn-danger">Delete</a></td>
                    <div class="modal fade" id="myModal-{{$allGroupFactors->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Group Factor</h4>
                          </div>
                          <?php
                            $getData = \App\Group_Factor::where('id',$allGroupFactors->id)->get();
                          ?>
                          @foreach($getData as $d)
                          <div class="modal-body">
                            <div class="col-md-12">
                              <ul style="display:flex;">
                                <li class="servicetable">ID</li>
                                <li class="servicetable">Year Start</li>
                                <li class="servicetable">Year End</li>
                                <li class="servicetable">Car Rate Group</li>
                                <li class="servicetable">Group</li>
                              </ul>
                              
                            </div>
                            <div class="col-md-12">
                              <ul style="display:flex;">
                                <li class="servicetable">{{$d->id}}</li>
                                <li class="servicetable">{{$d->year_start}}</li>
                                <li class="servicetable">{{$d->year_end}}</li>
                                <li class="servicetable">{{$d->car_rate_group_id}}</li>
                                <li class="servicetable">{{$d->group}}</li>
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
                  </tr>
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