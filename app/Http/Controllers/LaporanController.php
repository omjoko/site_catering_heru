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

    	$wastes = DB::table('wastes')
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
    	$inventorys = inventorys::with('ingredients.pembelian')->get();
        $storages = storages::all();


        $view = View::make('laporan.laporanInventory', array('inventorys'=>$inventorys,'storages'=>$storages,'i' => 0))->render();

        $pdf = App::make('dompdf.wrapper');
		// set ukuran kertas dan orientasi
		$pdf->loadHTML($view)->setPaper('a4');
		// cetak
		return $pdf->stream();
    }
}
