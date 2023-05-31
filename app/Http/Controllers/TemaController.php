<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Tema;
use Illuminate\Http\Request;

class TemaController extends Controller
{
    public function index()
    {
        $temak =  Tema::all();
        return $temak;
    }

}
