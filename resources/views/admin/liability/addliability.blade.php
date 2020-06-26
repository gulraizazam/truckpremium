@extends('admin/layout/default')
@section('content')
    <section id="">
      
      <section class="panel">
        <header class="panel-heading">
          Add Liability
        </header>
        <div class="panel-body">
          <div class="form">
            <form class="form-validate form-horizontal" id="feedback_form" method="post" action="{{ route('submitLiability')}}">
              @csrf
              <div class="form-group ">
                <label for="cname" class="control-label col-lg-2">Territory <span class="required">*</span></label>
                <div class="col-lg-10">
                  <select name="teritoryId" class="form-control">
                    <option>Select</option>
                    @foreach($allteritory as $territories)
                    <option value="{{$territories->id}}">{{$territories->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group ">
                <label for="cemail" class="control-label col-lg-2">Is Danger<span class="required">*</span></label>
                <div class="col-lg-10">
                  <input type="checkbox" name="isDanger"  id="isdanger">
              </div>
            </div>
              <div class="form-group ">
                <label for="cemail" class="control-label col-lg-2"> Price<span class="required">*</span></label>
                <div class="col-lg-10">
                  <input class="form-control" id="City" name="price"  type="number" required />
                </div>
              </div>
              <div class="form-group ">
                <label for="cemail" class="control-label col-lg-2">Class Factor Id<span class="required">*</span></label>
                <div class="col-lg-10">
                  <select name="classfactor" class="form-control">
                    <option>Select</option>
                    @foreach($allClassfactor as $Classfactor)
                    <option value="{{$Classfactor->id}}">{{$Classfactor->radius}}</option>
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
                    <option value="{{$premiums->id}}">{{$premiums->effect_date}}</option>
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
