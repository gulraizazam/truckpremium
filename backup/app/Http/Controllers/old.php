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
		dd($request->all());
		$travelDistence = $request->planedriving;
		$client = new Google_Client();
		putenv('GOOGLE_APPLICATION_CREDENTIALS='.public_path().'/testpro-261813-697c737f4d37.json');
		$client->useApplicationDefaultCredentials();
		$client->addScope(Google_Service_Drive::DRIVE);
	    $service = new Google_Service_Sheets($client);
	    $spreadsheetId = '1geAaow-JCgT-E8FX-Q8goespt5jgiUIF-0W7mfyTTFM';
	    $range = 'A2:E30';
	    $response = $service->spreadsheets_values->get($spreadsheetId, $range);
	    $responseValues = $response->getValues();

	    if($travelDistence <= 40){
	    	$liability = $responseValues[2][2];
	    	$liabilityClass = $responseValues[3][1];
	    }elseif ($travelDistence >= 40 && $travelDistence < 80) {
	    	$liability = $responseValues[3][2];
	    	$liabilityClass = $responseValues[3][1];
	    }elseif ($travelDistence >= 80 && $travelDistence <= 160) {
	    	$liability = $responseValues[4][2];
	    	$liabilityClass = $responseValues[4][1];
	    }else{
	    	$liability = $responseValues[5][2];
	    	$liabilityClass = $responseValues[5][1];
	    }
	    $yearKey = 1;
	    foreach ($responseValues[9] as $key => $value) {
	    	if(stripos($value,$request->truckmadeyear)){
	    		$yearKey = $key;

	    	}
	    	
	    }
	    switch ($request->truckpurchacecost) {
	    	case '50':
	    		$collisionAndComprehensiveKey = $responseValues[10][$yearKey];
	    		break;
	    	case '75':
	    		$collisionAndComprehensiveKey = $responseValues[11][$yearKey];
	    		break;
	    	case '100':
	    		$collisionAndComprehensiveKey = $responseValues[12][$yearKey];
	    		break;
	    	case '150':
	    		$collisionAndComprehensiveKey = $responseValues[13][$yearKey];
	    		break;
	    	case '200':
	    		$collisionAndComprehensiveKey = $responseValues[14][$yearKey];
	    		break;	
	    	default:
	    		$collisionAndComprehensiveKey = NULL;
	    		break;
	    }
	    for($i=16; $i<count($responseValues)-1; $i++){
	    	if($responseValues[$i][0]==$collisionAndComprehensiveKey){
	    		$collision = $responseValues[$i][1];
	    		$comprehensive = $responseValues[$i][3];
	    	}
	    }

	    $accidentBenefit = 47;
	    $totalPrice = $liability + $collision + $comprehensive + $accidentBenefit;
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
		$report->refered_by = $request['referedby'];
		$report->planned_driving_distance = $request['planedriving'];
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
		$report->liability = $liability;
		$report->collision = $collision;
		$report->comprehensive = $comprehensive;
		$report->accident_benefit = $accidentBenefit;
		$report->truck_id = $truckId;
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
		$data['collision'] = $collision;
		$data['liability'] = $liability;
		$data['comprehensive'] = $comprehensive;
		$data['accidentBenefit'] = $accidentBenefit;
		$data['totalPrice'] = $totalPrice;
		/*Prepare Pdf*/
		
		$pdf = PDF::loadView('reportpdf',$data);


		/*Send Email*/

		try{
            Mail::send('reportpdf', $data, function($message)use($data,$pdf) {
            $message->to($request['email'], "Test")
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

    
}
