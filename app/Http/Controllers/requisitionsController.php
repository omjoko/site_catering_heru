<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\requisitions;
use App\detail_requisitions;
use App\voyages;
use App\vendors;
use App\ingredients;
use App\pelabuhans;

class requisitionsController extends Controller
{

	public function dataBahan(Request $request)
	{
		$requisitions = requisitions::with('voyages.rutes')->where('id_pelayaran', $request->id)-first();
		$pelabuhans = pelabuhans::all();
		// DD($requisitions);
		return view('requisitions.new-bahan',['requisitions'=>$requisitions,'pelabuhans'=>$pelabuhans]);
	}

	public function tampil(Request $request)
	{
		$requisitions = requisitions::with('vendors')->get();
		return view('requisitions.requisitions' , ['requisitions'=>$requisitions]);
	}

    public function tambah(Request $request)
    {
    	$requisitions = new requisitions;
    	$requisitions->deskripsi = $request->deskripsi;
    	$requisitions->vendor = $request->vendor;
    	$requisitions->status = $request->status;
    	$requisitions->status = $request->status;
    	$requisitions->id_pelayaran = $request->id_pelayaran;
    	$requisitions->save();

    	return redirect()->action('requisitionsController@tapmil');
    }
}
