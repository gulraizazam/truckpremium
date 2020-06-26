@extends('admin/layout/default')
@section('content')
    <section id="">
      
      <section class="panel">
        <header class="panel-heading">
          Add Class Factor
        </header>
        <div class="panel-body">
          <div class="form">
            <form class="form-validate form-horizontal" id="feedback_form" method="post" action="{{ url('updateCollision/'.$editcollision->id)}}">
              @csrf
              <div class="form-group ">
                <label for="cname" class="control-label col-lg-2">Territory <span class="required">*</span></label>
                <div class="col-lg-10">
                  <select name="teritoryId" class="form-control">
                    <option>Select</option>
                    @foreach($allteritory as $territories)
                    <option value="{{$territories->id}}" {{$editcollision->territory_id == $territories->id ? 'selected' : ''}}>{{$territories->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group ">
                <label for="cemail" class="control-label col-lg-2">Group Factor<span class="required">*</span></label>
                <div class="col-lg-10">
                  <select name="groupfactor" class="form-control">
                    <option>Select</option>
                    @foreach($allgroupfactor as $groupfactor)
                    <option value="{{$groupfactor->id}}" {{$editcollision->group_factor_id == $groupfactor->id ? 'selected' : ''}}>{{$groupfactor->year_start}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group ">
                <label for="cemail" class="control-label col-lg-2">Collision Price<span class="required">*</span></label>
                <div class="col-lg-10">
                  <input class="form-control" id="City" name="collisionprice" value="{{$editcollision->collision_price}}" type="number" required />
                </div>
              </div>
              <div class="form-group ">
                <label for="cemail" class="control-label col-lg-2">Premium Id<span class="required">*</span></label>
                <div class="col-lg-10">
                  <select name="premium" class="form-control">
                    <option>Select</option>
                    @foreach($allpremiums as $premiums)
                    <option value="{{$premiums->id}}" {{$editcollision->premium_id == $premiums->id ? 'selected' : ''}}>{{$premiums->effect_date}}</option>
                    @endforeach
                  </select>
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
