<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use View;
use App;
use PDF;
use DB;

use App\requisitions;
use App\vendors;
use App\inventorys;
use App\storages;
use App\Waste;



class LaporanController extends Controller
{
    public function laporanRequisition(Request $request){

    	$requisitions = requisitions::with('vendors')->where('id', $request->id)->get();
		$vendors = vendors::all();

		// mengarahkan view pada file laporanRequisition.blade.php
		$view = View::make('laporan.laporanRequisition', array('requisitions'=>$requisitions,
															   'vendors'=>$vendors,
															   'i' => 0))->render(); 
		// panggil fungsi dompdf
		$pdf = App::make('dompdf.wrapper');
		// set ukuran kertas dan orientasi
		$pdf->loadHTML($view)->setPaper('a4');
		// cetak
		return $pdf->stream();
    }

    public function laporanWaste(Request $request){

    	$wastes = Waste::with('voyages.kapals')
                    ->join('voyages', 'wastes.id_voyages', '=' , 'voyages.id')
                    ->where("voyages.deleted_at", null)
                    ->select('wastes.*','voyages.id as hole')
                    ->get();

        $voyages = DB::table('voyages')
        			->join('rutes', 'voyages.id_rute', '=', 'rutes.id')
        			->join('kapals', 'voyages.id_kapal', '=', 'kapals.id')
        			->select('voyages.*', 'rutes.asal as asal', 'rutes.tujuan as tujuan', 'kapals.nama_kapal as nama_kapal')
        			->get();

        $pelabuhans = DB::table('pelabuhans')
        			->get();

		// mengarahkan view pada file laporanRequisition.blade.php
		$view = View::make('laporan.laporanWaste', array('wastes' => $wastes,
							    						 'voyages' => $voyages,
							    						 'pelabuhans' => $pelabuhans,
													   	 'i' => 0))->render(); 
		// panggil fungsi dompdf
		$pdf = App::make('dompdf.wrapper');
		// set ukuran kertas dan orientasi
		$pdf->loadHTML($view)->setPaper('a4');
		// cetak
		return $pdf->stream();
    }

    public function laporanInventory(Request $request)
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
        $storages = storages::all();


        $view = View::make('laporan.laporanInventory', array('inventorys'=>$inventorys,'storages'=>$storages,'i' => 0))->render();

        $pdf = App::make('dompdf.wrapper');
		// set ukuran kertas dan orientasi
		$pdf->loadHTML($view)->setPaper('a4');
		// cetak
		return $pdf->stream();
    }
}
