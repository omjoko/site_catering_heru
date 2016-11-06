<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ingredients;
use App\categorys;
use App\measurements;
use DB; 

class ingredientsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function sedotData(Request $request)
    {
        // $ingredients = DB::select( DB::raw("SELECT ingredients.id, ingredients.nama, satuan_resep, satuan_pembelian, categorys.nama as kategori, deskripsi FROM `ingredients`, `categorys` WHERE ingredients.id_kategori = categorys.id AND ingredients.deleted_at > now() and ingredients.deleted_at = null"));
        $ingredients = ingredients::with('categorys')->get();
        $resep = ingredients::with('resep')->get();
        $pembelian = ingredients::with('pembelian')->get();        
        // DD($pembelian);
    	return view('ingredients.ingredients', ['ingredients'=>$ingredients, 'resep'=>$resep, 'pembelian'=>$pembelian ]);

    }

    public function DataIngredients($value='')
    {
        $categorys = categorys::All();
        $measurements = measurements::All();
        return view('ingredients.new', ['categorys'=>$categorys ,'measurements'=>$measurements]);

    }
    public function tambah(Request $request)
    {
    	$ingredients = new ingredients;
    	$ingredients->nama = $request->nama;
    	$ingredients->deskripsi = $request->deskripsi;
    	$ingredients->id_kategori = $request->id_kategori;
    	$ingredients->satuan_resep = $request->satuan_resep;
    	$ingredients->satuan_pembelian = $request->satuan_pembelian;
        $ingredients->save();

        return redirect()->action('ingredientsController@sedotData');
    }

        public function ubah(Request $request)
    {
        $ingredients = ingredients::find($request->id);
        $ingredients->nama = $request->nama;
        $ingredients->deskripsi = $request->deskripsi;
        $ingredients->id_kategori = $request->id_kategori;
        $ingredients->satuan_resep = $request->satuan_resep;
        $ingredients->satuan_pembelian = $request->satuan_pembelian;
        $ingredients->save();
        return redirect()->action('ingredientsController@sedotData');
    }
    public function hapus(Request $request)
    {
        $ingredients = ingredients::find($request->id);
        // DD($ingredients);
        $ingredients->delete();
        return redirect()->action('ingredientsController@sedotData');
    }

    public function sedotKategori(Request $request)
    {
    	$categorys = categorys::All();
        return view('ingredients.category', ['categorys'=>$categorys]);
    }

    public function tambahKategori(Request $request)
    {
        $category = new categorys;
        $category->nama = $request->nama;
        $category->save();
        return redirect()->action('ingredientsController@sedotKategori');
    }

    public function ubahKategori(Request $request)
    {
        $category = categorys::find($request->id);
        $category->nama = $request->nama;
        $category->save();
        return redirect()->action('ingredientsController@sedotKategori');
    }
    public function hapusKategori(Request $request)
    {
        $category = categorys::find($request->id);
        $category->delete();
        return redirect()->action('ingredientsController@sedotKategori');
    }

    public function sedotSatuan(Request $request)
    {
        $measurements = measurements::All();
        return view('ingredients.measurements', ['measurements'=>$measurements]);
    }

    
    public function tambahSatuan(Request $request)
    {
        $measurements = new measurements;
        $measurements->satuan = $request->satuan;
        $measurements->save();
        return redirect()->action('ingredientsController@sedotSatuan');
    }

    public function ubahSatuan(Request $request)
    {
        $measurements = measurements::find($request->id);
        $measurements->satuan = $request->satuan;
        $measurements->save();
        return redirect()->action('ingredientsController@sedotSatuan');
    }
    public function hapusSatuan(Request $request)
    {
        $measurements = measurements::find($request->id);
        $measurements->delete();
        return redirect()->action('ingredientsController@sedotSatuan');
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
