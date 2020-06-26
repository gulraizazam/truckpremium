<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Premium;
use App\Territory;
use App\Class_Factor;
use App\Group_Factor;
use App\Car_Rate_Group;
use App\Collision;
use App\Comprehensive;
use App\Liability;
use Illuminate\Support\Facades\Redirect;
use DB;
class AdminPagesController extends Controller
{
    public function index()
    {
        
    	return view('admin.index');
    }
    public function AddPremium()
    {
    	return view('admin.premium.addpremium');
    }
    public function AllPremium()
    {
    	$allpremiums = DB::table('premiums')->get();
    	
    	return view('admin.premium.allpremiums',compact('allpremiums'));
    }
    public function InsertPremium(Request $request)
    {
    	$premium = new Premium();
    	$premium->effect_date = $request->Effectdate;
    	$premium->notes = $request->notes;
    	$premium->save();
    	return Redirect::to('allpremiums')->with('Success','Premium inserted Successfully!');
    }
    public function EditPremium($id)
    {

    	$premiumedit = Premium::find($id);
    	return view('admin.premium.editpremium',compact('premiumedit'));
    }
    public function UpdatePremium(Request $request,$id)
    {
    	$premiumUpdate = Premium::find($id);
    	
    	$premiumUpdate->effect_date = $request->Effectdate;
    	$premiumUpdate->notes = $request->notes;
    	$premiumUpdate->update();
    	return Redirect::to('allpremiums')->with('Success','Premium Updated Successfully!');

    }
    public function DeletePremium($id)
    {
    	$premiumDelete = Premium::find($id);
    	$premiumDelete->delete();
    	return Redirect::to('allpremiums')->with('Error','Premium Deleted Successfully!');
    }

    public function AddTerritory()
    {
    	return view('admin.territory.addterritory');
    }
    public function InsertTerritory(Request $request)
    {
    	
    	$territory = new Territory();
    	$territory->name = $request->territoryname;
    	$territory->city = $request->City;
    	$territory->save();
    	return Redirect::to('allterritories')->with('Success','Territory inserted Successfully!');
    }
    public function AllTerritories()
    {
    	$getTerritories = DB::table('territorys')->get();
    	return view('admin.territory.allterritories',compact('getTerritories'));
    }
    public function EditTerritory($id)
    {
    	$editteritory = Territory::find($id);
    	return view('admin.territory.editterritory',compact('editteritory'));
    }
    public function UpdateTerritory(Request $request,$id)
    {

    	$updateTerritory = Territory::find($id);
    	$updateTerritory->name = $request->territoryname;
    	$updateTerritory->city = $request->City;
    	$updateTerritory->update();
    	return Redirect::to('allterritories')->with('Success','Territory Updated Successfully!');
    }
    public function DeleteTerritory($id)
    {
    	$deleteTerritory = Territory::find($id);
    	$deleteTerritory->delete();
    	return Redirect::to('allterritories')->with('Error','Territory Deleted Successfully!');
    }
    public function AddClassFactor()
    {
    	return view('admin.classFactor.addclassfactor');
    }
    public function AllClassFactors()
    {
    	$allClassfactors = DB::table('class_factors')->get();
    	return view('admin.classFactor.allclassfactors',compact('allClassfactors'));
    }
    public function InsertFactor(Request $request)
    {
    	$insertClassFactor = new Class_Factor();
    	$insertClassFactor->radius = $request->Radius;
    	$insertClassFactor->min_radius = $request->minraddius;
    	$insertClassFactor->max_radius = $request->maxraddius;
    	$insertClassFactor->class = $request->classfactor;
    	$insertClassFactor->notes = $request->classffactornotes;
    	$insertClassFactor->save();
    	return Redirect::to('allclassfactors')->with('Success','Class Factor Addedd Successfully!');
    }
    public function EditFactor($id)
    {
    	$editFactor = Class_Factor::find($id);
    	return view('admin.classFactor.editclassfactor',compact('editFactor'));
    }
    public function UpdateFactor(Request $request,$id)
    {

    	$updateClassFactor = Class_Factor::find($id);
    	$updateClassFactor->radius = $request->Radius;
    	$updateClassFactor->min_radius = $request->minraddius;
    	$updateClassFactor->max_radius = $request->maxraddius;
    	$updateClassFactor->class = $request->classfactor;
    	$updateClassFactor->notes = $request->classffactornotes;
    	$updateClassFactor->update();
    	return Redirect::to('allclassfactors')->with('Success','Class Factor Updated Successfully!');

    }
    public function DeleteFactor($id)
    {
    	$deleteClassFactor = Class_Factor::find($id);
    	$deleteClassFactor->delete();
    	return Redirect::to('allclassfactors')->with('Error','Class Factor Deleted Successfully!');
    }
    public function AddCarRate()
    {
    	return view('admin.carRate.addcarrategroups');
    }
    public function InsertCarRate(Request $request)
    {
    	$addcarrategroup = new Car_Rate_Group();
    	$addcarrategroup->car_pricing_rating_min = $request->carpricingmin;
        $addcarrategroup->car_pricing_rating_max = $request->carpricingmax;
    	$addcarrategroup->notes = $request->carratenotes;
    	$addcarrategroup->save();
    	return Redirect::to('allcarrategroups')->with('Success','Class Rate Group Inserted Successfully!');
    }
    public function AllCarRateGroups()
    {
    	$fetchAllCarRateGroups = DB::table('car_rate_groups')->get();
    	return view('admin.carRate.allcarrategroups',compact('fetchAllCarRateGroups'));
    }
    public function EditCarRate($id)
    {
    	$editCarrateGroup = Car_Rate_Group::find($id);
    	return view('admin.carRate.editcarrategroup',compact('editCarrateGroup'));
    }
    public function UpdateCarRate(Request $request,$id){
    	$updateCarrateGroup = Car_Rate_Group::find($id);
    	$updateCarrateGroup->car_pricing_rating_min = $request->carpricingmin;
        $updateCarrateGroup->car_pricing_rating_max = $request->carpricingmax;
    	$updateCarrateGroup->notes = $request->carratenotes;
    	$updateCarrateGroup->update();
    	return Redirect::to('allcarrategroups')->with('Success','Class Rate Group Updated Successfully!');
    }
    public function DeleteCarRate($id)
    {
    	$deleteCarrateGroup = Car_Rate_Group::find($id);
    	$deleteCarrateGroup->delete();
    	return Redirect::to('allcarrategroups')->with('Error','Class Rate Group Deleted Successfully!');
    }
    public function AddGroupFactor()
    {
    	$allcarrategroups = DB::table('car_rate_groups')->get();
    	return view('admin.GroupFactor.addgroupfactors',compact('allcarrategroups'));
    }
    public function AddNewGroupFactor()
    {
        $allcarrategroups = DB::table('car_rate_groups')->get();
        return view('admin.GroupFactor.addnewgroupfactors',compact('allcarrategroups'));
    }
    public function InsertGroupFactor(Request $request)
    {
    	$addGroupFactor  = new Group_Factor();
    	$addGroupFactor->year_start = $request->startYear;
    	$addGroupFactor->year_end = $request->endYear;
    	$addGroupFactor->car_rate_group_id = $request->car_rate_group;
    	$addGroupFactor->group = $request->classgroupfactor;
    	$addGroupFactor->save();
    	return Redirect::to('allgroupfactors')->with('Success','Group Factor inserted Successfully!');
    }
    public function AllGroupFactors()
    {
    	$fetchallGroupFactors = DB::table('groups_factors')->get();
    	return view('admin.GroupFactor.allgroupfactors',compact('fetchallGroupFactors'));
    }
    public function EditGroupFactor($id)
    {
    	$allcarrategroups = DB::table('car_rate_groups')->get();
    	$editgroupfactor = Group_Factor::find($id);
    	return view('admin.GroupFactor.editgroupfactor',compact('editgroupfactor','allcarrategroups'));
    }
    public function UpdateGroupFactor(Request $request,$id)
    {
    	$updategroupfactor = Group_Factor::find($id);
    	$updategroupfactor->year_start = $request->startYear;
    	$updategroupfactor->year_end = $request->endYear;
    	$updategroupfactor->car_rate_group_id = $request->car_rate_group;
    	$updategroupfactor->group = $request->classgroupfactor;
    	$updategroupfactor->update();
    	return Redirect::to('allgroupfactors')->with('Success','Group Factor Updated Successfully!');

    }
    public function DeleteGroupFactor($id)
    {
    	$deletegroupfactor = Group_Factor::find($id);
    	$deletegroupfactor->delete();
    	return Redirect::to('allgroupfactors')->with('Error','Group Factor deleted Successfully!');
    }
    public function AddCollision()
    {
    	$allteritory = DB::table('territorys')->get();
    	$allgroupfactor = DB::table('groups_factors')->get();
    	$allpremiums = DB::table('premiums')->get();
    	return view('admin.collisions.addcollision',compact('allteritory','allgroupfactor','allpremiums'));
    }
    public function InsertCollision(Request $request)
    {

    	$addcollisions = new Collision();
    	$addcollisions->territory_id = $request->teritoryId;

    	$addcollisions->group_factor_id = $request->groupfactor;
    	$addcollisions->collision_price = $request->collisionprice;
    	$addcollisions->premium_id = $request->premium;
    	$addcollisions->save();
    	return Redirect::to('allcollisions')->with('Success','Collision Inserted Successfully!');


    }
    public function AllCollisions()
    {
    	$fetchAllCollisions = DB::table('collisions')->get();
    	return view('admin.collisions.allcollisions',compact('fetchAllCollisions'));
    }
    public function EditCollision($id)
    {
    	$allteritory = DB::table('territorys')->get();
    	$allgroupfactor = DB::table('groups_factors')->get();
    	$allpremiums = DB::table('premiums')->get();
    	$editcollision = Collision::find($id);
    	return view('admin.collisions.editcollision',compact('editcollision','allteritory','allgroupfactor','allpremiums'));
    }
    public function UpdateCollision(Request $request,$id)
    {
    	$updatecollision = Collision::find($id);
    	$updatecollision->territory_id = $request->teritoryId;
    	$updatecollision->group_factor_id = $request->groupfactor;
    	$updatecollision->collision_price = $request->collisionprice;
    	$updatecollision->premium_id = $request->premium;
    	$updatecollision->update();
    	return Redirect::to('allcollisions')->with('Success','Collision Updated Successfully!');

    }
    public function DeleteCollision($id)
    {
    	$deletecollision = Collision::find($id);
    	$deletecollision->delete();
    	return Redirect::to('allcollisions')->with('Error','Collision Deleted Successfully!');
    }
    public function AddComprehensive()
    {
    	$allteritory = DB::table('territorys')->get();
    	$allgroupfactor = DB::table('groups_factors')->get();
    	$allpremiums = DB::table('premiums')->get();
    	return view('admin.comprehensives.addcomprehensive',compact('allteritory','allgroupfactor','allpremiums'));
    }
    public function InsertComprehensive(Request $request)
    {
    	$addComprehensive = new Comprehensive();
    	$addComprehensive->territory_id = $request->teritoryId;

    	$addComprehensive->group_factor_id = $request->groupfactor;
    	$addComprehensive->comprehensive_price = $request->Comprehensiveprice;
    	$addComprehensive->premium_id = $request->premium;
    	$addComprehensive->save();
    	return Redirect::to('allcomprehensives')->with('Success','Comprehensive Inserted Successfully!');
    }
    public function Allcomprehensives()
    {
    	$fetchAllcomprehensives = DB::table('comprehensives')->get();
    	return view('admin.comprehensives.allcomprehensives',compact('fetchAllcomprehensives'));
    }
    public function EditComprehensive($id)
    {
    	$allteritory = DB::table('territorys')->get();
    	$allgroupfactor = DB::table('groups_factors')->get();
    	$allpremiums = DB::table('premiums')->get();
    	$editcompre = Comprehensive::find($id);
    	return view('admin.comprehensives.editcomprehensive',compact('editcompre','allteritory','allgroupfactor','allpremiums'));
    }
    public function updateComprehensive(Request $request,$id)
    {
    	$updatecompre = Comprehensive::find($id);
    	$updatecompre->territory_id = $request->teritoryId;
    	$updatecompre->group_factor_id = $request->groupfactor;
    	$updatecompre->comprehensive_price = $request->compreprice;
    	$updatecompre->premium_id = $request->premium;
    	$updatecompre->update();
    	return Redirect::to('allcomprehensives')->with('Success','Comprehensive Updated Successfully!');

    }
    public function DeleteComprehensive($id)
    {
    	$deletecomprehensive = Comprehensive::find($id);
    	$deletecomprehensive->delete();
    	return Redirect::to('allcomprehensives')->with('Error','Comprehensive Deleted Successfully!');
    }
    public function AddLiability()
    {
    	$allteritory = DB::table('territorys')->get();
    	$allpremiums = DB::table('premiums')->get();
    	$allClassfactor  = DB::table('class_factors')->get();
    	return view('admin.liability.addliability',compact('allteritory','allpremiums','allClassfactor'));
    }
    public function InsertLiability(Request $request)
    {

    	$isdangerVal = isset($request->isDanger) ? 1 : 0;
    	$addliability = new Liability();
    	$addliability->territory_id = $request->teritoryId;
    	$addliability->is_danger = $isdangerVal;
    	$addliability->class_factor_id = $request->classfactor;
    	$addliability->liability_price = $request->price;
    	$addliability->premium_id = $request->premium;
    	$addliability->save();
    	return Redirect::to('allliabilities')->with('Success','Liability Inserted Successfully!');
    }
    public function AllLiability()
    {
    	$getAllLiabilities = DB::table('liabilitiys')->get();
    	return view('admin.liability.allliabilities',compact('getAllLiabilities'));
    }
    public function EditLiability($id)
    {
    	$allteritory = DB::table('territorys')->get();
    	$allpremiums = DB::table('premiums')->get();
    	$allClassfactor  = DB::table('class_factors')->get();
    	$editliability = Liability::find($id);
    	
    	return view('admin.liability.editliablity',compact('editliability','allteritory','allpremiums','allClassfactor'));
    }
    public function UpdateLiability(Request $request,$id)
    {
    	$updateliability = Liability::find($id);
    	$updateliability->territory_id = $request->teritoryId;
    	$updateliability->class_factor_id = $request->classfactor;
    	$updateliability->liability_price = $request->price;
    	$updateliability->premium_id = $request->premium;
    	$updateliability->update();
    	return Redirect::to('allliabilities')->with('Success','Liability Updated Successfully!');
    }
    public function DeleteLiability($id)
    {
    	$deleteliability = Liability::find($id);
    	$deleteliability->delete();
    	return Redirect::to('allliabilities')->with('Error','Liability Deleted Successfully!');
    }

}
