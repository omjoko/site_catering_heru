<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\inventorys;
use App\ingredients;
use App\requisitions;

class inventoryController extends Controller
{
    public function tampil(Request $request)
    {
    	$inventorys = inventorys::with('ingredients.pembelian')->get();
        $ingredients = ingredients::all();
        $requisitions = requisitions::all();
        // DD($inventorys);
    	return view('inventorys.inventory', ['inventorys'=>$inventorys,'requisitions'=>$requisitions,'ingredients'=>$ingredients]);
    }

    public function tambah(Request $request)
    {
    	$inventorys = new inventorys;
    	$inventorys->id_bahan = $request->id_bahan;
    	$inventorys->jumlah = $request->jumlah;
        $inventorys->id_req = $request->id_req;
    	$inventorys->save();

        return redirect()->action('inventoryController@tampil');
    }

    public function ubah(Request $request)
    {
    	$inventorys = inventorys::find($request->id);
    	$inventorys->id_bahan = $request->id_bahan;
    	$inventorys->jumlah = $request->jumlah;
        $inventorys->id_req = $request->id_req;
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
