@extends('layouts.main')
@section('content')
  <div class="container">
    @if(session()->has('message'))
      <div class="alert alert-info">
        {{ session()->get('message')}}
      </div>
    @endif
      <form action="{{ route('truckReport')}}" method="post">
        @csrf
          <div class="form-group">
              <label for="inputName" class="col-md-4 col-form-label">Company or Full Name &nbsp;&nbsp; </label>
              <div class="col-md-8">
                  <input type="text" class="form-control" name="fullname" id="fullname" placeholder="">
              </div>
          </div>
          <div class="form-group">
              <label for="Address" class="col-md-4 col-form-label">Address &nbsp;&nbsp; </label>
              <div class="col-md-8">
                  <input type="text" class="form-control" name="adress" id="adress" placeholder="">
              </div>
          </div>
          <div class="form-group">
              <label for="Phone" class="col-md-4 col-form-label">Phone &nbsp;&nbsp; </label>
              <div class="col-md-8">
                  <input type="text" class="form-control" name="phone" id="phone" placeholder="">
              </div>
          </div>
          <div class="form-group">
              <label for="Email" class="col-md-4 col-form-label">Email &nbsp;&nbsp; </label>
              <div class="col-md-8">
                  <input type="text" class="form-control" name="email" id="email" placeholder="">
              </div>
          </div>
          <div class="form-group">
              <label for="advisor" class="col-md-4 col-form-label">Finance Advisor Name &nbsp;&nbsp; </label>
              <div class="col-md-8">
                  <input type="text" class="form-control" name="Finance_advisor_name" id="Finance_advisor_name" placeholder="Finance Advisor emial">
              </div>
          </div>
          <div class="form-group">
              <label for="advisor" class="col-md-4 col-form-label">Finance Advisor Emial &nbsp;&nbsp; </label>
              <div class="col-md-8">
                  <input type="text" class="form-control" name="Finance_advisor_emial" id="Finance_advisor_emial" placeholder="Finance Advisor emial">
              </div>
          </div>
          <div class="form-group">
            <label for="referedby" class="col-md-4 col-form-label">Referd By</label>
            <div class="col-md-8">
              <select class="form-control" name="referedby" id="referby">
                  @foreach($dealers as $dealer)
                    <option value="{{$dealer->id}}">{{$dealer->name}}</option>
                  @endforeach
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="drivernumbers" class="col-md-4 col-form-label">Number of drivers</label>
            <div class="col-md-8">
              <select class="form-control" name="drivernumbers" id="drivernumbers" required="">
                  <option>--Select--</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
              </select>
            </div>
          </div>
          <div id="driverdetailsid"></div>
          <div class="form-group">
            <label for="planned-goods-if-dangerous" class="col-md-4 col-form-label">Truck made year</label>
            <div class="col-md-8">
              <select class="form-control" name="truckmadeyear" id="truckmadeyear">
                  <option value="2020">2020</option>
                  <option value="2010">2010</option>
                  <option value="2005">2005</option>
              </select>
            </div>
          </div>
           <div class="form-group">
              <label for="truckbrandname" class="col-md-4 col-form-label">Truck Brand name &nbsp;&nbsp; </label>
              <div class="col-md-8">
                  <input type="text" class="form-control" name="truckbrandname" id="truckbrandname" placeholder="">
              </div>
          </div>
           <div class="form-group">
              <label for="truck-model" class="col-md-4 col-form-label">Truck Model &nbsp;&nbsp; </label>
              <div class="col-md-8">
                  <input type="text" class="form-control" name="truckmodel" id="truckmodel" placeholder="">
              </div>
          </div>
          <div class="form-group">
            <label for="planned-driving-distance" class="col-md-4 col-form-label">Cost of purchase</label>
            <div class="col-md-8">
              <select class="form-control" name="truckpurchacecost" id="truckpurchacecost">
                  @foreach($carRates as $carRate)
                    <option value="{{$carRate->id}}">${{$carRate->car_pricing_rating}}k</option>
                  @endforeach
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="date-of-truck-purchase" class="col-md-4 col-form-label">Date of truck purchase</label>
            <div class="col-md-8">
              <input type="date" name="datetruckpurchase" class="form-control">
            </div>
          </div>
          <div class="form-group">
            <label for="planned-driving-distance" class="col-md-4 col-form-label">Planned driving distance</label>
            <div class="col-md-8">
              <select class="form-control" name="planedriving" id="planedriving">
                  @foreach($classFactors as $classFactor)
                    <option value="{{$classFactor->id}}">{{$classFactor->radius}}km</option>
                  @endforeach
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="planned-goods-if-dangerous" class="col-md-4 col-form-label">Planned goods if dangerous</label>
            <div class="col-md-8">
              <select class="form-control" name="plangoods" id="plangoods">
                  <option value="Flamable">Flamable</option>
                  <option value="gasoline">gasoline</option>
                  <option value="toxic">toxic</option>
                  <option value="radioactive">radioactive</option>
              </select>
            </div>
          </div>
          <div class="form-group">
              <label for="location-of-truck-stop" class="col-md-4 col-form-label">Location where truck will stop most of the time &nbsp;&nbsp; </label>
              <div class="col-md-8">
                  <input type="text" class="form-control" name="locationtruckstop" id="locationtruckstop">
              </div>
          </div>
          <div class="form-group">
            <label for="truck-finance" class="col-md-4 col-form-label">Truck is financed or lease?</label>
            <div class="col-md-8">
              <select class="form-control" name="truckdetails" id="truckdetails">
                  <option value="financed">Financed</option>
                  <option value="lease">Lease</option>
              </select>
            </div>
          </div>
          <div class="form-group">
              <label for="conviction" class="col-md-4 col-form-label">Finance or lease, need company's name and address &nbsp;&nbsp; </label>
              <div class="col-md-8">
              </div>
              <label for="company-name" class="col-md-4 col-form-lable">Company Name</label>
              <div class="col-md-8">
                  <input type="text" class="form-control" name="compnayname" id="companyname" placeholder="Company Name">
              </div>
              <label for="company-adress" class="col-md-4 col-form-lable">Company Adress</label>
              <div class="col-md-8">
                  <input type="text" class="form-control" name="compnayadress" id="compnayadress" placeholder="Company Adress">
              </div>
              
             
          </div>
          <div class="form-group">
            <label for="standard-coverage" class="col-md-4 col-form-label">Standard coverage ? 1 million liability, 1000 deductible</label>
            <div class="col-md-8">
              <select class="form-control" name="standardcoverage" id="standardcoverage">
                  <option value="Package of standard 1m/1k/1k">Package of standard 1m/1k/1k</option>
                  <option value="premium 2m/500/500">premium 2m/500/500</option>
                  <option value="high deductible 1m/5k/5k">high deductible 1m/5k/5k</option>
              </select>
            </div>
          </div>
         <div class="form-group">
             <div class="col-md-8">
                  <div class="form-check">
                      
                      <label class="form-check-label">
                          <input type="checkbox" class="form-check-input" name="transportcargoinsurance" id="transportcargoinsurance">Do you need Transport Cargo Insurance ?
                      </label>
                  </div>
                  <div id="transportcargocheck"></div>
              </div>
         </div>
         <div class="form-group">
            <div class="col-md-8">
                <div class="form-check">
                  <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" name="gapinsurance" id="gapinsurance">Do you need gap insurance covering depreciation
                  </label>
                </div>
            </div>
         </div>
         <div class="form-group">
            <div class="col-md-8">
                <div class="form-check">
                  <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" name="healthinsurance" id="healthinsurance">Do you need health insurance for driver
                  </label>
                </div>
            </div>
         </div>
         <div class="form-group">
            <div class="col-md-8">
                <div class="form-check">
                  <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" name="hospitalizedcoverage" id="hospitalizedcoverage">Do you need Hospitalized cash coverage 
                  </label>
                </div>
            </div>
         </div>
         <div class="form-group">
            <div class="col-md-8">
                <div class="form-check">
                  <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" name="companyowned" id="companyowned">If company owned, do you need business liability?
                  </label>
                </div>
            </div>
         </div>
          <!--submit-->
          <div class="form-group">
              <div class="offset-sm-0 col-sm-8">
                  <button type="submit" class="btn btn-primary">Sumit</button>
                  
              </div>
          </div>
      </form>
  </div>
@endsection
@section('scripts')
  <script>
    $(document).ready(function(){
      var count = 1;
      var countCon = 1;
      $("#transportcargoinsurance").on("change",function(){
        if($(this).prop("checked") == true){
            $("#transportcargocheck").html('<label for="load-insurance" class="col-md-4 col-form-label">How much value each load	 &nbsp;&nbsp; </label>'+
            '<div class="col-md-8">'+
            '<input type="text" class="form-control" name="cargoinsuranceload" placeholder="How much value each load"></div>');
        }
        else if($(this).prop("checked") == false){
            $("#transportcargocheck").html('');
        }
      });
      $("#drivernumbers").on("change", function(){
        var numberDrivers = $(this).val();
        console.log(numberDrivers);
        $("#driverdetailsid").html('');
        $("#driverdetailsid").append('<input type="hidden" name="countdrivers" value="'+numberDrivers+'">');
        for(var i = 1; i<=numberDrivers; i++){
         
          $("#driverdetailsid").append('<h3> Driver '+i+'</h3>'+
            '<div class="form-group"><label for="drivername" class="col-md-4 col-form-label">Driver Name &nbsp;&nbsp; </label>'+
            '<div class="col-md-8">'+
            '<input type="text" class="form-control" name="drivername'+i+'" placeholder="Driver Name"></div></div>'+
            '<div class="form-group"><label for="licensenumber" class="col-md-4 col-form-label">License Number &nbsp;&nbsp; </label>'+
            '<div class="col-md-8"> <input type="text" class="form-control" name="licensenumber'+i+'" placeholder="License Number"></div></div>'+
            '<div class="form-group"><label for="driverlicenseclass" class="col-md-4 col-form-label">Driver License Class &nbsp;&nbsp; </label>'+
            '<div class="col-md-8"><input type="text" class="form-control" name="driverlicenseclass'+i+'" placeholder="Driver License Class"></div></div>'+
            ' <div class="form-group"><label for="dateofbirth" class="col-md-4 col-form-label">Date of Birth &nbsp;&nbsp; </label>'+
            '<div class="col-md-8"><input type="date" class="form-control" name="dateofbirth'+i+'"></div></div>'+
            '<div class="form-group"><label for="accident" class="col-md-4 col-form-label">At fault Accident last 10 years &nbsp;&nbsp; </label>'+
            '<div class="col-md-8"><select class="form-control accidentfaults" id="accidentfaults'+i+'" onchange="appendDate()">'+
            '<option value="no">No</option>'+
            '<option value="yes">Yes</option></select>'+
            '</div></div>'+
            '<div class="form-group"><label for="conviction" class="col-md-4 col-form-label">Conviction last 5 years &nbsp;&nbsp; </label>'+
            '<div class="col-md-8"><select class="form-control convictionfaults" id="convictions'+i+'">'+
            '<option value="no">No</option>'+
            '<option value="yes">Yes</option></select>'+
            '</div></div>');
        }
      });
      $("body").on("change",".accidentfaults",function(){
          var accidentCheck = $(this).val();
          if(accidentCheck=='yes'){
             var accidentfaultParent =  $(this).parent();
              accidentfaultParent.after('<div class="accidentfaulsdiv"><div class="form-group"><label for="accidentfaultdate" class="col-md-4 col-form-label">Date of accident &nbsp;&nbsp; </label><div class="col-md-8"><input type="date" name="accidentfaultsdate[]" class="form-control"><a href="#" class="btn btn-primary addaccident">+</a><div></div></div>');
          }else{
              $(".accidentfaulsdiv").remove();
              count = 1;
          }
      });
      $("body").on("change",".convictionfaults",function(){
        count = 1;
          var accidentCheck = $(this).val();
          if(accidentCheck=='yes'){
             var accidentfaultParent =  $(this).parent();
              accidentfaultParent.after('<div class="accidentfaulsdiv"><div class="form-group"><label for="accidentfaultdate" class="col-md-4 col-form-label">Date of convictions &nbsp;&nbsp; </label><div class="col-md-8"><input type="date" name="convictions[]" class="form-control"><a href="#" class="btn btn-primary addconviction">+</a><div></div></div>');
          }else{
              $(".accidentfaulsdiv").remove();
              count = 1;
          }
      });
      $("body").on("click",".addaccident",function(e){
          e.preventDefault();
          if(count<5){
            $(this).before('<input type="date" name="accidentfaultsdate[]" class="form-control">');
            
          }
         count = count+1;
         console.log("ok"+count);
         
      });
       $("body").on("click",".addconviction",function(e){
          e.preventDefault();
          if(countCon<5){
            $(this).before('<input type="date" name="convictions[]" class="form-control">');
            
          }
         countCon = countCon+1;
         
         
      });
    });
  </script>
@endsection