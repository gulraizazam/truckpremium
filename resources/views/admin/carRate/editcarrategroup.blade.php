@extends('admin/layout/default')
@section('content')
    <section id="">
      
      <section class="panel">
        <header class="panel-heading">
          Edit Car Rate Group
        </header>
        <div class="panel-body">
          <div class="form">
            <form class="form-validate form-horizontal" id="feedback_form" method="post" action="{{url('updatecarrate/'.$editCarrateGroup->id)}}">
              @csrf
              <div class="form-group ">
                <label for="cname" class="control-label col-lg-2">Car Pricing Min Range <span class="required">*</span></label>
                <div class="col-lg-10">
                  <input class="form-control" name="carpricingmin" value="{{$editCarrateGroup->car_pricing_rating_min}}" type="number" required />
                </div>
              </div>
              <div class="form-group ">
                <label for="cname" class="control-label col-lg-2">Car Pricing Max Range <span class="required">*</span></label>
                <div class="col-lg-10">
                  <input class="form-control"  name="carpricingmax" value="{{$editCarrateGroup->car_pricing_rating_max}}" type="number" required />
                </div>
              </div>
              <div class="form-group ">
                <label for="cemail" class="control-label col-lg-2">Notes<span class="required">*</span></label>
                <div class="col-lg-10">
                  <textarea name="carratenotes" class="form-control">{{$editCarrateGroup->notes}}</textarea>
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
