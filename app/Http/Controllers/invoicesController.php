<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\invoices;
use App\detail_invoices;
use App\vendors;
use App\requisitions;
use URL;
use App\measurements;

class invoicesController extends Controller
{
    public function __construct()
    {
        $this->middleware('isFinance');
        $this->middleware('isCaptain');
        $this->middleware('isManager');
    }
    
    public function tampil(Request $request)	{
        $invoices = invoices::with('req.voyages')
                    ->join('requisitions','invoices.id_requisitions','=','requisitions.id')
                    ->join('voyages', 'requisitions.id_pelayaran','=','voyages.id')
                    ->select('invoices.*','requisitions.id_pelayaran as id_req_voy', 'voyages.id as id_asli')
                    ->where('voyages.deleted_at',null)
                    ->get();
        // DD($invoices);
        $invens = invoices::with('vendor')->get();
        $vendors = vendors::all();
        $reqs = requisitions::with('voyages')
                        ->join('voyages','requisitions.id_pelayaran', '=' ,'voyages.id')
                        ->select('requisitions.*','voyages.id as hole')
                        ->where(['status'=> 2,'voyages.deleted_at'=>null])
                        ->get();
        return view('invoices.invoice',['invoices'=>$invoices, 'invens'=>$invens, 'vendors'=>$vendors, 'reqs'=>$reqs]);
    }

    public function tambah(Request $request) {

        $invoices = new invoices;
        $invoices->toko = $request->toko;
        $invoices->id_requisitions = $request->id_req;
        $invoices->save();

        return redirect()->action('invoicesController@tampil');
    }

    public function ubah(Request $request) {
        $invoices = invoices::find($request->id);
        $invoices->toko = $request->toko;
        $invoices->id_requisitions = $request->id_req;
        $invoices->save();

        return redirect()->action('invoicesController@tampil');
    }

    public function hapus(Request $request) {
        $invoices = invoices::find($request->id);
        $invoices->delete();

        return redirect()->action('invoicesController@tampil');

    }

    public static function sedotDetail($value)
    {
        $detail_invoices = detail_invoices::with('invoices')->where('id_invoices', $value)->get();

        return $detail_invoices;
    }

    //new-invoices

    public function tampilInvoices(Request $request)
    {
        $detail_invoices = detail_invoices::with('invoices')->where('id_invoices', $request->id)->get();
        $invoices = invoices::with('req')->where('id', $request->id)->first();
        $measurements = measurements::all();

        // DD($invoices);

        return view('invoices.new' , ['detail_invoices'=>$detail_invoices , 'invoices'=>$invoices, 'measurements'=>$measurements]);

    }

    public function tambahInvoices(Request $request)
    {
        $DI = new detail_invoices;
        $DI->nama_barang = $request->nama;
        $DI->harga = $request->harga;
        $DI->satuan = $request->satuan;
        $DI->banyak = $request->banyak;
        $DI->id_invoices = $request->id_invoices;
        $DI->save();

        $link = URL::previous();
        return redirect($link);
    }

    public function ubahInvoices(Request $request)
    {
        $DI = detail_invoices::with('invoices')->where('id_invoices', $request->id)->first();
        $DI->nama_barang = $request->nama;
        $DI->harga = $request->harga;
        $DI->satuan = $request->satuan;
        $DI->banyak = $request->banyak;
        $DI->id_invoices = $request->id_invoices;
        $DI->save();

        $link = URL::previous();
        return redirect($link);

    }

    public function hapusInvoices(Request $request)
    {
        $detail_invoices = detail_invoices::with('invoices')->where('id_invoices', $request->id)->first();
        $detail_invoices->delete();

        $link = URL::previous();
        return redirect($link);
    }


}
