<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ingredients;

class ingredientsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function sedotData($value='')
    {
    	$ingredients = ingredients::All();
    	return view('ingredients', ['ingredients'=>$ingredients]);
    }
}
