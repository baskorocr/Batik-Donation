<?php

namespace App\Http\Controllers;
use App\services\TripayServices;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\transaction;


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
        } else {
            $this->createTransaction($request->id, $transactionRequest->data->amount, $transactionRequest->data->reference, $transactionRequest->data->merchant_ref);
            return redirect()->route('transaction.show', $transactionRequest->data->reference);

        }
    }

    public function createTransaction($karya, $total, $reference, $merchant)
    {

        transaction::create([
            'karya_id' => (int) $karya,
            'total_amount' => $total,
            'reference' => $reference,
            'merchant_reference' => $merchant,

        ]);
    }


    public function redirect($message)
    {
        if ($message == "success") {
            Alert::success('Payment status is Paid', 'Good luck in the painting batik competition');

        }

        return redirect()->route('home');
    }



}