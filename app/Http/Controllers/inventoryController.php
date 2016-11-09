<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\inventorys;
use App\ingredients;
use App\requisitions;
use App\storages;

class inventoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('isCaptain');
    }

    public function tampil(Request $request)
    {
    	$inventorys = inventorys::with('ingredients.pembelian')->get();
        $ingredients = ingredients::all();
        $storages = storages::all();
        $requisitions = requisitions::where('status', 2)->get();

        // DD($requisitions);
    	return view('inventorys.inventory', ['inventorys'=>$inventorys,'requisitions'=>$requisitions,'ingredients'=>$ingredients, 'storages'=>$storages]);
    }

    public function tambah(Request $request)
    {
    	$inventorys = new inventorys;
    	$inventorys->id_bahan = $request->id_bahan;
    	$inventorys->jumlah = $request->jumlah;
        $inventorys->id_req = $request->id_req;
        $inventorys->gudang = $request->gudang;
    	$inventorys->save();

        return redirect()->action('inventoryController@tampil');
    }

    public function ubah(Request $request)
    {
    	$inventorys = inventorys::find($request->id);
    	$inventorys->id_bahan = $request->id_bahan;
    	$inventorys->jumlah = $request->jumlah;
        $inventorys->id_req = $request->id_req;
        $inventorys->gudang = $request->gudang;
    	$inventorys->save();

        return redirect()->action('inventoryController@tampil');

    }

    public function hapus(Request $request)
    {
    	$inventorys = inventorys::find($request->id);
    	$inventorys->delete();

        return redirect()->action('inventoryController@tampil');

    }
}
