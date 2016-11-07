<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;

class KapalController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()	{

    	$kapals = DB::table('kapals')
    				->join('penyimpanans', 'kapals.id_penyimpanan', '=', 'penyimpanans.id_penyimpanan')
                    ->select('kapals.*', 'penyimpanans.nama_tempat as nama_tempat')
                    ->get();

        $penyimpanans = DB::table('penyimpanans')
                    ->get();

    	return view('kapal', ['kapals' => $kapals, 'penyimpanans' => $penyimpanans]);
    }

    public function store(Request $request) {

    	$data = $request->all();

    	DB::table('kapals')->insert([
            'nama_kapal' => $data['nama_kapal'],
            'tipe_kapal' => $data['tipe_kapal'],
            'no_imo' => $data['no_imo'],
            'kapasitas' => $data['kapasitas'],
            'id_penyimpanan' => $data['id_penyimpanan'],
        ]);    

    	return redirect()->action('KapalController@index');
    }

    public function update(Request $request) {

    	$data = $request->all();

        DB::table('kapals')
                ->where('id', $data['id'])
                ->update([
                    'nama_kapal' => $data['nama_kapal'],
		            'tipe_kapal' => $data['tipe_kapal'],
		            'no_imo' => $data['no_imo'],
		            'kapasitas' => $data['kapasitas'],
                    ]);

    	return redirect()->action('KapalController@index');
    }

    public function destroy(Request $request) {

    	$id = $request->id;

        DB::table('kapals')
                ->where('id', $id)
                ->delete();

    	return redirect()->action('KapalController@index');
    }
}
