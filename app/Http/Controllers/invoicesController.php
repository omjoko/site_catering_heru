<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\invoices;

class invoicesController extends Controller
{
    public function sedotData(Request $request)
    {
    	$invoices = invoices::all();
    	return view('invoices.invoice', ['invoices'=>$invoices]);
    }
}
