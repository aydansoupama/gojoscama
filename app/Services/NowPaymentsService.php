<?php

namespace App\Services;
use Exception;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class NowPaymentsService {
    protected $apiKey;
    protected $apiUrl;

    public function __construct() {
        $this->apiKey = config("services.nowpayments.api_key");
        $this->apiUrl = "https://api.nowpayments.io/v1";
    }

    public function createPayment($amount, $currency, $callbackUrl, ) {
        try {
            $response = Http::withHeaders([
                "Authorization" => "Bearer " . $this->apiKey
            ])->post("{$this->apiUrl}/payment", [
                "amount" => $amount,
                "currency" => $currency,
                "callback_url" => $callbackUrl
            ]);

            if ($response->successful()) {
                return $response->json();
            } else {
                Log::Error("NOWPayments API error: " . $response->body());
                throw new Exception("Failed to create payment.");
            }
        } catch(Exception $e) {
            Log::error("NOWPayments error: " . $e->getMessage());
            throw new Exception("NOWPayments error: " . $e->getMessage());
        }
    }

    public function getPaymentStatus($paymentId) {
        try {
            $response = Http::withHeaders([
                "Authorization" => "Bearer " . $this->apiKey,
            ])->get("{$this->apiUrl}/payment/{$paymentId}");

            if($response->successful()) {
                return $response->json();
            } else {
                Log::error("NOWPayments API error: " . $response->body());
                throw new Exception("Failed to get payment status");
            }
        } catch (Exception $e) {
            Log::error("NOWPayments API error: " . $e->getMessage());
            throw new Exception("NOWPayments error: ". $e->getMessage());
        }
    }
}