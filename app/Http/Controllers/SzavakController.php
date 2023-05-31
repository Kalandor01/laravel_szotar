<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Szavak;
use App\Models\Tema;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SzavakController extends Controller
{
    public function index()
    {
        $szavak =  Szavak::all();
        return $szavak;
    }

    public function showTema($temaId)
    {
        $szavak = DB::table("szavaks as sz")
        ->where("sz.temaId", "=", $temaId)
        ->get();
        return $szavak;
    }

    public function mainView($temaId = 0)
    {
        $szavak = SzavakController::showTema($temaId);
        $temak = Tema::all();
        return view("welcome", ["szavak" => $szavak, "temak" => $temak, "aktualisTema" => $temaId]);
    }
}
