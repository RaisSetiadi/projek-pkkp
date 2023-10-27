<?php

namespace App\Http\Controllers;

use App\Models\Minuman;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class MinumanController extends Controller
{
    //
    public function index(): View
    {
        $minumans= Minuman::all();
        return view('minuman.index',compact('minumans'));
    }
    
}
