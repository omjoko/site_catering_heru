<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\inventorys;

class inventoryController extends Controller
{
    public function tampil(Request $request)
    {
    	$inventorys = inventorys::all();
    	return view();
    }

    public function tambah(Request $$request)
    {
    	$inventorys = new inventorys;
    	$inventorys->id_bahan = $request->id_bahan;
    	$inventorys->jumlah = $request->jumlah;
    	$inventorys->save();
    }

    public function ubah(Request $request)
    {
    	$inventorys = inventorys::find($request->id);
    	$inventorys->id_bahan = $request->id_bahan;
    	$inventorys->jumlah = $request->jumlah;
    	$inventorys->save();
    }

    public function hapus(Request $request)
    {
    	$inventorys = inventorys::find($request->id);
    	$inventorys->delete();
    }
}
