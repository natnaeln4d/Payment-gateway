<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Chapa\Chapa\Facades\Chapa as Chapa;

class PaymentController extends Controller
{
/**
     * Initialize Rave payment process
     * @return void
     */
    protected $reference;

    public function __construct(){
        $this->reference = Chapa::generateReference();

    }
    public function initialize()
    {
        //This generates a payment reference
        $reference = $this->reference;


        // Enter the details of the payment
        $data = [

            'amount' => 2000,
            'email' => 'natnaeln4d@gmail.com',
            'tx_ref' => $reference,
            'currency' => "ETB",
            'callback_url' => route('callback',[$reference]),
            'first_name' => "Natnael",
            'last_name' => "Getachew",
            "customization" => [
                "title" => 'Chapa Laravel Test',
                "description" => "I amma testing this"
            ]
        ];


        $payment = Chapa::initializePayment($data);
        dd( $payment);


        if ($payment['status'] !== 'success') {
            // notify something went wrong
            return;
        }

        return redirect($payment['data']['checkout_url']);
    }

    /**
     * Obtain Rave callback information
     * @return void
     */
    public function callback($reference)
    {

        $data = Chapa::verifyTransaction($reference);
        dd($data);

        //if payment is successful
        if ($data['status'] ==  'success') {


        dd($data);
        }

        else{
            //oopsie something ain't right.
        }


    }
}
