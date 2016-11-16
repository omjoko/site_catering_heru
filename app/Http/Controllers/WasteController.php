<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use App\Waste;

class WasteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()	{

    	$wastes = Waste::with('voyages.kapals')
                    ->join('voyages', 'wastes.id_voyages', '=' , 'voyages.id')
                    ->where("voyages.deleted_at", null)
                    ->select('wastes.*','voyages.id as hole')
                    ->get();
                    // DD($wastes);

        $voyages = DB::table('voyages')
        			->join('rutes', 'voyages.id_rute', '=', 'rutes.id')
        			->join('kapals', 'voyages.id_kapal', '=', 'kapals.id')
        			->select('voyages.*', 'rutes.asal as asal', 'rutes.tujuan as tujuan', 'kapals.nama_kapal as nama_kapal')
                    ->where('deleted_at' , null)
        			->get();

        $pelabuhans = DB::table('pelabuhans')
        			->get();

    	return view('waste', ['wastes' => $wastes,
    						  'voyages' => $voyages,
    						  'pelabuhans' => $pelabuhans]);
    }

    public function store(Request $request) {

    	$data = $request->all();

    	DB::table('wastes')->insert([
            'nama_sampah' => $data['nama_sampah'],
            'jenis_sampah' => $data['jenis_sampah'],
            'berat' => $data['berat'],
            'id_voyages' => $data['id_voyages'],
        ]);   

    	return redirect()->action('WasteController@index');
    }

    public function update(Request $request) {

    	$data = $request->all();

        DB::table('wastes')
                ->where('id', $data['id'])
                ->update([
                    'nama_sampah' => $data['nama_sampah'],
		            'jenis_sampah' => $data['jenis_sampah'],
		            'berat' => $data['berat'],
		            'id_voyages' => $data['id_voyages'],
                    ]);

    	return redirect()->action('WasteController@index');
    }

    public function destroy(Request $request) {

    	$id = $request->id;

        DB::table('wastes')
                ->where('id', $id)
                ->delete();

    	return redirect()->action('WasteController@index');
    }
}
