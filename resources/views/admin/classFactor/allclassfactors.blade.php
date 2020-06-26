@extends('admin/layout/default')
@section('content')
<style type="text/css">
  .servicetable
{
border:1px solid #dcdcdc;
list-style:none;
padding:2px;
width:49%;
display:inline-block;

}

</style>
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
            <h3 class="page-header"><i class="fa fa-table"></i> All Class Factors Table</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="#">Home</a></li>
              <li><i class="fa fa-table"></i>Tables</li>
              <li><i class="fa fa-th-list"></i> All Class Factors Table</li>
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
                    <th><i class="icon_calendar"></i> Radius</th>
                    <th><i class="icon_mail_alt"></i> Min Radius</th>
                    <th><i class="icon_mail_alt"></i> Max Radius</th>
                    <th><i class="icon_mail_alt" style="margin-right: 5px"></i>Class</th>
                    <th><i class="icon_mail_alt" style="margin-right: 5px"></i>Notes</th>
                    <th ><i class="icon_pin_alt" ></i> Action</th>
                   
                  </thead>
                  <tbody>
                   @foreach($allClassfactors as $Classfactors)
                  <tr>
                    <td>{{$Classfactors->id}}</td>
                    <td>{{$Classfactors->radius}}</td>
                    <td>{{$Classfactors->min_radius}}</td>
                    <td>{{$Classfactors->max_radius}}</td>
                    <td>{{$Classfactors->class}}</td>
                    <td>{{$Classfactors->notes}}</td>
                     <td><a class="btn btn-success" data-toggle="modal" data-target="#myModal-{{$Classfactors->id}}">View</a>
                    <a href="{{ url('editclassfactor/'.$Classfactors->id)}}" class="btn btn-primary">Edit</a>
                    <a href="{{ url('deleteclassfactors/'.$Classfactors->id)}}" class="btn btn-danger">Delete</a></td>
                    
                  </tr>
                </tbody>
                  <div class="modal fade" id="myModal-{{$Classfactors->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title" id="myModalLabel">Class Factor</h4>
                        </div>
                        <?php
                          $getData = \App\Class_Factor::where('id',$Classfactors->id)->get();
                        ?>
                        @foreach($getData as $d)
                        <div class="modal-body">
                          <div class="container">
                            <div class="row">
                              <div class="col-md-12">
                                 <ul style="display: flex">
                                    <li class="servicetable">ID</li>
                                    <li class="servicetable"> Radius</li>
                                    <li class="servicetable">Min Radius</li>
                                    <li class="servicetable">Max Radius</li>
                                    <li class="servicetable">Class</li>
                                    <li class="servicetable">Notes</li>
                                  </ul>
                                
                              </div>
                            </div>
                          <div class="row">
                            <div class="col-md-12">
                              <ul style="display: flex">
                                <li class="servicetable">{{$d->id}}</li>
                                <li class="servicetable">{{$d->radius}}</li>
                                <li class="servicetable">{{$d->min_radius}}</li>
                                <li class="servicetable">{{$d->max_radius}}</li>
                                <li class="servicetable">{{$d->class}}</li>
                                <li class="servicetable">{{$d->notes}}</li>
                              </ul>
                            </div>
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