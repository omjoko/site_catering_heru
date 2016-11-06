<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;

class PelabuhanController extends Controller
{
    public function index()	{

    	$pelabuhans = DB::table('pelabuhans')
    				->get();

    	// $kapals = DB::table('kapals')
    	// 			->join('penyimpanans', 'kapals.id_penyimpanan', '=', 'penyimpanans.id_penyimpanan')
     //                ->select('kapals.*', 'penyimpanans.nama_tempat as nama_tempat')
     //                ->get();

     //    $penyimpanans = DB::table('penyimpanans')
     //                ->get();

    	return view('pelabuhan', ['pelabuhans' => $pelabuhans]);
    }

    public function store(Request $request) {

    	$data = $request->all();

    	DB::table('pelabuhans')->insert([
            'nama_pelabuhan' => $data['nama_pelabuhan'],
            'alamat' => $data['alamat'],
            'telepon' => $data['telepon'],
            'kota' => $data['kota'],
        ]);    

    	return redirect()->action('PelabuhanController@index');
    }

    public function update(Request $request) {

    	$data = $request->all();

        DB::table('pelabuhans')
                ->where('id_pelabuhan', $data['id'])
                ->update([
                    'nama_pelabuhan' => $data['nama_pelabuhan'],
		            'alamat' => $data['alamat'],
		            'telepon' => $data['telepon'],
		            'kota' => $data['kota'],
                    ]);

    	return redirect()->action('PelabuhanController@index');
    }

    public function destroy(Request $request) {

    	$id = $request->id;

        DB::table('pelabuhans')
                ->where('id_pelabuhan', $id)
                ->delete();

    	return redirect()->action('PelabuhanController@index');
    }
}
