<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;

class UserController extends Controller
{
    public function index()	{

    	$users = DB::table('users')
                    ->get();

    	return view('user', ['users' => $users]);
    }

    public function store(Request $request) {

    	$data = $request->all();

    	DB::table('users')->insert([
            'name' => $data['name'],
            'email' => $data['email'],
            'email1' => $data['email1'],
            'password' => bcrypt($data['password']),
            'telepon' => $data['telepon'],
            'no_nrp' => $data['no_nrp'],
            'no_bk' => $data['no_bk'],
            'no_sijil' => $data['no_sijil'],
            'sertifikat' => $data['sertifikat'],
            'tgl_valid' => $data['tgl_valid'],
            'privilege' => $data['privilege'],
        ]);    

    	return redirect()->action('UserController@index');
    }

    public function update() {


    	return redirect()->action('UserController@index');
    }

    public function destroy() {


    	return redirect()->action('UserController@index');
    }
}
