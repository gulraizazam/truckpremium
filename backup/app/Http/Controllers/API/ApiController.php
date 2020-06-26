<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Response;

use DB;

class ApiController extends Controller
{
    public function getAllClassFactor(){
        $classFactors= DB::table('class_factors')->get();
        return Response::json($classFactors);
    }
    public function getAllpremium(){
        $premiumArray = [];
        $premiums= DB::table('premiums')->get();
        foreach ($premiums as $premium) {
            $premiumObjct = null;
            $premiumObjct['ID'] = $premium->id;
            $premiumObjct['Date'] = $premium->effect_date;
            $premiumObjct['Notes'] = $premium->notes;
            $liability = DB::table('liabilitiys')->where('premium_id', $premium->id)->get();
            $premiumObjct['Liability'] = $liability;

            $collison = DB::table('collisions')->where('premium_id', $premium->id)->get();

            $premiumObjct['Collison'] = $collison;

            $comprehensive = DB::table('comprehensives')->where('premium_id', $premium->id)->get();

            $premiumObjct['Comprehensive'] = $comprehensive;

            // $deductible = DB::table('deductibles')->where('premium_id', $premium->id)->get();

            // $premiumObjct['Deductible'] = $deductible;

            array_push($premiumArray,  $premiumObjct);
        }


        return Response::json($premiumArray);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
