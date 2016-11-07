<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\recipes;
use App\ingredients;
use App\menus;
use App\categorys;


class menusController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function sedotDataMenu(Request $request)
    {
    	$menus = menus::all();
    	$menu_pembukas = recipes::where('tipe', 0)->get();
    	$menu_utamas = recipes::where('tipe', 1)->get();
    	$menu_penutups = recipes::where('tipe', 2)->get();
    	$minumans = recipes::where('tipe', 3)->get();
    	$id_minuman = categorys::where('nama', 'like', '%minuman%')->first();
    	$minuman_bahan = ingredients::with('categorys')->where('id_kategori' , $id_minuman->id)->get();
    	// DD($minuman_bahan);
    	return view('menus.menu', ['menus'=>$menus, 'menu_pembukas'=>$menu_pembukas, 'menu_utamas'=>$menu_utamas, 'menu_penutups'=>$menu_penutups, 'minumans'=>$minumans, 'minuman_bahan'=>$minuman_bahan]);
    }

    public function tambah(Request $request)
    {
    	$menu = new menus;
    	$menu->nama = $request->nama;
    	$menu->tipe = $request->tipe;
    	$menu->menu_pembuka = $request->menu_pembuka;
    	$menu->menu_utama = $request->menu_utama;
    	$menu->menu_penutup = $request->menu_penutup;
    	$menu->minuman = $request->minuman;
    	$menu->save();
    	return redirect()->action('menusController@sedotDataMenu');
    }

	public function ubah(Request $request)
    {
    	$menu = menus::find($request->id);
    	$menu->nama = $request->nama;
    	$menu->tipe = $request->tipe;
    	$menu->menu_pembuka = $request->menu_pembuka;
    	$menu->menu_utama = $request->menu_utama;
    	$menu->menu_penutup = $request->menu_penutup;
    	$menu->minuman = $request->minuman;
    	$menu->save();
    	return redirect()->action('menusController@sedotDataMenu');
    }


	public function hapus(Request $request)
    {
    	$menu = menus::find($request->id);
    	$menu->delete();
    	return redirect()->action('menusController@sedotDataMenu');
    }
}
