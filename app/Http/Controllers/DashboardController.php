<?php

namespace App\Http\Controllers;
use App\Models\Karya;

class DashboardController extends Controller
{
    public function index()
    {
        $karyas = Karya::where('pemilik', auth()->id())->get();

        return view('dashboard', compact('karyas'));
    }
}