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
            <h3 class="page-header"><i class="fa fa-table"></i> All Comprehensives Table</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="#">Home</a></li>
              <li><i class="fa fa-table"></i>Tables</li>
              <li><i class="fa fa-th-list"></i> All Comprehensives Table</li>
            </ol>
          </div>
        </div>
        
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                All Comprehensives
              </header>

              <table class="table table-striped table-advance table-hover" id="example" style="display: inline-table;">
                <thead>
                  
                  <th><i class="icon_profile"></i> ID</th>
                  <th><i class="icon_calendar"></i> Territory Id</th>
                  <th><i class="icon_mail_alt"></i> Group Factor</th>
                  <th><i class="icon_mail_alt"></i> Comprehensive Price</th>
                  <th><i class="icon_mail_alt"></i> Premium Id</th>
                  <th ><i class="icon_pin_alt" ></i> Action</th>
                </thead>
                  
                <tbody>
                   @foreach($fetchAllcomprehensives as $Allcomprehensives)
                  <tr>
                    <td>{{$Allcomprehensives->id}}</td>
                    <td>{{$Allcomprehensives->territory_id}}</td>
                    <td>{{$Allcomprehensives->group_factor_id}}</td>
                    <td>{{$Allcomprehensives->comprehensive_price}}</td>
                    <td>{{$Allcomprehensives->premium_id}}</td>
                    <td><a class="btn btn-success" data-toggle="modal" data-target="#myModal-{{$Allcomprehensives->id}}">View</a>

                    <a href="{{ url('editcompre/'.$Allcomprehensives->id)}}" class="btn btn-primary">Edit</a>
                    <a href="{{ url('deletecompre/'.$Allcomprehensives->id)}}" class="btn btn-danger">Delete</a></td>
                    <div class="modal fade" id="myModal-{{$Allcomprehensives->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Comprhensive</h4>
                          </div>
                          <?php
                            $getData = \App\Comprehensive::where('id',$Allcomprehensives->id)->get();
                          ?>
                          @foreach($getData as $d)
                          <div class="modal-body">
                            <div class="col-md-12">
                              <ul style="display:flex;">
                                <li class="servicetable">ID</li>
                                <li class="servicetable">Territory Id</li>
                                <li class="servicetable">Group Factor</li>
                                <li class="servicetable">Comprehensive Price</li>
                                <li class="servicetable">Premium Id</li>
                              </ul>
                              
                              
                            </div>
                            <div class="col-md-12">
                              <ul style="display:flex;">
                                <li class="servicetable">{{$d->id}}</li>
                                <li class="servicetable">{{$d->territory_id}}</li>
                                <li class="servicetable">{{$d->group_factor_id}}</li>
                                <li class="servicetable">{{$d->comprehensive_price}}</li>
                                <li class="servicetable">{{$d->premium_id}}</li>
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
                </tbody>
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