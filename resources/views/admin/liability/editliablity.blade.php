@extends('admin/layout/default')
@section('content')
    <section id="">
      
      <section class="panel">
        <header class="panel-heading">
          Edit Liability
        </header>
        <div class="panel-body">
          <div class="form">
            <form class="form-validate form-horizontal" id="feedback_form" method="post" action="{{ url('updateLiability/'.$editliability->id)}}">
              @csrf
              <div class="form-group ">
                <label for="cname" class="control-label col-lg-2">Territory <span class="required">*</span></label>
                <div class="col-lg-10">
                  <select name="teritoryId" class="form-control">
                    <option>Select</option>
                    @foreach($allteritory as $territories)
                      <option value="{{$territories->id}}" {{$editliability->territory_id == $territories->id ? 'selected' : ''}}>{{$territories->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group ">
                <label for="cemail" class="control-label col-lg-2">Is Danger<span class="required">*</span></label>
                <div class="col-lg-10">
                  <input type="checkbox" name="isDanger"  id="isdanger" {{$editliability->is_danger == 1 ? 'checked' : ''}}>
              </div>
            </div>
              <div class="form-group ">
                <label for="cemail" class="control-label col-lg-2"> Price<span class="required">*</span></label>
                <div class="col-lg-10">
                  <input class="form-control" id="City" name="price"  type="text" value="{{$editliability->liability_price}}" required />
                </div>
              </div>
              <div class="form-group ">
                <label for="cemail" class="control-label col-lg-2">Class Factor Id<span class="required">*</span></label>
                <div class="col-lg-10">
                  <select name="classfactor" class="form-control">
                    <option>Select</option>
                    @foreach($allClassfactor as $Classfactor)
                    <option value="{{$Classfactor->id}}" {{$editliability->class_factor_id == $Classfactor->id ? 'selected' : ''}}>{{$Classfactor->radius}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group ">
                <label for="cemail" class="control-label col-lg-2">Premium Id<span class="required">*</span></label>
                <div class="col-lg-10">
                  <select name="premium" class="form-control">
                    <option>Select</option>
                    @foreach($allpremiums as $premiums)
                    <option value="{{$premiums->id}}" {{$editliability->premium_id == $premiums->id ? 'selected' : ''}}>{{$premiums->effect_date}}</option>
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
