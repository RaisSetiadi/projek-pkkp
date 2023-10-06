<?php

namespace App\Http\Controllers;

use App\Models\Kacamata;
use App\Models\Topi;
use App\Models\Trousers;
use Illuminate\Http\Request;

class PantsController extends Controller
{
    //
    public function index()
    {
        $trouser = Trousers::paginate(4);
        $kacamatas = Kacamata::all();
        $topis = Topi::all();
        return view('usertrousers.index',compact('trouser','kacamatas','topis'));
    }
}
