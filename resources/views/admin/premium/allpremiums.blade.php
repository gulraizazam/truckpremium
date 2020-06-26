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
            <h3 class="page-header"><i class="fa fa-table"></i>All Premiums Table</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="#">Home</a></li>
              <li><i class="fa fa-table"></i>Tables</li>
              <li><i class="fa fa-th-list"></i>All Premiums Table</li>
            </ol>
          </div>
        </div>
        
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                All Premiums
              </header>

              <table class="table table-striped table-advance table-hover" id="example" style="display: inline-table;">
                <thead>
                  
                  <th><i class="icon_profile"></i> ID</th>
                  <th><i class="icon_calendar"></i> Effect Date</th>
                  <th><i class="icon_mail_alt"></i> Notes</th>
                  <th ><i class="icon_pin_alt" colspan="3"></i> Action</th>
                </thead> 
                  
                <tbody>
                   @foreach($allpremiums as $premium)
                  <tr>
                    <td>{{$premium->id}}</td>
                    <td>{{$premium->effect_date}}</td>
                    <td>{{$premium->notes}}</td>
                     <td><a class="btn btn-success" data-toggle="modal" data-target="#myModal-{{$premium->id}}">View</a>
                    <a href="{{ url('editpremium/'.$premium->id)}}" class="btn btn-primary">Edit</a>
                    <a href="{{ url('deletepremium/'.$premium->id)}}" class="btn btn-danger">Delete</a></td>
                    <div class="modal fade" id="myModal-{{$premium->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Premium</h4>
                          </div>
                          <?php
                            $getData = \App\Premium::where('id',$premium->id)->get();
                          ?>
                          @foreach($getData as $d)
                          <div class="modal-body">
                            <div class="col-md-12">
                              <ul style="display:flex;">
                                <li class="servicetable">ID</li>
                                <li class="servicetable">Effect Date</li>
                                <li class="servicetable">Notes</li>
                              </ul>
                             </div>
                            <div class="col-md-12">
                              <ul class="premiumlist" style="display:flex;">
                                <li class="servicetable">{{$d->id}}</li>
                                <li class="servicetable">{{$d->effect_date}}</li>
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