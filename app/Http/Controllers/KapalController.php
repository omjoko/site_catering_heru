<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use URL;
use storages;

class KapalController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()	{

    	$kapals = DB::table('kapals')->get();

    	return view('kapal', ['kapals' => $kapals]);
    }

    public function store(Request $request) {

    	$data = $request->all();

    	DB::table('kapals')->insert([
            'nama_kapal' => $data['nama_kapal'],
            'tipe_kapal' => $data['tipe_kapal'],
            'no_imo' => $data['no_imo'],
            'kapasitas' => $data['kapasitas'],
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


    public static function storageData($value)
    {
        $storages = DB::table('storages')->join('kapals','storages.id_kapal','=','kapals.id')->where('id_kapal', $value)->get();
        return $storages;
        
    }
    public function sedotStorages(Request $request)
    {
        $kapals = DB::table('kapals')->where('id', $request->id)->first();
        $storages = DB::table('storages')->join('kapals','storages.id_kapal','=','kapals.id')->where('id_kapal', $request->id)->get();
        // DD($storages);
        return view('storages',['kapals'=>$kapals,'storages'=>$storages]);
    }

    public function tambahStorages(Request $request)
    {
        $data = $request->all();
        // DD($data);
        DB::table('storages')->insert([
            'nama' => $data['nama_kapal'],
            'tipe' => $data['tipe'],
            'id_kapal' => $data['id'],
        ]);    

        $url = URL::previous();
        return redirect($url);   
    }

    public function hapusStorages(Request $request)
    {
        $data = $request->all();

        DB::table('storages')
        ->where('id_storages',$data['id_storages'])
        ->delete();

        $url = URL::previous();
        return redirect($url);   
    }

    public function ubahStorages(Request $request)
    {
        $data = $request->all();

        DB::table('storages')
        ->where('id_storages',$data['id_storages'])
        ->update([
            'nama' => $data['nama_kapal'],
            'tipe' => $data['tipe'],
            'id_kapal' => $data['id'],
        ]);   

        $url = URL::previous();
        return redirect($url);   
    }
}
