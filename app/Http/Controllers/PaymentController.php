<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Payment;
use App\Models\User;
use CryptAPI\CryptAPI;

class PaymentController extends Controller
{
    public function create(Request $request)
    {
        $validated = $request->validate([
            'amount' => 'required|numeric|min:0.01',
            'currency' => 'required|in:BTC,ETH,LTC',
        ]);

        $ticker = $this->getTicker($validated['currency']);
        $apiUrl = "https://api.cryptapi.io/{$ticker}/create/";
        $address = $this->generateAddress($validated["currency"]);

        // Création du paiement
        $payment = Payment::create([
            'payment_id' => uniqid(),
            'order_id' => uniqid(),
            'amount' => $validated['amount'],
            'status' => 'pending',
            'currency' => $validated["currency"]
        ]);

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . env('CRYPTAPI_KEY'),
        ])->post($apiUrl, [
                    'callback' => url('/payment/callback'),
                    'address' => $address,
                ]);

        var_dump($response);
    }

    private function getTicker($currency)
    {
        $tickers = [
            'BTC' => 'btc',
            'ETH' => 'eth',
            'LTC' => 'ltc',
        ];

        return $tickers[$currency] ?? 'unknown';
    }

    private function generateAddress($currency)
    {
        $coin = $this->getTicker($currency);
        $my_address = null;
        if ($coin == "btc") {
            $my_address = "1LhCzWTJ3BDuNfSE8eVb2p2dyScPkKmio7";
        } else if ($coin == "eth") {
            $my_address = "0x5FcdC195680c8D411d80517E9ea602B049533B89";
        } else if ($coin == "ltc") {
            $my_address = "LNik3LQgzAt1YuqRqWGNxeT6yumG2H1CAy";
        }

        $callback_url = 'http://localhost:8080/payment/callback';
        $parameters = [];
        $cryptapi_params = [];
        $api_key = env("CRYPTAPI_KEY");

        $ca = new CryptAPI($coin, $my_address, $callback_url, $parameters, $cryptapi_params, $api_key);
        $payment_address = $ca->get_address();

        return $payment_address;
    }
}