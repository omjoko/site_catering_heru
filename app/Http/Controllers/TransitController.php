<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use App\Rute;

class TransitController extends Controller
{
    public function index()	{

        $transits = DB::table('transits')
        			->join('pelabuhans', 'transits.id_pelabuhan', '=', 'pelabuhans.id_pelabuhan')
        			->select('transits.*', 'pelabuhans.nama_pelabuhan as nama_pemberhentian')
        			->get();

        $pelabuhans = DB::table('pelabuhans')
        			->get();

        $rutes = Rute::all()->first();

    	return view('transit', ['transits' => $transits,
    							'pelabuhans' => $pelabuhans,
    							'rutes' => $rutes,
    							]);
    }

    public function store(Request $request) {

    	$data = $request->all();

    	DB::table('transits')->insert([
            'id_pelabuhan' => $data['id_pelabuhan'],
            'id_rute' => $data['id_rutes'],
            'est_transit' => $data['est_transit'],
        ]);    

    	return redirect()->action('TransitController@index');
    }

    public function update(Request $request) {

    	$data = $request->all();

        DB::table('transits')
                ->where('id_transit', $data['id'])
                ->update([
		            'est_transit' => $data['est_transit'],
                    ]);

    	return redirect()->action('TransitController@index');
    }

    public function destroy(Request $request) {

    	$id = $request->id;

        DB::table('transits')
                ->where('id_transit', $id)
                ->delete();

    	return redirect()->action('TransitController@index');
    }
}
