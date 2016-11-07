<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use App\Rute;
use App\Transit;

class RuteController extends Controller
{
    public function index(Request $request)	{

        $rutes = DB::table('rutes')
                    ->get();

        $transits = DB::table('transits')
        			->join('rutes', 'transits.id_rute', '=', 'rutes.id_rute')
        			->select('transits.*')
        			->where('rutes.id_rute', '=', $request->id)
        			->get();

        $pelabuhans = DB::table('pelabuhans')
        			->get();

        // $rutes1 = Rute::find($request->id);
        // $transits = Transit::with('rutes')->where('id_rute', $request->id)->get();

    	return view('rute', ['rutes' => $rutes, 
    						 'transits' => $transits, 
    						 'pelabuhans' => $pelabuhans
    						]);
    }

    public function store(Request $request) {

    	$data = $request->all();

		DB::table('rutes')->insert([
            'asal' => $data['id_pelabuhan0'],
            'tujuan' => $data['id_pelabuhan1'],
            'est_rute' => $data['est_rute'],
        ]);    

    	return redirect()->action('RuteController@index');
    }

    public function update(Request $request) {

    	$data = $request->all();

        DB::table('rutes')
                ->where('id_rute', $data['id'])
                ->update([
		            'est_rute' => $data['est_rute'],
                    ]);

    	return redirect()->action('RuteController@index');
    }

    public function destroy(Request $request) {

    	$id = $request->id;

        DB::table('rutes')
                ->where('id_rute', $id)
                ->delete();

    	return redirect()->action('RuteController@index');
    }
}
