@extends('admin/layout/default')
@section('content')
    <section id="">
       
            <section class="panel">
              
              <header class="panel-heading">
                 
                Add Premium
              </header>
              <div class="panel-body">
                <div class="form">
                  <form class="form-validate form-horizontal" id="feedback_form" method="post" action="{{ route('submitPremium')}}">
                    @csrf
                    <div class="form-group ">
                      <label for="cname" class="control-label col-lg-2">Effect Date <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control" id="cname" name="Effectdate" minlength="5" type="date" required />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="cemail" class="control-label col-lg-2">Notes<span class="required">*</span></label>
                      <div class="col-lg-10">
                        <textarea class="form-control" name="notes"></textarea>
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
