<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\food_plans;
use App\voyages;
use App\pelabuhans;
use App\kapals;
use App\menus;
use App\vendors;
use App\recipes;
use App\ingredients;
use URL;

class foodplansController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public static function sedotMResep ($value){
        $resep = recipes::where('id', $value)->first();
        return $resep;
    }

    public static function sedotMBahan ($value){
        $bahan = ingredients::where('id', $value)->first();
        return $bahan;
    }

    public static function sedotMenu($value){

        $menus = menus::with('resep')->where('id', $value)->first();
        // DD($menus);
        return $menus;
    }

    public static function sedotResep($value){

        $recipes = recipes::where('ids', $value)->first();
        // DD($recipes);
        return $recipes;
    }

    public function editPlan(Request $request)
    {
        $voyages = voyages::with('rutes')->where('id', $request->id)->first();
        $food_plans= food_plans::where(['id_pelayaran'=>$request->id, 'hari'=>$request->hari])->first();
        $pelabuhans = pelabuhans::all();
        $sarapans = menus::where('tipe', 0)->get();
        $makansiangs = menus::where('tipe', 1)->get();
        $makanmalams = menus::where('tipe', 2)->get();
        // DD($food_plans);
        return view('foodplans.editform',['food_plans'=>$food_plans,'voyages'=>$voyages, 'pelabuhans'=>$pelabuhans, 'sarapans'=>$sarapans,'makansiangs'=>$makansiangs,'makanmalams'=>$makanmalams]);
    }

    public static function sedotVendor()
    {
        $vendors = vendors::all();
        // DD($vendors);
        return $vendors;
    }

	public function dataFP(Request $request)
	{    
        $voyages = voyages::with('rutes')->get();
		$pelabuhans = pelabuhans::all();
		$sarapans = menus::with('resep')->where('tipe', 0)->get();
		$siangs = menus::where('tipe', 1)->get();
		$malams = menus::where('tipe', 2)->get();

		return view('foodplans.foodplans' , ['voyages'=>$voyages, 'pelabuhans'=>$pelabuhans, 'sarapans'=>$sarapans,'siangs'=>$siangs,'malams'=>$malams]);
	}

    public static function SedotFP($value)
    {
        $FP = food_plans::where('id_pelayaran', $value)->orderBy('hari', 'asc')->get();
        // DD($FP);
        return $FP;
    }

    public function DataNew(Request $request)
    {
    	$voyages = voyages::with('rutes')->where('id', $request->id)->first();
        $day= food_plans::where('id_pelayaran',$request->id)->select('food_plans.hari')->orderBy('hari', 'asc')->get();
        // DD($day);
		$pelabuhans = pelabuhans::all();
		$sarapans = menus::where('tipe', 0)->get();
		$makansiangs = menus::where('tipe', 1)->get();
		$makanmalams = menus::where('tipe', 2)->get();

		return view('foodplans.formnew', ['voyages'=>$voyages,'pelabuhans'=>$pelabuhans, 'sarapans'=>$sarapans,'makansiangs'=>$makansiangs,'makanmalams'=>$makanmalams,'day'=>$day]);
    }

    public function tambah(Request $request)
    {
        
        $id_food_plans= food_plans::where(['id_pelayaran'=>$request->id_pelayaran, 'hari'=>$request->hari])->first();
        if ($id_food_plans!=null) {
            return redirect('/food-plans?success=2');
        } else {
    	$food_plans = new food_plans;
    	$food_plans->id_pelayaran = $request->id_pelayaran;
    	$food_plans->sarapan_eksekutif = $request->sarapan_eksekutif;
    	$food_plans->sarapan_bisnis = $request->sarapan_bisnis;
    	$food_plans->sarapan_ekonomi1 = $request->sarapan_ekonomi1;
    	$food_plans->sarapan_ekonomi2 = $request->sarapan_ekonomi2;
    	$food_plans->siang_eksekutif = $request->siang_eksekutif;
    	$food_plans->siang_bisnis = $request->siang_bisnis;
    	$food_plans->siang_ekonomi1 = $request->siang_ekonomi1;
    	$food_plans->siang_ekonomi2 = $request->siang_ekonomi2;
    	$food_plans->malam_eksekutif = $request->malam_eksekutif;
    	$food_plans->malam_bisnis = $request->malam_bisnis;
    	$food_plans->malam_ekonomi1 = $request->malam_ekonomi1;
    	$food_plans->malam_ekonomi2 = $request->malam_ekonomi2;
    	$food_plans->hari = $request->hari;
    	$food_plans->save();

        $url = URL::previous();
        return redirect($url);
        }
    }

    public function ubah(Request $request){

        $food_plans= food_plans::where(['id_pelayaran'=>$request->id, 'hari'=>$request->hari])->first();
        $food_plans->id_pelayaran = $request->id_pelayaran;
        $food_plans->sarapan_eksekutif = $request->sarapan_eksekutif;
        $food_plans->sarapan_bisnis = $request->sarapan_bisnis;
        $food_plans->sarapan_ekonomi1 = $request->sarapan_ekonomi1;
        $food_plans->sarapan_ekonomi2 = $request->sarapan_ekonomi2;
        $food_plans->siang_eksekutif = $request->siang_eksekutif;
        $food_plans->siang_bisnis = $request->siang_bisnis;
        $food_plans->siang_ekonomi1 = $request->siang_ekonomi1;
        $food_plans->siang_ekonomi2 = $request->siang_ekonomi2;
        $food_plans->malam_eksekutif = $request->malam_eksekutif;
        $food_plans->malam_bisnis = $request->malam_bisnis;
        $food_plans->malam_ekonomi1 = $request->malam_ekonomi1;
        $food_plans->malam_ekonomi2 = $request->malam_ekonomi2;
        $food_plans->hari = $request->hari;
        $food_plans->save();

        return redirect('/food-plans?success=1');
    }

    public function hapus(Request $request){

        $food_plans= food_plans::where(['id_pelayaran'=>$request->id, 'hari'=>$request->hari])->first();
        $food_plans->delete();

        return redirect('/food-plans?success=1');
    }

}
