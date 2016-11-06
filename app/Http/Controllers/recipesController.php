<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\recipes;
use App\ingredients;
use App\detail_recipes;
use URL;



class recipesController extends Controller
{
    public function dataResep(Request $request)
    {
    	$recipes = recipes::all();
    	return view('recipes.recipes', ['recipes'=>$recipes]);
    }

    public function tambah(Request $request)
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

    public function ubah(Request $request)
    {
        $recipes = recipes::find($request->id);
        $recipes->nama = $request->nama;
        $recipes->deskripsi = $request->deskripsi;
        $recipes->tipe = $request->tipe;
        $recipes->petunjuk = $request->petunjuk;
        $recipes->gambar = $request->gambar;
        $recipes->save();
        return redirect()->action('recipesController@dataResep');        
    }
    public function hapus(Request $request)
    {
        $recipes = recipes::find($request->id);
        $recipes->delete();
        return redirect()->action('recipesController@dataResep');  
    }

    public function datarecipe(Request $request)
    {
        $recipes = recipes::find($request->id);
        $reseps = ingredients::with('resep')->get();
        $detail_recipes = detail_recipes::with('recipes')->where('id_resep', $request->id)->get();        
        return view('recipes.new-ingredients-recipe', ['recipes'=>$recipes,'reseps'=>$reseps, 'detail_recipes'=>$detail_recipes]);
    }

    public function tambahRecipe(Request $request)
    {
    	$recipes = new detail_recipes;
    	$recipes->id_resep = $request->id;
    	$recipes->id_bahan = $request->id_bahan;
    	$recipes->jumlah = $request->jumlah;
    	$recipes->satuan = $request->satuan;
    	$recipes->save();

    	$url = URL::previous();
        return redirect($url);
    }

    public function ubahRecipe(Request $request)
    {
    	$recipes = detail_recipes::find($request->id_resep);
        $recipes->id_resep = $request->id;
        $recipes->id_bahan = $request->id_bahan;
        $recipes->jumlah = $request->jumlah;
        $recipes->satuan = $request->satuan;
        $recipes->save();
        
        $url = URL::previous();
        return redirect($url);
    }

    public function hapusRecipe(Request $request)
    {
    	$recipes = detail_recipes::find($request->id_resep);
        $recipes->delete();
        
        $url = URL::previous();
        return redirect($url);
    }

    public static function sedotResep($value)
    {
        $detail_recipes = detail_recipes::with('recipes')->where('id_resep', $value)->get();
        return $detail_recipes;
    }
}
