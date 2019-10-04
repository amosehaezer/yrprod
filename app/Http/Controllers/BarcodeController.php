<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class BarcodeController extends Controller
{
    public function show($id)
    {
        $barcode = User::find($id);
        // $barcode = auth()->id();
        return view('member.barcode', ['barcode' =>$barcode]);
    }
}
