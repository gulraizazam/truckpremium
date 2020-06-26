@extends('admin/layout/default')
@section('content')
    <section id="">
      
      <section class="panel">
        <header class="panel-heading">
          Add Group Factor
        </header>
        <div class="panel-body">
          <div class="form">
            <form class="form-validate form-horizontal" id="feedback_form" method="post" action="{{ url('updateGroupFactor/'.$editgroupfactor->id)}}">
              @csrf
              <div class="form-group ">
                <label for="cname" class="control-label col-lg-2">Year Start <span class="required">*</span></label>
                <div class="col-lg-10">
                  <input class="form-control" id="Tname" name="startYear" value="{{$editgroupfactor->year_start}}" type="number" required />
                </div>
              </div>
              <div class="form-group ">
                <label for="cemail" class="control-label col-lg-2">Year End<span class="required">*</span></label>
                <div class="col-lg-10">
                  <input class="form-control" id="City" name="endYear" value="{{$editgroupfactor->year_start}}" type="number" required />
                </div>
              </div>
              <div class="form-group ">
                <label for="cemail" class="control-label col-lg-2">Car Rate Group<span class="required">*</span></label>
                <div class="col-lg-10">
                  <select class="form-control" name="car_rate_group">
                    <option>Select</option>
                    @foreach($allcarrategroups as $carrategroups)
                      <option value="{{$carrategroups->id}}" {{$editgroupfactor->car_rate_group_id == $carrategroups->id ? 'selected' : ''}}>{{$carrategroups->car_pricing_rating_max}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group ">
                <label for="cemail" class="control-label col-lg-2">Group<span class="required">*</span></label>
                <div class="col-lg-10">
                  <input class="form-control" id="City" name="classgroupfactor" value="{{$editgroupfactor->year_start}}" type="number" required />
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
