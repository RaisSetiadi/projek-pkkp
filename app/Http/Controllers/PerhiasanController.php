<?php

namespace App\Http\Controllers;

use App\Models\Kacamata;
use App\Models\Topi;
use App\Models\Sneakers;
use Illuminate\Http\Request;

class PerhiasanController extends Controller
{
    //
    public function index()
    {
    $kacamatas= Kacamata::paginate(4);
    $topis = Topi::all();
    return view('useraksesoris.index',compact('kacamatas','topis'));

    }
}
