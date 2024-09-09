<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Karya;
class HomeController extends Controller
{
    public function index()
    {
  
        $karyas = Karya::with('user')->latest()->get();

        return view('home', compact('karyas'));
    }
}
