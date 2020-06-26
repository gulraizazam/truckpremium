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

class TruckReportController extends Controller
{
	public function RecievedReport(Request $request){
		//dd($request->all());
		$travelDistence = DB::table('class_factors')->where('id',$request['planedriving'])->first();
	    $yearKey = 1;

	    $carRatGroupId = $request['truckpurchacecost'];
	    $carRatesID = DB::table('groups_factors')->select('id')->where('car_rate_group_id',$carRatGroupId)->where('year_start',$request['truckmadeyear'])->first();
	    $collisionPrice = DB::table('collisions')->select('collision_price')->where('group_factor_id',$carRatesID->id)->first();
	    $collision = $collisionPrice->collision_price;
	    $comprehensivePrice = DB::table('comprehensives')->select('comprehensive_price')->where('group_factor_id',$carRatesID->id)->first();
	    $comprehensive = $comprehensivePrice->comprehensive_price;
	    

	    $accessToken = sha1(time());
	    $token_expried_date = date("Y-m-d H:m:s", time() + 86400);
	    
	    /*Save Truck Info*/
	    $truck = new Truck();
    	$truck->truck_made_year = $request['truckmadeyear'];
		$truck->truck_brand_name = $request['truckbrandname'];
		$truck->truck_model = $request['truckmodel'];
		$truck->cost_purchase = $request['truckpurchacecost'];
		$truck->date_of_purchase = $request['datetruckpurchase'];
		$truck->save();
		$truckId = $truck->id;

		/*Save Report*/
		$report = new Report();
		$report->name = $request['fullname'];
		$report->address = $request['adress'];
		$report->phone = $request['phone'];
		$report->email = $request['email'];
		$report->dealer_id = $request['referedby'];
		$report->finance_advisor = $request['Finance_advisor_name'];
		$report->finance_advisor_emial = $request['Finance_advisor_emial'];
		$report->planned_driving_distance = $travelDistence->radius;
		$report->planned_goods = $request['plangoods'];
		$report->location_truck_stop = $request['locationtruckstop'];
		$report->purchase_type = $request['truckdetails'];
		$report->purchase_compnay_name = $request['compnayname'];
		$report->purchase_company_address = $request['compnayadress'];
		$report->standard_coverage = $request['standardcoverage'];
		$report->cargo_value = isset($request['cargoinsuranceload']) ? $request['cargoinsuranceload'] : 0;
		$report->gap_insurance = isset($request['gapinsurance']) ? 1 : 0;
		$report->health_insurance = isset($request['healthinsurance']) ? 1 : 0;
		$report->hospitalize_cash_covrage = isset($request['hospitalizedcoverage']) ? 1 : 0;
		$report->bussiness_liabilty = isset($request['companyowned']) ? 1 : 0;
		//$report->liability = '4632';
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
			

			$accident = new Accident();
			if(isset($request['accidentfaultsdate'])){
				foreach ($request['accidentfaultsdate'] as $key => $value) {
					$accident->type = "accident";
					$accident->date = $value;
					$accident->driver_id = $driverId;
					$accident->save();
				}

			}
			if(isset($request['convictions'])){
				foreach ($request['convictions'] as $key => $value) {
					$accident->type = "conviction";
					$accident->date = $value;
					$accident->driver_id = $driverId;
					$accident->save();
				}
			}

			\DB::table('driver_report')->insert(['driver_id'=>$driverId,'report_id'=>$reportId]);
		}
		//dd($request->all());
		$data= [];
		foreach ($request->all() as $key => $value) {
			if(is_array($value)){

			}else{
				$data[$key] = $value;
			}
			
		}
		$accidentBenefit = 47;
		$liability = 4632;
		$totalPrice = $collision + $comprehensive + $accidentBenefit + $liability;
		$data['collision'] = $collision;
		$data['liability'] = $liability;
		$data['comprehensive'] = $comprehensive;
		$data['accidentBenefit'] = $accidentBenefit;
		$data['totalPrice'] = $totalPrice;
		

		/*Send Email*/
		//$email = $request['email'];

		for ($i=1; $i<=2 ; $i++) {
			if($i==1){
				$data['edit_link'] = "http://localhost/TruckPremium/public/edit_report?access_token=".$accessToken."&edit=client";
				$data['verify_link'] = "http://localhost/TruckPremium/public/verify_report?access_token=".$accessToken."&verify=client";
				/*Prepare Pdf*/
				
				$pdf = PDF::loadView('reportpdf',$data);

				$email = $request['email'];
			}else{

				$data['edit_link'] = "http://localhost/TruckPremium/public/edit_report?access_token=".$accessToken."&edit=advisor";
				$data['verify_link'] = "http://localhost/TruckPremium/public/verify_report?access_token=".$accessToken."&verify=advisor";
				/*Prepare Pdf*/
				
				$pdf = PDF::loadView('reportpdf',$data);

				$email = $request['Finance_advisor_emial'];

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

		return view('user.user_main',$data);
	}

	public function editReport(request $request){
		dd($request->all());
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
				return redirect('/')->with('message','Your report is verifed');
			}else{

				return redirect('/')->with('message','Your token is expire');
			}
		}else{
			return redirect('/')->with('message','No Report found');
		}
	}

    
}
