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

        $counts = DB::table('users')
                    ->select(DB::raw('count(privilege) as privilege_count'))
                    ->where('privilege', 5)
                    ->first();

    	return view('user', ['users' => $users, 'counts' => $counts]);
    }

    public function store(Request $request) {

    	$data = $request->all();

        $requestDate = $data['tgl_valid'];
        $newDate = date("Y-m-d", strtotime($requestDate));

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
            'tgl_valid' => $newDate,
            'privilege' => $data['privilege'],
        ]);    

    	return redirect()->action('UserController@index');
    }

    public function update(Request $request) {

    	$data = $request->all();

    	if($request->has('password')) {
            $pass = bcrypt($data['password']);
        } else {
            $oldpass = DB::table('users')
                        ->where('id', $data['id'])
                        ->get();
            foreach ($oldpass as $oldpass) {
                $pass = $oldpass->password;
            }
        }

        DB::table('users')
                ->where('id', $data['id'])
                ->update([
                    'name' => $data['name'],
		            'email' => $data['email'],
		            'email1' => $data['email1'],
                    'password' => $pass,
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

    public function destroy(Request $request) {

    	$id = $request->id;

        DB::table('users')
                ->where('id', $id)
                ->delete();

    	return redirect()->action('UserController@index');
    }
}
