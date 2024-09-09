<?php

namespace App\Http\Controllers;
use App\services\TripayServices;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function show()
    {
         return view('transaction.show');
    }

    public function store(Request $request){
        

        $tripay = new TripayServices();

        $transactionRequest = $tripay->requestTransaction($request->channel, $request->karya, $request->donation);
        

        dd($transactionRequest);
    }

}
