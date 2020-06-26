<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google_Client;
use Google_Service_Drive;
use Google_Service_Sheets;
use Google_Service_Sheets_ValueRange;
use App\Driver;
use App\Report;
use App\Accident;
use App\Truck;
use PDF;
use Mail;
use DB;
use DateTime;
use Auth;

use App\User;
use Illuminate\Support\Facades\Validator;

class TruckReportController extends Controller
{
	public function login(){
		return view('admin.supervisor.login');
	}
	public function actLogin(Request $request){
		$checkUser = Auth::attempt(['email'=>$request->email, 'password' => $request->password]);
		
		if($checkUser !=null){
			$request->session()->put('user', Auth::user()->email);
			$request->session()->put('name', Auth::user()->name);
			if(Auth::user()->isRole('supervisor')){
				return redirect('/');
			}else{
				return view('admin.index');
			}
			
		}else{
			return redirect()->back()->with('errMsg','user email or password is incorrect');
		}
	}
	public function RecievedReport(Request $request){

		if(!session()->has('user')){
			return redirect('login');
		}
		Validator::make($request->all(), [
		    'fullname' => 'required',
		    'adress' => 'required',
		    'phone' => 'required',
		    'email' => 'required',
		    'referedby' => 'required',
		    'drivernumbers'=> 'required',
		    'truckmadeyear'=> 'required',
		    'effictive-date'=> 'required',
		    'truckbrandname'=> 'required',
		    'truckmodel'=> 'required',
		    'truckpurchacecost'=> 'required',
		    'datetruckpurchase'=> 'required',
		    'planedriving'=> 'required',
		    'locationtruckstop'=> 'required',
		    'truckdetails'=> 'required',
		    'compnayname'=> 'required',
		    'compnayadress'=> 'required',
		    'standardcoverage'=> 'required',
		    
		])->validate();
		//dd($request->all());
		$advoisor = DB::table('users')->where('email',session()->get('user'))->first();
		$month=date("m",strtotime($request['effictive-date']));
		$year=date("Y",strtotime($request['effictive-date']));

		$liability = DB::table('liabilitiys')
					 ->join('premiums','liabilitiys.premium_id','=','premiums.id')
					 ->join('class_factors','liabilitiys.class_factor_id','=','class_factors.id')
					 ->whereRaw('class_factors.min_radius < '.$request->planedriving.' AND '.$request->planedriving.' < class_factors.max_radius AND YEAR(premiums.effect_date) ="'.$year.'" AND MONTH(premiums.effect_date) ="'.$month.'"')
					 ->select('liabilitiys.liability_price')
					 ->first();
					 
		if($liability != null){
			$liability = $liability->liability_price;
		}else{
			return redirect()->back()->with('message','Please Provide Correct Effect Date!')->withInput(Input::except('email'));;
		}

		 

		$collision = DB::table('collisions')->selectRaw('collisions.collision_price')
					->join('premiums','collisions.premium_id','=','premiums.id')
					->join('groups_factors','collisions.group_factor_id','=','groups_factors.id')
					->join('car_rate_groups', 'groups_factors.car_rate_group_id','=','car_rate_groups.id')
					->whereRaw('YEAR(premiums.effect_date) ="'.$year.'" AND MONTH(premiums.effect_date) ="'.$month.'"')
					->where('car_rate_groups.id',$request['truckpurchacecost'])
					->first();
		if($collision != null){
			$collision = $collision->collision_price;
		}else{
			return redirect()->back()->with('message','Please Provide Correct Effect Date!');
		}
		$comprehensive = DB::table('comprehensives')->selectRaw('comprehensives.comprehensive_price')
					->join('premiums','comprehensives.premium_id','=','premiums.id')
					->join('groups_factors','comprehensives.group_factor_id','=','groups_factors.id')
					->join('car_rate_groups', 'groups_factors.car_rate_group_id','=','car_rate_groups.id')
					->whereRaw('YEAR(premiums.effect_date) ="'.$year.'" AND MONTH(premiums.effect_date) ="'.$month.'"')
					->where('car_rate_groups.id',$request['truckpurchacecost'])
					->first();
		if($comprehensive != null){
			$comprehensive = $comprehensive->comprehensive_price;
		}else{
			return redirect()->back()->with('message','Please Provide Correct Effect Date!');
		}
	    

	    $accessToken = sha1(time());
	    $token_expried_date = date("Y-m-d H:m:s", time() + 86400);

	    /*Save Truck Info*/
	    $truck = new Truck();
    	$truck->truck_made_year = $request['truckmadeyear'];
		$truck->truck_brand_name = $request['truckbrandname'];
		$truck->truck_model = $request['truckmodel'];
		$truck->cost_purchase = $request['truckpurchacecost'];
		$truck->date_of_purchase = $request['datetruckpurchase'];
		$truck->truck_effective_date = $request['effictive-date'];
		$truck->save();
		$truckId = $truck->id;

		/*Save Report*/
		$report = new Report();
		$report->name = $request['fullname'];
		$report->address = $request['adress'];
		$report->phone = $request['phone'];
		$report->email = $request['email'];
		$report->dealer_id = $request['referedby'];
		$report->finance_advisor = $advoisor->name;
		$report->finance_advisor_emial = $advoisor->email;
		$report->planned_driving_distance = $request['planedriving'];
		$report->planned_goods = $request['plangoods'];
		$report->location_truck_stop = $request['locationtruckstop'];
		$report->purchase_type = $request['truckdetails'];
		$report->purchase_compnay_name = $request['compnayname'];
		$report->purchase_company_address = $request['compnayadress'];
		$report->standard_coverage = $request['standardcoverage'];
		$report->user_id = $advoisor->id;
		$report->cargo_value = isset($request['cargoinsuranceload']) ? $request['cargoinsuranceload'] : 0;
		$report->gap_insurance = isset($request['gapinsurance']) ? 1 : 0;
		$report->health_insurance = isset($request['healthinsurance']) ? 1 : 0;
		$report->hospitalize_cash_covrage = isset($request['hospitalizedcoverage']) ? 1 : 0;
		$report->bussiness_liabilty = isset($request['companyowned']) ? 1 : 0;
		$report->truck_id = $truckId;
		$report->access_token = $accessToken;
		$report->token_expried_date = $token_expried_date;
		$report->save();
		$reportId = $report->id;

		/*Save Drivers*/

		for ($i=1; $i<=$request->countdrivers; $i++) { 
			$driver = new Driver();
			$driver->name = $request['drivername'.$i];
			$driver->license_number = $request['licensenumber'.$i];
			$driver->driver_license_class = $request['driverlicenseclass'.$i];
			$driver->date_of_birth = $request['dateofbirth'.$i];
			$driver->truck_id = $truckId;
			$driver->report_id = $reportId;
			$driver->save();
			$driverId = $driver->id;
			

			
			if(isset($request['accidentfaultsdate'.$i])){
				foreach ($request['accidentfaultsdate'.$i] as $key => $value) {
					DB::table('accidents')->insert(['type'=>'accident', 'date'=>$value,'driver_id'=>$driverId]);
				}

			}
			if(isset($request['convictions'.$i])){
				foreach ($request['convictions'.$i] as $key => $value) {
					DB::table('accidents')->insert(['type'=>'conviction', 'date'=>$value,'driver_id'=>$driverId]);
				}
			}

			\DB::table('driver_report')->insert(['driver_id'=>$driverId,'report_id'=>$reportId]);
		}

		$data= [];
		foreach ($request->all() as $key => $value) {
			if(is_array($value)){

			}else{
				$data[$key] = $value;
			}
			
		}
		$accidentBenefit = 47;
		$totalPrice = $collision + $comprehensive + $accidentBenefit + $liability;
		$data['collision'] = $collision;
		$data['liability'] = $liability;
		$data['comprehensive'] = $comprehensive;
		$data['accidentBenefit'] = $accidentBenefit;
		$data['totalPrice'] = $totalPrice;
		DB::table('deductibles')->insert(['report_id'=>$reportId,'amount'=>$totalPrice,'coll'=>$collision,'comp'=>$comprehensive,'lia'=>$liability]);

		for ($i=1; $i<=2 ; $i++) {
			if($i==1){
				$data['edit_link'] = "http://localhost/TruckPremium/edit_report?access_token=".$accessToken."&edit=client";
				$data['verify_link'] = "http://localhost/TruckPremium/verify_report?access_token=".$accessToken."&verify=client";
				/*Prepare Pdf*/
				
				$pdf = PDF::loadView('reportpdf',$data);

				$email = $request['email'];
			}else{

				$data['edit_link'] = "http://".$_SERVER['SERVER_NAME']."/edit_report?access_token=".$accessToken."&edit=advisor";
				$data['verify_link'] = "http://".$_SERVER['SERVER_NAME']."/verify_report?access_token=".$accessToken."&verify=advisor";
				/*Prepare Pdf*/
				
				$pdf = PDF::loadView('reportpdf',$data);

				$email = $advoisor->email;

			}
			try{
	            Mail::send('reportpdf', $data, function($message)use($data,$pdf,$email) {
	            $message->to($email, "Test")
	            ->subject("test4buss")
	            ->attachData($pdf->output(), "invoice.pdf");
	            });
	        }catch(JWTException $exception){
	            $serverstatuscode = "0";
	            $serverstatusdes = $exception->getMessage();
	        }
	        if (Mail::failures()) {
	             $statusdesc  =   "Error sending mail";
	             $statuscode  =   "0";

	        }else{

	           $statusdesc  =   "Message sent Succesfully";
	           $statuscode  =   "1";
	        }
		}
	    return redirect()->back()->with('message','Record save successfully');
	}

	public function addreport(){
		 
		
		
		$dealers = DB::table('dealears')->select('id','name')->get();
		$classFactors = DB::table('class_factors')->get();
		$carRates = DB::table('car_rate_groups')->get();
		$territoryes = DB::table('territorys')->get();
		$groupFactors = DB::table('groups_factors')->distinct('year_start')->get();
		
		$data = [

			'dealers' => $dealers,
			'classFactors'=>$classFactors,
			'carRates' => $carRates,
			'territoryes'=>$territoryes,
		];

		return view('admin.supervisor.user_main',$data);
	}

	public function editReport(request $request){
		if(isset($request->edit) && isset($request->access_token)){
			$report = DB::table('reports')->where('access_token',$request->access_token)->first();
			if($report !=null){
				if($request->edit == "advisor" && $report->advisor_verify==true){
					return redirect('/rediectReport')->with('message','You can,t edit it know you verified already');
				}elseif($request->edit == "client" && $report->client_verify==true){
						return redirect('/rediectReport')->with('message','You can,t edit it know you verified already');
				}
				$allDataReport = DB::table('reports')
								->where('reports.access_token',$request->access_token)
								->first();
				return view('admin.supervisor.edit_report',compact('allDataReport'));
			}else{
				return redirect('/rediectReport')->with("message",'Report Not Found');
			}
		}
	}
	public function actEditReport(Request $request){
		//dd($request->all());
		$report = Report::find($request['reportid']);
		$advoisor = DB::table('users')->where('id',$request['userid'])->first();
		$month=date("m",strtotime($request['effictive-date']));
		$year=date("Y",strtotime($request['effictive-date']));
		if($advoisor !=null){
			$liability = DB::table('liabilitiys')
						 ->join('premiums','liabilitiys.premium_id','=','premiums.id')
						 ->join('class_factors','liabilitiys.class_factor_id','=','class_factors.id')
						 ->whereRaw('class_factors.min_radius < '.$request->planedriving.' AND '.$request->planedriving.' < class_factors.max_radius AND YEAR(premiums.effect_date) ="'.$year.'" AND MONTH(premiums.effect_date) ="'.$month.'"')
						 ->select('liabilitiys.liability_price')
						 ->first()->liability_price;

			$collision = DB::table('collisions')->selectRaw('collisions.collision_price')
						->join('premiums','collisions.premium_id','=','premiums.id')
						->join('groups_factors','collisions.group_factor_id','=','groups_factors.id')
						->join('car_rate_groups', 'groups_factors.car_rate_group_id','=','car_rate_groups.id')
						->whereRaw('YEAR(premiums.effect_date) ="'.$year.'" AND MONTH(premiums.effect_date) ="'.$month.'"')
						->where('car_rate_groups.id',$request['truckpurchacecost'])
						->first()->collision_price;
			$comprehensive = DB::table('comprehensives')->selectRaw('comprehensives.comprehensive_price')
						->join('premiums','comprehensives.premium_id','=','premiums.id')
						->join('groups_factors','comprehensives.group_factor_id','=','groups_factors.id')
						->join('car_rate_groups', 'groups_factors.car_rate_group_id','=','car_rate_groups.id')
						->whereRaw('YEAR(premiums.effect_date) ="'.$year.'" AND MONTH(premiums.effect_date) ="'.$month.'"')
						->where('car_rate_groups.id',$request['truckpurchacecost'])
						->first()->comprehensive_price;
			$accessToken = sha1(time());
	    	$token_expried_date = date("Y-m-d H:m:s", time() + 86400);

		    /*Save Truck Info*/
		    $truck = Truck::find($request['truckid']);
	    	$truck->truck_made_year = $request['truckmadeyear'];
			$truck->truck_brand_name = $request['truckbrandname'];
			$truck->truck_model = $request['truckmodel'];
			$truck->cost_purchase = $request['truckpurchacecost'];
			$truck->date_of_purchase = $request['datetruckpurchase'];
			$truck->save();
			$truckId = $request['truckid'];
			/*Save Report*/
			$report = Report::find($request['reportid']);
			$report->name = $request['fullname'];
			$report->address = $request['adress'];
			$report->phone = $request['phone'];
			$report->email = $request['email'];
			$report->dealer_id = $request['referedby'];
			$report->finance_advisor = $advoisor->name;
			$report->finance_advisor_emial = $advoisor->email;
			$report->planned_driving_distance = $request['planedriving'];
			$report->planned_goods = $request['plangoods'];
			$report->location_truck_stop = $request['locationtruckstop'];
			$report->purchase_type = $request['truckdetails'];
			$report->purchase_compnay_name = $request['compnayname'];
			$report->purchase_company_address = $request['compnayadress'];
			$report->client_verify = 0;
			$report->advisor_verify = 0;
			$report->standard_coverage = $request['standardcoverage'];
			$report->cargo_value = isset($request['cargoinsuranceload']) ? $request['cargoinsuranceload'] : 0;
			$report->gap_insurance = isset($request['gapinsurance']) ? 1 : 0;
			$report->health_insurance = isset($request['healthinsurance']) ? 1 : 0;
			$report->hospitalize_cash_covrage = isset($request['hospitalizedcoverage']) ? 1 : 0;
			$report->bussiness_liabilty = isset($request['companyowned']) ? 1 : 0;
			$report->truck_id = $truckId;
			$report->access_token = $accessToken;
			$report->token_expried_date = $token_expried_date;
			$report->save();
			$reportId =$request['truckid'];

			/*Save Drivers*/

			for ($i=1; $i<=$request->countdrivers; $i++) { 
				$driver = Driver::find($request['driversId'.$i]);
				$driver->name = $request['drivername'.$i];
				$driver->license_number = $request['licensenumber'.$i];
				$driver->driver_license_class = $request['driverlicenseclass'.$i];
				$driver->date_of_birth = $request['dateofbirth'.$i];
				$driver->save();
				$driverId = $driver->id;
				

				
				if(isset($request['accidentfaultsdate'.$i])){
					$accident_update_id = 0;
					foreach ($request['accidentfaultsdate'.$i] as $key => $value) {
						DB::table('accidents')->where('id',$request['accidentfaultsdateids'.$i][$accident_update_id])->update(['type'=>'accident', 'date'=>$value]);
						$accident_update_id++;
					}

				}
				if(isset($request['convictions'.$i])){
					$conviction_update_id = 0;
					foreach ($request['convictions'.$i] as $key => $value) {
						DB::table('accidents')->where('id',$request['conviction_strId'.$i][$key])->update(['type'=>'conviction', 'date'=>$value]);
						$conviction_update_id++;
					}
				}
			}
				$data= [];
				foreach ($request->all() as $key => $value) {
					if(is_array($value)){

					}else{
						$data[$key] = $value;
					}
					
				}
				$accidentBenefit = 47;
				$totalPrice = $collision + $comprehensive + $accidentBenefit + $liability;
				$data['collision'] = $collision;
				$data['liability'] = $liability;
				$data['comprehensive'] = $comprehensive;
				$data['accidentBenefit'] = $accidentBenefit;
				$data['totalPrice'] = $totalPrice;
				DB::table('deductibles')->where('report_id',$request['reportid'])->update(['amount'=>$totalPrice,'coll'=>$collision,'comp'=>$comprehensive,'lia'=>$liability]);

				for ($i=1; $i<=2 ; $i++) {
					if($i==1){
						$data['edit_link'] = "http://".$_SERVER['SERVER_NAME']."/edit_report?access_token=".$accessToken."&edit=client";
						$data['verify_link'] = "http://".$_SERVER['SERVER_NAME']."/verify_report?access_token=".$accessToken."&verify=client";
						/*Prepare Pdf*/
						
						$pdf = PDF::loadView('reportpdf',$data);

						$email = $request['email'];
					}else{

						$data['edit_link'] = "http://".$_SERVER['SERVER_NAME']."/edit_report?access_token=".$accessToken."&edit=advisor";
						$data['verify_link'] = "http://".$_SERVER['SERVER_NAME']."/verify_report?access_token=".$accessToken."&verify=advisor";
						/*Prepare Pdf*/
						
						$pdf = PDF::loadView('reportpdf',$data);

						$email = $advoisor->email;

					}
					try{
			            Mail::send('reportpdf', $data, function($message)use($data,$pdf,$email) {
			            $message->to($email, "Test")
			            ->subject("test4buss")
			            ->attachData($pdf->output(), "invoice.pdf");
			            });
			        }catch(JWTException $exception){
			            $serverstatuscode = "0";
			            $serverstatusdes = $exception->getMessage();
			        }
			        if (Mail::failures()) {
			             $statusdesc  =   "Error sending mail";
			             $statuscode  =   "0";

			        }else{

			           $statusdesc  =   "Message sent Succesfully";
			           $statuscode  =   "1";
			        }
				}
				\Session::flash('message', 'Record edit successfully'); 
				return view('admin.supervisor.report_status');

		}else{
			return redirect()->back()->with('message','Advoisor not found! Please contact your advoisor or customer support');
		}
	}
	public function verifyReport(request $request){
		//dd($request->all());
		if(isset($request->access_token) && isset($request->verify) && (DB::table('reports')->where('access_token',$request->access_token)->exists())){
			$reportExpireDate = DB::table('reports')->select('token_expried_date','email','finance_advisor_emial')->where('access_token',$request->access_token)->first(); 
			$today = date("Y-m-d H:i:s");
			if($today < $reportExpireDate->token_expried_date){
				
				
				if($request->verify=='client'){
					$response = DB::table('reports')->where('access_token',$request->access_token)->where('client_verify',false)->update(['client_verify' => true]);
					
					
				}
				if($request->verify=='advisor'){
					$response = DB::table('reports')->where('access_token',$request->access_token)->where('advisor_verify',false)->update(['advisor_verify' => true]);
				}
				\Session::flash('message', 'Your report is verifed'); 
				return view('admin.supervisor.report_status');
			}else{
				\Session::flash('message', 'Your token is expire'); 
				return view('admin.supervisor.report_status');
			}
		}else{
			\Session::flash('message', 'Report Not Found'); 
			return view('admin.supervisor.report_status');
		}
	}

	public function rediectReport(){
		return view('admin.supervisor.report_status');
	}

	public function logout(){
		Auth::logout();
  		return redirect('/login');
	}
	public function ErrorPage()
	{
		return view('admin.supervisor.404_error');
	}

}
