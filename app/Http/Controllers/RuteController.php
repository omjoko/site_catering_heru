<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;

class RuteController extends Controller
{
    public function index()	{

        $rutes = DB::table('rutes')
    				->join('pelabuhans', 'rutes.id_pelabuhan', '=', 'pelabuhans.id_pelabuhan')
    				->join('transits', 'rutes.id_transit', '=', 'transits.id_transit')
                    ->select('rutes.*', 'pelabuhans.nama_pelabuhan as nama_pelabuhan', 'transits.est_transit as est_transit')
                    ->get();

        $transits = DB::table('transits')
        			->join('pelabuhans', 'transits.id_pelabuhan', '=', 'pelabuhans.id_pelabuhan')
        			->select('transits.*', 'pelabuhans.nama_pelabuhan as nama_pelabuhan')
        			->get();

    	return view('rute', ['rutes' => $rutes, 'transits' => $transits]);
    }

    public function store(Request $request) {

    	$data = $request->all();

    	DB::table('rutes')->insert([
            'id_pelabuhan' => $data['id_pelabuhan'],
            'id_transit' => $data['id_transit'],
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
