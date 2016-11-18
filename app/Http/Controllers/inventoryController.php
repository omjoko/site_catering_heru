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
    	$inventorys = inventorys::with('ingredients.pembelian')
                        ->join('requisitions','inventorys.id_req','=','requisitions.id')
                        ->join('voyages','requisitions.id_pelayaran','=','voyages.id')
                        ->join('ingredients','inventorys.id_bahan','=','ingredients.id')
                        ->join('storages','inventorys.gudang','=','storages.id_storages')
                        ->select('inventorys.*','requisitions.id as id_req','voyages.id as id_voy','ingredients.id as id_ing','storages.id_storages as id_stor')
                        ->where('voyages.deleted_at','=',null)
                        ->where('voyages.deleted_at','=',null)
                        ->get();
        // DD($inventorys);
        $ingredients = ingredients::all();
        $storages = storages::all();
<<<<<<< HEAD
        $requisitions = requisitions::with('voyages')
                        ->join('voyages','requisitions.id_pelayaran', '=' ,'voyages.id')
                        ->select('requisitions.*','voyages.id as hole')
                        ->where(['status'=> 2,'voyages.deleted_at'=>null])
                        ->get();
=======
        $requisitions = requisitions::where('status', 2)->get();

>>>>>>> origin/master
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
