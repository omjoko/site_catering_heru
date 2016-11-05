<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class UserController extends Controller
{
    public function index()	{

    	$users = DB::table('users')
                    ->get();

    	return view('user', ['users' => $users]);
    }

    public function store() {

    	$data = $request->all();

    	DB::table('users')->insert([
            'name' => $data['name'],
            'email' => $data['username'],
            'email1' => $data['email'],
            'password' => bcrypt($data['password']),
            'telepon' => $data['telepon'],
            'no_nrp' => $data['no_nrp'],
            'no_bk' => $data['no_bk'],
            'no_sijil' => $data['no_sijil'],
            'sertifikat' => $data['sertifikat'],
            'tgl_valid' => $data['tgl_valid'],
            'privilege' => $data['privilige'],
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
