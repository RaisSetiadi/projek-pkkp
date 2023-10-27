<?php

namespace App\Http\Controllers;

use App\Models\Aksesosrie;
use App\Models\Elektronik;
use App\Models\Kacamata;
use App\Models\Kendaraan;
use App\Models\Olahraga;
use App\Models\Topi;
use App\Models\Sneakers;
use Illuminate\Http\Request;

class PerhiasanController extends Controller
{
    //
    public function index()
    {
        $aksesoris = Aksesosrie::paginate(4);
        $kacamatas = Kacamata::paginate(4);
        $topis = Topi::all();
        $elektroniks = Elektronik::all();
        $olahragas = Olahraga::all();
        $kendaraans = Kendaraan::all();
        return view('userBarangbekas.index', compact('kacamatas', 'topis', 'aksesoris', 'elektroniks', 'olahragas', 'kendaraans'));
    }
}
