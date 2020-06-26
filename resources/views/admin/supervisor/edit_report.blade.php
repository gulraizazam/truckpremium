 <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Truck Premium</title>

  <!-- Bootstrap CSS -->
  <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="{{asset('css/bootstrap-theme.css')}}" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="{{asset('css/elegant-icons-style.css')}}" rel="stylesheet" />
  <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet" />
 
  <!-- Custom styles -->
   
  
  <link href="{{asset('css/style.css')}}" rel="stylesheet">
  <link href="{{asset('css/style-responsive.css')}}" rel="stylesheet" />
  <link href="{{asset('css/jquery-ui-1.10.4.min.css')}}" rel="stylesheet">
   
</head>

<body>
   <!-- container section start -->
  <section id="container" class="">
    <header class="header dark-bg">
      <div class="toggle-nav">
        <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
      </div>

      <!--logo start-->
      <a href="#" class="logo">Truck <span class="lite">Premium</span></a>
      <!--logo end-->

      <div class="nav search-row" id="top_menu">
        <!--  search form start -->
        <!-- <ul class="nav top-menu">
          <li>
            <form class="navbar-form">
              <input class="form-control" placeholder="Search" type="text">
            </form>
          </li>
        </ul> -->
        <!--  search form end -->
      </div>

      <div class="top-nav notification-row">
        <!-- notificatoin dropdown start-->
        <ul class="nav pull-right top-menu">

          
        </ul>
        <!-- notificatoin dropdown end-->
      </div>
    </header>
  </section>
  <section id="main-content">
      <section class="wrapper">
      <div class="container">
        @if(session()->has('message'))
          <div class="alert alert-info">
            {{ session()->get('message')}}
          </div>
        @endif
          <form action="{{route('actEditReport')}}" method="post">
            @csrf
            <input type="hidden" name="reportid" value="{{$allDataReport->id}}">
            <input type="hidden" name="userid" value="{{$allDataReport->user_id}}">
              <div class="form-group">
                  <label for="inputName" class="col-md-4 col-form-label">Company or Full Name &nbsp;&nbsp; </label>
                  <div class="col-md-8">
                      <input type="text" class="form-control" name="fullname" id="fullname" value="{{$allDataReport->name}}" placeholder="">
                  </div>
              </div>
              <div class="form-group">
                  <label for="Address" class="col-md-4 col-form-label">Address &nbsp;&nbsp; </label>
                  <div class="col-md-8">
                      <input type="text" class="form-control" name="adress" id="adress" value="{{$allDataReport->address}}" placeholder="">
                  </div>
              </div>
              <div class="form-group">
                  <label for="Phone" class="col-md-4 col-form-label">Phone &nbsp;&nbsp; </label>
                  <div class="col-md-8">
                      <input type="text" class="form-control" name="phone" id="phone" value="{{$allDataReport->phone}}" placeholder="">
                  </div>
              </div>
              <div class="form-group">
                  <label for="Email" class="col-md-4 col-form-label">Email &nbsp;&nbsp; </label>
                  <div class="col-md-8">
                      <input type="text" class="form-control" name="email" id="email" value="{{$allDataReport->email}}" placeholder="">
                  </div>
              </div>
              <div class="form-group">
                <label for="referedby" class="col-md-4 col-form-label">Referd By</label>
                <div class="col-md-8">
                  <select class="form-control" name="referedby" id="referby">
                      <@php
                        $dealers = \DB::table('dealears')->get();
                      @endphp
                      @foreach($dealers as $dealer)
                        <option value="{{$dealer->id}}" {{$dealer->id==$allDataReport->dealer_id ? 'selected' : ''}}>{{$dealer->name}}</option>
                      @endforeach
                  </select>
                </div>
                <div id="driverdetailsid">
                  @php
                    $driverCount = 1;
                    $drivers = \DB::table('drivers')->where('report_id',$allDataReport->id)->get();
                  @endphp
                  @foreach($drivers as $driver)
                  <input type="hidden" name="countdrivers" value="{{$driverCount}}">
                    <input type="hidden" name="driversId{{$driverCount}}" value="{{$driver->id}}">
                    <div class="form-group">
                      <label for="drivername" class="col-md-4 col-form-label">Driver Name &nbsp;&nbsp; </label>
                      <div class="col-md-8">
                        <input type="text" class="form-control" name="drivername{{$driverCount}}" value="{{$driver->Name}}" placeholder="Driver Name">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="licensenumber" class="col-md-4 col-form-label">License Number &nbsp;&nbsp; </label>
                      <div class="col-md-8"> 
                        <input type="text" class="form-control" name="licensenumber{{$driverCount}}" value="{{$driver->license_number}}" placeholder="License Number">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="driverlicenseclass" class="col-md-4 col-form-label">Driver License Class &nbsp;&nbsp; </label>
                      <div class="col-md-8">
                        <input type="text" class="form-control" name="driverlicenseclass{{$driverCount}}" value="{{$driver->driver_license_class}}" placeholder="Driver License Class">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="dateofbirth" class="col-md-4 col-form-label">Date of Birth &nbsp;&nbsp; </label>
                      <div class="col-md-8">
                        <input type="date" class="form-control" name="dateofbirth{{$driverCount}}" value="{{$driver->date_of_birth}}">
                      </div>
                    </div>
                    @php 
                      $accidents=\DB::table('accidents')->where('driver_id',$driver->id)->get(); $accidentStr = ''; $conviction_str = '';
                      $accidentCount = 1; $convictionCount = 1;
                      foreach($accidents as $accident){
                        if($accident->type=='accident'){
                          $accidentStr .= '<div class="col-md-8"><input type="date" name="accidentfaultsdate'.$driverCount.'[]" value="'.$accident->date.'" class="form-control">
                          <input type="hidden" name="accidentfaultsdateids'.$driverCount.'[]" value="'.$accident->id.'"></div>';
                            $accidentCount++;
                        }else{
                            $conviction_str .= '<div class="col-md-8"><input type="date" name="convictions'.$driverCount.'[]" value="'.$accident->date.'" class="form-control">
                            <input type="hidden" name="conviction_strId'.$driverCount.'[]" value="'.$accident->id.'"></div>';
                            $convictionCount++;
                        }
                      }
                      if(!empty($accidentStr)){
                        echo '<div class="col-md-8"><div class="form-group">
                          <label for="accident" class="col-md-4 col-form-label">Accident last 10 years &nbsp;&nbsp; </label>
                                <select class="form-control accidentfaults" id="accidentfaults1" onchange="appendDate()" data-faults="1">
                                  <option value="no">No</option>
                                  <option value="yes" selected="">Yes</option>
                                </select>
                              ';
                        echo '<label for="accidentfaultdate" class="col-md-4 col-form-label">Date of accident &nbsp;&nbsp; </label>
                                '.$accidentStr.'
                              </div></div>';
                      }
                      if(!empty($conviction_str)){
                      echo '<div class="form-group">
                            <div class="col-md-8">
                              <label for="conviction" class="col-md-4 col-form-label">Conviction last 5 years &nbsp;&nbsp; </label>
                              <select class="form-control conviction" id="conviction" onchange="appendDate()" data-faults="1">
                                <option value="no">No</option>
                                <option value="yes" selected="">Yes</option>
                              </select>
                            ';
                      echo '<label for="conviction" class="col-md-4 col-form-label">Date Convition &nbsp;&nbsp; </label>'.$conviction_str.'
                            </div></div>';
                      }
                    @endphp
                    @php $driverCount++; @endphp
                  @endforeach

                </div>
              </div>
              @php $truck = \DB::table('trucks')->where('id',$allDataReport->truck_id)->first(); 
              @endphp
              <div class="form-group">
                <input type="hidden" name="truckid" value="{{$truck->id}}">
                <label for="planned-goods-if-dangerous" class="col-md-4 col-form-label">Truck made year</label>
               <div class="col-md-8">
                 <input type="Number"class="form-control" name="truckmadeyear" id="truckmadeyear" value="{{$truck->truck_made_year}}">
               </div>
              </div>
              <div class="form-group">
                <label for="planned-goods-if-dangerous" class="col-md-4 col-form-label">Effective Date</label>
                <div class="col-md-8">
                  <input class="form-control" type="date" name="effictive-date" id="effictive-date" value="{{$truck->truck_effective_date}}" />
                </div>
              </div>
              <div class="form-group">
                  <label for="truckbrandname" class="col-md-4 col-form-label">Truck Brand name &nbsp;&nbsp; </label>
                  <div class="col-md-8">
                      <input type="text" class="form-control" name="truckbrandname" id="truckbrandname" value="{{$truck->truck_brand_name}}" placeholder="">
                  </div>
              </div>
               <div class="form-group">
                  <label for="truck-model" class="col-md-4 col-form-label">Truck Model &nbsp;&nbsp; </label>
                  <div class="col-md-8">
                      <input type="text" class="form-control" name="truckmodel" id="truckmodel" value="{{$truck->truck_model}}" placeholder="">
                  </div>
              </div>
              <div class="form-group">
                <label for="planned-driving-distance" class="col-md-4 col-form-label">Cost of purchase</label>
                <div class="col-md-8">
                  @php $carRates = \DB::table('car_rate_groups')->get(); @endphp
                  <select class="form-control" name="truckpurchacecost" id="truckpurchacecost">
                      @foreach($carRates as $carRate)
                        <option value="{{$carRate->id}}" {{$carRate->id==$truck->cost_purchase ? 'selected' : ''}}>${{$carRate->car_pricing_rating}}k</option>
                      @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="date-of-truck-purchase" class="col-md-4 col-form-label">Date of truck purchase</label>
                <div class="col-md-8">
                  <input type="date" name="datetruckpurchase" class="form-control" value="{{$truck->date_of_purchase}}">
                </div>
              </div>
              <div class="form-group">
                <label for="planned-driving-distance" class="col-md-4 col-form-label">Planned driving distance in (KM)</label>
                <div class="col-md-8">
                 <input type="Number" name="planedriving" id="planedriving" class="form-control" value="{{$allDataReport->planned_driving_distance}}">
                </div>
              </div>
              <div class="form-group">
                <label for="planned-goods-if-dangerous" class="col-md-4 col-form-label">Planned goods if dangerous</label>
                <div class="col-md-8">
                  <input type="text"name="plangoods" id="plangoods" value="{{$allDataReport->planned_goods}}" class="form-control">
                </div>
              </div>
              <div class="form-group">
                  <label for="location-of-truck-stop" class="col-md-4 col-form-label">Location where truck will stop most of the time &nbsp;&nbsp; </label>
                  <div class="col-md-8">
                      <input type="text" class="form-control" name="locationtruckstop" id="locationtruckstop" value="{{$allDataReport->location_truck_stop}}">
                  </div>
              </div>
              <div class="form-group">
                <label for="truck-finance" class="col-md-4 col-form-label">Truck is financed or lease?</label>
                <div class="col-md-8">
                  <select class="form-control" name="truckdetails" id="truckdetails">
                      <option value="financed" {{$allDataReport->purchase_type =='financed' ? 'selected' : ''}}>Financed</option>
                      <option value="lease" {{$allDataReport->purchase_type =='lease' ? 'selected' : ''}}>Lease</option>
                  </select>
                </div>
              </div>
              <label for="conviction" class="col-md-12 col-form-label">Finance or lease, need company's name and address &nbsp;&nbsp; </label>
              <div class="form-group">
                  <label for="company-name" class="col-md-4 col-form-lable">Company Name</label>
                  <div class="col-md-8">
                      <input type="text" class="form-control" name="compnayname" id="companyname" placeholder="Company Name" value="{{$allDataReport->purchase_compnay_name}}">
                  </div>
                  <label for="company-adress" class="col-md-4 col-form-lable">Company Adress</label>
                  <div class="col-md-8">
                      <input type="text" class="form-control" name="compnayadress" id="compnayadress" placeholder="Company Adress" value="{{$allDataReport->purchase_company_address}}">
                  </div>
              </div>
              <div class="form-group">
                <label for="standard-coverage" class="col-md-4 col-form-label">Standard coverage ? 1 million liability, 1000 deductible</label>
                <div class="col-md-8">
                  <select class="form-control" name="standardcoverage" id="standardcoverage">
                     <option value="Package of standard 1m/1k/1k" {{$allDataReport->standard_coverage=='Package of standard 1m/1k/1k' ? 'selected' : ''}}>Package of standard 1m/1k/1k</option>
                     <option value="premium 2m/500/500" {{$allDataReport->standard_coverage=='premium 2m/500/500' ? 'selected' : ''}}>premium 2m/500/500</option>
                     <option value="high deductible 1m/5k/5k" {{$allDataReport->standard_coverage=='high deductible 1m/5k/5k' ? 'selected' : ''}}>high deductible 1m/5k/5k</option>
                 </select>
                </div>
              </div>
              <div class="form-group">
                  <div class="col-md-8">
                       <div class="form-check">
                           
                           <label class="form-check-label">
                               <input type="checkbox" class="form-check-input"  name="transportcargoinsurance" id="transportcargoinsurance" {{isset($allDataReport->cargo_value) && !empty($allDataReport->cargo_value) ? 'checked' : ''}}>Do you need Transport Cargo Insurance ?
                           </label>
                       </div>
                       <div id="transportcargocheck">
                         <label for="load-insurance" class="col-md-12 col-form-label">     How much value each load   &nbsp;&nbsp; 
                         </label>
                         <div class="col-md-8">
                            <input type="text" class="form-control" name="cargoinsuranceload" placeholder="How much value each load" value="{{$allDataReport->cargo_value}}">
                        </div>
                       </div>
                   </div>
              </div>
              <div class="form-group">
                 <div class="col-md-8">
                     <div class="form-check">
                       <label class="form-check-label">
                           <input type="checkbox" class="form-check-input" name="gapinsurance" id="gapinsurance" {{$allDataReport->gap_insurance==true ? 'checked' : ''}}>Do you need gap insurance covering depreciation
                       </label>
                     </div>
                 </div>
              </div>
              <div class="form-group">
                 <div class="col-md-8">
                     <div class="form-check">
                       <label class="form-check-label">
                           <input type="checkbox" class="form-check-input" name="healthinsurance" id="healthinsurance" {{$allDataReport->health_insurance==true ? 'checked' : ''}}>Do you need health insurance for driver
                       </label>
                     </div>
                 </div>
              </div>
              <div class="form-group">
                 <div class="col-md-8">
                     <div class="form-check">
                       <label class="form-check-label">
                           <input type="checkbox" class="form-check-input" name="hospitalizedcoverage" id="hospitalizedcoverage" {{$allDataReport->hospitalize_cash_covrage==true ? 'checked' : ''}}>Do you need Hospitalized cash coverage 
                       </label>
                     </div>
                 </div>
              </div>
              <div class="form-group">
                 <div class="col-md-8">
                     <div class="form-check">
                       <label class="form-check-label">
                           <input type="checkbox" class="form-check-input" name="companyowned" id="companyowned" {{$allDataReport->bussiness_liabilty==true ? 'checked' : ''}}>If company owned, do you need business liability?
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
    </section>
  </section>

  <!-- javascripts -->
  <script src="{{asset('js/jquery.js')}}"></script>
  <script src="{{asset('js/jquery-ui-1.10.4.min.js')}}"></script>
  <script src="{{asset('js/jquery-1.8.3.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/jquery-ui-1.9.2.custom.min.js')}}"></script>
  <!-- bootstrap -->
  <script src="{{asset('js/bootstrap.min.js')}}"></script>
  <!-- nice scroll -->
  <script src="{{asset('js/jquery.scrollTo.min.js')}}"></script>
  <script src="{{asset('js/jquery.nicescroll.js')}}" type="text/javascript"></script>
   
   
    <!-- custom select -->
    <script src="{{asset('js/jquery.customSelect.min.js')}}"></script>
     

    <!--custome script for all page-->
    <script src="{{asset('js/scripts.js')}}"></script>
    <script src="{{asset('js/jquery.slimscroll.min.js')}}"></script>
</body>
</html>