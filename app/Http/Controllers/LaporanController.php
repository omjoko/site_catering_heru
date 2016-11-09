<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use View;
use App;
use PDF;

use App\requisitions;
use App\vendors;

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
}
