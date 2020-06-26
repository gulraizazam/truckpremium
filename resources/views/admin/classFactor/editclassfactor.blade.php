@extends('admin/layout/default')
@section('content')
    <section id="">
      
      <section class="panel">
        <header class="panel-heading">
          Edit Class Factor
        </header>
        <div class="panel-body">
          <div class="form">
            <form class="form-validate form-horizontal" id="feedback_form" method="post" action="{{ url('updateclassfactors/'.$editFactor->id)}}">
              @csrf
              <div class="form-group ">
                <label for="cname" class="control-label col-lg-2">Radius <span class="required">*</span></label>
                <div class="col-lg-10">
                  <input class="form-control" id="Tname" name="Radius"  type="number" value="{{$editFactor->radius}}" required />
                </div>
              </div>
              <div class="form-group ">
                <label for="cemail" class="control-label col-lg-2">Min Radius<span class="required">*</span></label>
                <div class="col-lg-10">
                  <input class="form-control" id="City" name="minraddius" value="{{$editFactor->min_radius}}" type="number" required />
                </div>
              </div>
              <div class="form-group ">
                <label for="cemail" class="control-label col-lg-2">Max Radius<span class="required">*</span></label>
                <div class="col-lg-10">
                  <input class="form-control" id="City" name="maxraddius"  type="number" value="{{$editFactor->max_radius}}" required />
                </div>
              </div>
              <div class="form-group ">
                <label for="cemail" class="control-label col-lg-2">Class<span class="required">*</span></label>
                <div class="col-lg-10">
                  <input class="form-control" id="City" name="classfactor" value="{{$editFactor->class}}" type="number" required />
                </div>
              </div>
              <div class="form-group ">
                <label for="cemail" class="control-label col-lg-2">Notes<span class="required">*</span></label>
                <div class="col-lg-10">
                 <textarea class="form-control" name="classffactornotes">{{$editFactor->notes}}</textarea>
                </div>
              </div>
              <div class="form-group">
                <div class="col-lg-offset-2 col-lg-10">
                  <input type="submit" class="btn btn-primary" name="Submit" >
                  
                </div>
              </div>
            </form>
          </div>
        </div>
      </section>
    </section>     
@endsection
