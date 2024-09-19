<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Models\transaction;

class callbackController extends Controller
{
    // Isi dengan private key anda
    protected $privateKey;

    public function __construct()
    {
        // Initialize privateKey in the constructor
        $this->privateKey = config('tripay.api_key');
    }

    public function handle(Request $request)
    {
        $callbackSignature = $request->server('HTTP_X_CALLBACK_SIGNATURE');
        $json = $request->getContent();
        $signature = hash_hmac('sha256', $json, $this->privateKey);



        $data = json_decode($json);

        if (JSON_ERROR_NONE !== json_last_error()) {
            return Response::json([
                'success' => false,
                'message' => 'Invalid data sent by tripay',
            ]);
        }

        $TransactionId = $data->merchant_ref;
        $tripayReference = $data->reference;
        $status = strtoupper((string) $data->status);




        if ($data->is_closed_payment === 1) {
            $Transaction = transaction::where('reference', $tripayReference)
                ->where('status', '=', 'UNPAID')
                ->first();



            if (!$Transaction) {
                return Response::json([
                    'success' => false,
                    'message' => 'No Transaction found or already paid: ' . $TransactionId,
                ]);
            }

            switch ($status) {
                case 'PAID':
                    $Transaction->update(['status' => 'paid']);
                    break;


                case 'EXPIRED':
                    $Transaction->update(['status' => 'EXPIRED']);
                    break;

                case 'FAILED':
                    $Transaction->update(['status' => 'FAILED']);
                    break;

                default:
                    return Response::json([
                        'success' => false,
                        'message' => 'Unrecognized payment status',
                    ]);
            }

            return Response::json(['success' => true]);
        }
    }


    public function cekPayment($id)
    {
        $data = transaction::where('reference', $id)->first();
        $status = 'unpaid';
        if ($data->status == 'paid') {
            $status = $data->status;
        }
        return Response::json(['status' => $status]);
    }
}