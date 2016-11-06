<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\recipes;


class recipesController extends Controller
{
    public function dataResep(Request $request)
    {
    	$recipes = recipes::all();
    	return view('recipes.recipes', ['recipes'=>$recipes]);
    }

    public function databaru(Request $request)
    {
    	return view('recipes.new');	
    }

    public function tambahResep(Request $request)
    {
    	$recipes = new recipes;
    	$recipes->nama = $request->nama;
    	$recipes->deskripsi = $request->deskripsi;
    	$recipes->tipe = $request->tipe;
    	$recipes->petunjuk = $request->petunjuk;
    	$recipes->gambar = $request->gambar;
    	$recipes->save();
    	return redirect()->action('recipesController@dataResep');
    }

    public function ubahResep(Request $request)
    {
    	
    }

    public function hapusResep(Request $request)
    {
    	
    }
}
