<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;

class VendorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()	{

    	$vendors = DB::table('vendors')
                    ->get();

    	return view('vendor', ['vendors' => $vendors]);
    }

    public function store(Request $request) {

    	$data = $request->all();

    	DB::table('vendors')->insert([
            'nama_vendor' => $data['nama_vendor'],
            'alamat' => $data['alamat'],
            'kode_pos' => $data['kode_pos'],
            'telepon' => $data['telepon'],
            'kota' => $data['kota'],
            'perwakilan' => $data['perwakilan'],
            'tipe_pembayaran' => $data['tipe_pembayaran'],
            'no_rek' => $data['no_rek'],
        ]);    

    	return redirect()->action('VendorController@index');
    }

    public function update(Request $request) {

    	$data = $request->all();

        DB::table('vendors')
                ->where('id', $data['id'])
                ->update([
                    'nama_vendor' => $data['nama_vendor'],
		            'alamat' => $data['alamat'],
		            'kode_pos' => $data['kode_pos'],
		            'telepon' => $data['telepon'],
		            'kota' => $data['kota'],
		            'perwakilan' => $data['perwakilan'],
		            'tipe_pembayaran' => $data['tipe_pembayaran'],
		            'no_rek' => $data['no_rek'],
                    ]);

    	return redirect()->action('VendorController@index');
    }

    public function destroy(Request $request) {

    	$id = $request->id;

        DB::table('vendors')
                ->where('id', $id)
                ->delete();

    	return redirect()->action('VendorController@index');
    }
}
