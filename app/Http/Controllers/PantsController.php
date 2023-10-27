<?php

namespace App\Http\Controllers;

use App\Models\Kacamata;
use App\Models\MakananSehat;
use App\Models\MinumanSehat;
use App\Models\Topi;
use App\Models\Trousers;
use Illuminate\Http\Request;

class PantsController extends Controller
{
    //
    public function index()
    {
        $trouser = Trousers::paginate(4);
        $minumans = MinumanSehat::all();
        $makanans = MakananSehat::all();
        return view('userMakanan.index',compact('trouser','minumans','makanans'));
    }
    public function makananberat($id)
    {
        $makanans = MakananSehat::where('id',$id)->first();
        return view('userMakanan.detailmakanan',compact('makanans'));

    }
    public function minuman($id)
    {
        $minumans = MinumanSehat::where('id',$id)->first();
        return view('userMakanan.detailminuman',compact('minumans'));

    }
}
