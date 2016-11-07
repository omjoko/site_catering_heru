<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;

class RuteController extends Controller
{
    public function index()	{

        $rutes = DB::table('rutes')
                    ->get();

        $transits = DB::table('transits')
        			->join('pelabuhans', 'transits.id_pelabuhan', '=', 'pelabuhans.id_pelabuhan')
        			->select('transits.*', 'pelabuhans.nama_pelabuhan as nama_pelabuhan')
        			->get();

        $pelabuhans = DB::table('pelabuhans')
        			->get();

    	return view('rute', ['rutes' => $rutes, 
    						 'transits' => $transits, 
    						 'pelabuhans' => $pelabuhans,
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
