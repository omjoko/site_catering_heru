<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ingredients;
use App\categorys;
use App\measurements;

class ingredientsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function sedotData(Request $request)
    {
    	$ingredients = ingredients::All();
    	return view('ingredients.ingredients', ['ingredients'=>$ingredients]);
    }
    public function tambah(Request $request)
    {
    	$ingredients = new ingredients;
    	$ingredients->nama = $request->nama;
    	$ingredients->deskripsi = $request->deskripsi;
    	$ingredients->id_kategori = $request->id_kategori;
    	$ingredients->satuan_resep = $request->satuan_resep;
    	$ingredients->satuan_pembelian = $request->satuan_pembelian;
    	$ingredients->deskripsi = $request->deskripsi;
        $ingredients->save();
    }

    public function sedotKategori(Request $request)
    {
    	$categorys = categorys::All();
        return view('ingredients.categorys', ['categorys'=>$categorys]);
    }

    public function tambahKategori(Request $request)
    {
        # code...
    }

    public function sedotSatuan(Request $request)
    {
        $measurements = measurements::All();
        return view('ingredients.measurements', ['measurements'=>$measurements]);
    }

    public function TambahSatuan(Request $request)
    {
        # code...
    }

    public function sedotVarian(Request $request)
    {
        $variants = variants::All();
        return view('ingredients.variants', ['variants'=>$variants]);
    }

    public function TambahVarian(Request $request)
    {
        # code...
    }
}
