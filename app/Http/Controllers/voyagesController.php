<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pelabuhans;
use App\Rute;
use App\kapals;
use App\voyages;
use App\Transit;

class voyagesController extends Controller
{

        public function __construct()
    {
        $this->middleware('auth');
    }

	public function DataVoyages(Request $request)
	{

		$voyages = voyages::with('rutes')->get();
		$pelabuhans = pelabuhans::all();
		$kapals = kapals::all();
		return view('voyages.voyages' , ['voyages'=>$voyages, 'pelabuhans'=>$pelabuhans, 'kapals'=>$kapals]);
	}

	public static function DataTransit($value)
	{
		$transits = Transit::where('id_rute',$value)->get();
		// DD($transits);
		return $transits;
	}

	public function DataNew(Request $request)
	{
		$pelabuhans = pelabuhans::all();
		$rutes = Rute::all();
		$kapals = kapals::all();
		return view('voyages.new',['pelabuhans'=>$pelabuhans, 'rutes'=>$rutes, 'kapals'=>$kapals]);
	}

    public function tambah(Request $request)
    {
    	$id_rute = Rute::where([['asal', $request->asal],['tujuan', $request->tujuan]])->first();
    	if ($id_rute==null) {
	    	return redirect('/new-voyages?success=0');
    	} else {
    	$tanggal = date("Y-m-d", strtotime($request->tgl_keberangkatan));
    	$keberangkatan= $tanggal." ".$request->jam_keberangkatan;
    	$voyages = new voyages;
    	$voyages->id_rute = $id_rute->id;
    	$voyages->id_kapal = $request->id_kapal;
    	$voyages->keberangkatan = $keberangkatan;
    	$voyages->eksekutif = $request->eksekutif;
    	$voyages->bisnis = $request->bisnis;
    	$voyages->ekonomi1 = $request->ekonomi1;
    	$voyages->ekonomi2 = $request->ekonomi2;
    	$voyages->save();

    	return redirect()->action('voyagesController@DataVoyages');
    	}
    }

    public function ubah(Request $request)
    {
    	$id_rute = Rute::where([['asal', $request->asal],['tujuan', $request->tujuan]])->first();
    	if ($id_rute==null) {
	    	return redirect('/voyages?success=0');
    	} else {
    	$tanggal = date("Y-m-d", strtotime($request->tgl_keberangkatan));
    	$keberangkatan= $tanggal." ".$request->jam_keberangkatan;
    	$voyages = voyages::find($request->id);
    	$voyages->id_rute = $id_rute->id;
    	$voyages->id_kapal = $request->id_kapal;
    	$voyages->keberangkatan = $keberangkatan;
		$voyages->eksekutif = $request->eksekutif;
    	$voyages->bisnis = $request->bisnis;
    	$voyages->ekonomi1 = $request->ekonomi1;
    	$voyages->ekonomi2 = $request->ekonomi2;
    	$voyages->save();

    	return redirect()->action('voyagesController@DataVoyages');
    	}
    }

    public function hapus(Request $request)
    {
    	$voyages = voyages::find($request->id);
    	$voyages->delete();

    	return redirect()->action('voyagesController@DataVoyages');
    }
}
