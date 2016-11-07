<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;

class WasteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()	{

    	$wastes = DB::table('wastes')
                    ->get();

    	return view('waste', ['wastes' => $wastes]);
    }

    public function store(Request $request) {

    	$data = $request->all();

    	DB::table('wastes')->insert([
            'nama_sampah' => $data['nama_sampah'],
            'jenis_sampah' => $data['jenis_sampah'],
            'berat' => $data['berat']
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
		            'berat' => $data['berat']
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
