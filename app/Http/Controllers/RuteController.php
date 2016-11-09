<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\pelabuhans;
use App\Transit;
use App\Rute;

class RuteController extends Controller
{

        public function __construct()
    {
        $this->middleware('auth');
    }

    public static function sedotTransit($value)
    {
        $transits = Transit::with('rutes')->where('id_rute', $value)->get();
        return $transits;
    }

    public function index(Request $request)	{

        $rute = Rute::all();
        $pelabuhans = pelabuhans::all();
        $transits = Transit::all();

    	return view('rute', ['rutes' => $rute, 
    						 'transits' => $transits, 
    						 'pelabuhans' => $pelabuhans
    						]);
    }

    public function store(Request $request) {

        $rute = new Rute;
        $rute->asal = $request->asal;
        $rute->tujuan = $request->tujuan;
        $rute->est_rute = $request->est_rute;
        $rute->save();

    	return redirect()->action('RuteController@index');
    }

    public function update(Request $request) {

        $rute = Rute::find($request->id);
        $rute->asal = $request->asal;
        $rute->tujuan = $request->tujuan;
        $rute->est_rute = $request->est_rute;
        $rute->save();

    	return redirect()->action('RuteController@index');
    }

    public function destroy(Request $request) {

        $rute = Rute::find($request->id);
        $rute->delete();

    	return redirect()->action('RuteController@index');
    }
}
