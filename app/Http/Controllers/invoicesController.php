<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\invoices;
use DB;

class invoicesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()	{

    	$invoices = DB::table('invoices')
                    ->get();

    	return view('invoices.invoice', ['invoices' => $invoices]);
    }

    public function store(Request $request) {

    	$data = $request->all();

    	DB::table('invoices')->insert([
            'toko' => $data['toko'],
            'id_requisitions' => $data['id_requisitions'],
        ]);    

    	return redirect()->action('UserController@index');
    }

    public function update(Request $request) {

    	$data = $request->all();

        DB::table('users')
                ->where('id', $data['id'])
                ->update([
                    'toko' => $data['toko'],
            		'id_requisitions' => $data['id_requisitions'],
                    ]);

    	return redirect()->action('UserController@index');
    }

    public function destroy(Request $request) {

    	$id = $request->id;

        DB::table('users')
                ->where('id', $id)
                ->delete();

    	return redirect()->action('UserController@index');
    }
}
