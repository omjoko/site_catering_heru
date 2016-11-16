<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\requisitions;
use App\detail_requisitions;
use App\voyages;
use App\vendors;
use App\ingredients;
use App\pelabuhans;
use URL;

class requisitionsController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');

    }

	public function dataBahan(Request $request)
	{
		$requisitions = requisitions::with('voyages.rutes')->where('id_pelayaran', $request->id_pelayaran)->first();
		$rv = requisitions::with('vendors')->where('id_pelayaran', $request->id_pelayaran)->first();
		$pelabuhans = pelabuhans::all();
		$detail_requisitions = detail_requisitions::with('ingredients.pembelian')->where('id_req', $request->id)->get();
		// DD($detail_requisitions);
		$ingredients = ingredients::with('pembelian')->get();
		// DD($detail_requisitions);
		return view('requisitions.new-bahan',['requisitions'=>$requisitions,'pelabuhans'=>$pelabuhans,'ingredients'=>$ingredients,'detail_requisitions'=>$detail_requisitions, 'rv'=>$rv]);
	}

	public function tambahBahan(Request $request)
	{
		$detail_requisitions = new detail_requisitions;
		$detail_requisitions->id_req = $request->id_req;
		$detail_requisitions->id_bahan = $request->id_bahan;
		$detail_requisitions->jumlah = $request->jumlah;
		$detail_requisitions->harga = $request->harga;
		$detail_requisitions->save();

		$url = URL::previous();
        return redirect($url);
	}

		public function ubahBahan(Request $request)
	{
		$detail_requisitions = detail_requisitions::find($request->id_req);
		$detail_requisitions->id_req = $request->id;
		$detail_requisitions->id_bahan = $request->id_bahan;
		$detail_requisitions->jumlah = $request->jumlah;
		$detail_requisitions->harga = $request->harga;
		$detail_requisitions->save();

		$url = URL::previous();
        return redirect($url);
	}

		public function hapusBahan(Request $request)
	{
		$detail_requisitions = detail_requisitions::find($request->id_req);
		$detail_requisitions->delete();

		$url = URL::previous();
        return redirect($url);
	}

	public function tampil(Request $request)
	{
		$requisitions = requisitions::with('vendors')
						->join('voyages', 'requisitions.id_pelayaran', '=', 'voyages.id')
						->select('requisitions.*','voyages.id as hole')
						->where('voyages.deleted_at', null)
						->get();
		// DD($requisitions);
		$vendors = vendors::all();

		return view('requisitions.requisitions' , ['requisitions'=>$requisitions,'vendors'=>$vendors]);
	}

	public static function sedot_detail($value)
	{

		$detail_requisitions = detail_requisitions::with('ingredients.pembelian')->where('id_req', $value)->get();
		// DD($detail_requisitions);
		return $detail_requisitions;
	}

    public function tambah(Request $request)
    {	
    	$id_req = requisitions::where('id_pelayaran', $request->id_pelayaran)->first();
    	echo $id_req;
    	if ($id_req!=null) {
    		return redirect('/requisitions?success=1');
    	} else {
		$requisitions = new requisitions;
    	$requisitions->deskripsi = $request->deskripsi;
    	$requisitions->vendor = $request->vendor;
    	$requisitions->status = $request->status;
    	$requisitions->id_pelayaran = $request->id_pelayaran;
    	$requisitions->save();

    	return redirect('/requisitions?success=0');
    	}
    }

    public function ubah(Request $request)
    {
    	$requisitions = requisitions::find($request->id);
    	$requisitions->deskripsi = $request->deskripsi;
    	$requisitions->vendor = $request->vendor;
    	$requisitions->save();

    	return redirect('/requisitions?success=0');
    }

    public function ubahstatus(Request $request)
    {
    	// $request->id
    	$requisitions = requisitions::find($request->id);
    	$requisitions->status = $request->status;
    	$requisitions->save();

    	return redirect('/requisitions?success=0');
    }

    public function hapus(Request $request)
    {
    	$requisitions = requisitions::find($request->id);
    	$requisitions->delete();

    	return redirect('/requisitions?success=0');
    }
}
