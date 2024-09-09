<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Karya;

use App\services\TripayServices;

class KaryaController extends Controller
{
    public function index()
    {
       
        $karyas = Karya::with('pemilik')->latest()->get();


         return view('karya.index', compact('karyas'));
    }

    public function show(Karya $karya)
    {

 
         return view('karya.show', compact('karya'));
    }

    public function checkout(Karya $karya)
    {

        $tripay = new TripayServices();
        $channels = $tripay->channel();



        return view('Karya.checkout', compact('karya','channels'));
    }
}
