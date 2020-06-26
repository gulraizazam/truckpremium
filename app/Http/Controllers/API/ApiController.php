<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    public function getAllClassFactors(Request $req) {

    	$all_class_factors = DB::table('class_factors')->selectRaw('id,min_radius, max_radius, class, notes')->get();

    	return response()->json($all_class_factors);
    }
    public function getClassFactor(Request $req) {

    	$class_factor = DB::table('class_factors')->selectRaw('id,min_radius, max_radius, class, notes')->where('id',$req->id)->get();

    	return response()->json($class_factor);
    }
    public function getAllpremiums(Request $req) {

    	$all_premiums = DB::table('premiums')->get();
    	$all_premiums_arr = array();
    	foreach ($all_premiums as $key => $value) {
    		$premium_obj = new \stdClass();
    		$premium_obj->id = $value->id;
    		$premium_obj->date = $value->effect_date;
    		$premium_obj->notes = $value->notes;

    		//Liability

    		$liability = DB::table('liabilitiys')->selectRaw('id, is_danger, territory_id as territory, class_factor_id as class, liability_price as price')->where('premium_id', $value->id)->get();

    		$premium_obj->liability = $liability;

    		//collision

    		$collisions = DB::table('collisions')->selectRaw('id, territory_id as territory, group_factor_id as groups, collision_price as price')->where('premium_id', $value->id)->get();

    		$premium_obj->collisions = $collisions;

    		//collision

    		$comprehensive = DB::table('comprehensives')->selectRaw('id, territory_id as territory, group_factor_id as groups, comprehensive_price as price')->where('premium_id', $value->id)->get();

    		$premium_obj->comprehensive = $comprehensive;

    		array_push($all_premiums_arr, $premium_obj);

    	}

    	return response()->json($all_premiums_arr);
    }
    public function getAllCarRatingGroups(Request $req) {

    	$all_car_rating_groups = DB::table('car_rate_groups')->join('groups_factors', 'car_rate_groups.id', '=', 'groups_factors.car_rate_group_id')->selectRaw('car_rate_groups.id, car_rate_groups.car_pricing_rating_min, car_rate_groups.car_pricing_rating_max, car_rate_groups.notes,groups_factors.id as groupid, groups_factors.year_start, groups_factors.year_end, groups_factors.group')->get();
    	// $all_car_rating_groups = DB::table('car_rate_groups')->get();

    	$all_car_rating_groups_arr = array();
    	 
    	if($all_car_rating_groups->count() > 0){
    		$group_id = $all_car_rating_groups[0]->id;

    		$all_car_rating_group_obj = new \stdClass();
    		$all_car_rating_group_obj->id = $all_car_rating_groups[0]->id;
    		$all_car_rating_group_obj->car_price_min = $all_car_rating_groups[0]->car_pricing_rating_min;
	    	$all_car_rating_group_obj->car_price_max = $all_car_rating_groups[0]->car_pricing_rating_max;

	    	$groups_arr = array();
	    	

	    	foreach ($all_car_rating_groups as $value) {
	    		$group_obj = new \stdClass();
	    		if($group_id == $value->id){
	    			$group_obj->id = $value->groupid;
	    			$group_obj->year_start = $value->year_start;
	    			$group_obj->year_end = $value->year_end;
	    			$group_obj->group = $value->group;

	    			array_push($groups_arr, $group_obj);

	    		}else{
	    			$all_car_rating_group_obj->group_factors = $groups_arr;
			    	$groups_arr = [];
	    			array_push($all_car_rating_groups_arr, $all_car_rating_group_obj);
	    			$all_car_rating_group_obj =  new \stdClass();
	    			$group_id = $value->id;
	    			$all_car_rating_group_obj->id = $value->id;
		    		$all_car_rating_group_obj->car_price_min = $value->car_pricing_rating_min;
			    	$all_car_rating_group_obj->car_price_max =$value->car_pricing_rating_max;

			    	$group_obj->id = $value->groupid;
	    			$group_obj->year_start = $value->year_start;
	    			$group_obj->year_end = $value->year_end;
	    			$group_obj->group = $value->group;

	    			array_push($groups_arr, $group_obj);

	    		}

	    	}

	    	$all_car_rating_group_obj->group_factors = $groups_arr;
			 
	    	array_push($all_car_rating_groups_arr, $all_car_rating_group_obj);
    	}
    	 
    	return response()->json($all_car_rating_groups_arr);
    }
}
