<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\pelabuhans;
use App\Transit;
use App\Rute;
use URL;

class TransitController extends Controller
{
        public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request)	{

        $rutes = Rute::find($request->id);
        $pelabuhans = pelabuhans::all();
        $transits = Transit::with('rutes')->where('id_rute',$request->id)->get();

    	return view('transit', ['transits' => $transits,
    							'pelabuhans' => $pelabuhans,
    							'rutes' => $rutes,
    							]);
    }

    public function store(Request $request) {

        $transits = new Transit;
        $transits->id_pelabuhan = $request->id_pelabuhan;
        $transits->est_transit = $request->est_transit;
        $transits->id_rute = $request->id;
        $transits->save();

        $url = URL::previous();
        return redirect($url);   
    }

    public function update(Request $request) {

    	$transits = Transit::find($request->id_transit);
        $transits->id_pelabuhan = $request->id_pelabuhan;
        $transits->est_transit = $request->est_transit;
        $transits->id_rute = $request->id;
        $transits->save();

        $url = URL::previous();
        return redirect($url); 
    }

    public function ubahEstimasi(Request $request)
    {
        $rute = Rute::find($request->id);
        $rute->est_rute = $request->est;
        // DD($rute);
        $rute->save();

        return redirect()->action('RuteController@index');
    }

    public function destroy(Request $request) {

        $transits = Transit::find($request->id_transit);
        $transits->delete();

        $url = URL::previous();
        return redirect($url);
    }
}
