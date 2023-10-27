<?php

namespace App\Http\Controllers;

use App\Models\Sneakers;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class SepatuController extends Controller
{
    //
    public function index()
    {
        $sneaker = Sneakers::paginate(5);
        return view('sepatu.index',compact('sneaker'));
    }
   
}
