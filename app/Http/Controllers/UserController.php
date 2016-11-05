<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()	{

    	$users = DB::table('users')
                    ->get();

    	return view('user', ['users' => $users]);
    }

    public function store() {

    	$data = $request->all();

    	// DB::table('users')->insert([
     //        'name' => $data['name'],
     //        'email' => $data['email'],
     //        'password' => bcrypt($data['password']),
     //        'avatar' => $filename,
     //        'admin' => $data['admin'],
     //    ]);    

    	return redirect()->action('UserController@index');
    }

    public function update() {


    	return redirect()->action('UserController@index');
    }

    public function destroy() {


    	return redirect()->action('UserController@index');
    }
}
