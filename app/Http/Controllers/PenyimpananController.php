<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;

class PenyimpananController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()	{

        $penyimpanans = DB::table('penyimpanans')
                    ->get();

    	return view('penyimpanan', ['penyimpanans' => $penyimpanans]);
    }

    public function store(Request $request) {

    	$data = $request->all();

    	DB::table('penyimpanans')->insert([
            'nama_tempat' => $data['nama_tempat'],
        ]);    

    	return redirect()->action('PenyimpananController@index');
    }

    public function update(Request $request) {

    	$data = $request->all();

        DB::table('penyimpanans')
                ->where('id_penyimpanan', $data['id'])
                ->update([
                    'nama_tempat' => $data['nama_tempat'],
                    ]);

    	return redirect()->action('PenyimpananController@index');
    }

    public function destroy(Request $request) {

    	$id = $request->id;

        DB::table('penyimpanans')
                ->where('id_penyimpanan', $id)
                ->delete();

    	return redirect()->action('PenyimpananController@index');
    }
}
