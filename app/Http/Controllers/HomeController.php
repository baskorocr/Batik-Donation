<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Karya;
use App\Models\Transaction;

class HomeController extends Controller
{
    public function index()
    {
  
      
        $karyas = Karya::withSum(['transactions' => function ($query) {
            $query->where('status', 'paid'); // Filter transaksi yang statusnya 'paid'
        }], 'total_amount')
        ->orderBy('title', 'asc')  // Urutkan berdasarkan title secara ascending
        ->get();



       $totalAmountSum = Transaction::where('status', "paid")->sum('total_amount');
        

        return view('home', compact('karyas','totalAmountSum'));
    }
}
