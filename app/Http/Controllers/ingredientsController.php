<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ingredients;

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
    }

    public function FunctionName(Request $request)
    {
    	# code...
    }
}
