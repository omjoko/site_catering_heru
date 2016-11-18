<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ingredients;
use App\categorys;
use App\measurements;
use App\variants;
use DB; 
use URL;

class ingredientsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function sedotData(Request $request)
    {
        $ingredients = ingredients::with('categorys')->get();
        $resep = ingredients::with('resep')->get();
        $pembelian = ingredients::with('pembelian')->get();
        $categorys = categorys::All();
        $measurements = measurements::All();        
    	return view('ingredients.ingredients', ['ingredients'=>$ingredients, 'resep'=>$resep, 'pembelian'=>$pembelian, 'categorys'=>$categorys, 'measurements'=>$measurements ]);

    }

    public function DataIngredients()
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

    public function dataVariants(Request $request)
    {
        $ingredients = ingredients::find($request->id);
        $variants = variants::with('ingredients')->where('id_bahan', $request->id)->get();
        // DD($variants);
        return view('ingredients.new-variants', ['ingredients'=>$ingredients, 'variants'=>$variants]);
    }
    public function tambahVariants(Request $request)
    {
        
        $variants = new variants;
        $variants->nama = $request->nama;
        $variants->id_bahan = $request->id_bahan;
        $variants->bahan_utama = $request->bahan_utama;
        $variants->deskripsi = $request->deskripsi;
        $variants->save();

        $url = URL::previous();
        return redirect($url);   
    }
    public function ubahVariants(Request $request)
    {
        
        $variants = variants::find($request->id_varian);
        $variants->nama = $request->nama;
        $variants->id_bahan = $request->id;
        $variants->bahan_utama = $request->bahan_utama;
        $variants->deskripsi = $request->deskripsi;
        $variants->save();

        $url = URL::previous();
        return redirect($url);
        
    }
    public function hapusVariants(Request $request)
    {
        
        $variants = variants::find($request->id_varian);
        $variants->delete();

        $url = URL::previous();
        return redirect($url);
        
    }
    public static function sedotVariants($value)
    {
        $variant = variants::with('ingredients')->where('id_bahan', $value)->get();
        $variants = $variant->toArray();
        // DD($variants);
        return $variants;
    }
}
