<?php

namespace App\Http\Controllers;
use App\services\TripayServices;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class TransactionController extends Controller
{
    public function show($id)
    {
        $tripay = new TripayServices();
        $detailTransaction = $tripay->detailTransaction($id);



        return view('transaction.show', compact('detailTransaction'));
    }

    public function store(Request $request)
    {



        $tripay = new TripayServices();

        $transactionRequest = json_decode($tripay->requestTransaction($request->channel, $request->karya, $request->donation));


        if ($transactionRequest->success != true) {
            Alert::error('Payment Failed', $transactionRequest->message);
            return redirect()->back();
        } elseif ($transactionRequest->data->payment_name == "QRIS") {
            return redirect()->away($transactionRequest->data->checkout_url);

        } else {

            return redirect()->route('transaction.show', $transactionRequest->data->reference);

        }
    }


    public function redirect()
    {
        Alert::success('Payment status is Paid', 'have a wonderful day');

        return redirect()->route('home');
    }




}