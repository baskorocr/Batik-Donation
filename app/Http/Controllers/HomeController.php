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
            $query->where('status', 'paid'); // Hanya menghitung transaksi yang berstatus 'paid'
        }], 'total_amount')  // Menghitung sum dari total_amount
        ->withCount(['transactions as total_donations' => function ($query) {
            $query->where('status', 'paid'); // Hanya menghitung jumlah transaksi yang berstatus 'paid'
        }])  // Menghitung jumlah transaksi dengan status 'paid'
        ->orderBy('title', 'asc')  // Urutkan berdasarkan title secara ascending
        ->get();


       
       $totalDonator = Transaction::where('status', 'paid')->count();

       $totalAmountSum = Transaction::where('status', "paid")->sum('total_amount');
        

        return view('home', compact('karyas','totalAmountSum','totalDonator'));
    }
}
