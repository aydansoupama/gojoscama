<?php

namespace App\Services;

use Exception;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class CryptapiService {
    protected $apiKey;
    protected $apiUrl;

    public function __construct() {
        $this->apiKey = config("services.cryptapi.api_key");
        $this->apiUrl = config("services.cryptapi.api_url");
    }

    public function createPayment($amount, $currency, $callbackUrl) {
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
                Log::error("Cryptapi API error: " . $response->body());
                throw new Exception("Failed to create payment.");
            }
        } catch(Exception $e) {
            Log::error("Cryptapi error: " . $e->getMessage());
            throw new Exception("Cryptapi error: " . $e->getMessage());
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
                Log::error("Cryptapi API error: " . $response->body());
                throw new Exception("Failed to get payment status");
            }
        } catch (Exception $e) {
            Log::error("Cryptapi API error: " . $e->getMessage());
            throw new Exception("Cryptapi error: ". $e->getMessage());
        }
    }

    public function getBalance($address) {
        try {
            $response = Http::get("{$this->apiUrl}/balance/{$address}");

            if($response->successful()) {
                return $response->json();
            } else {
                Log::error("Cryptapi API error: " . $response->body());
                throw new Exception("Failed to get balance");
            }
        } catch (Exception $e) {
            Log::error("Cryptapi API error: " . $e->getMessage());
            throw new Exception("Cryptapi error: ". $e->getMessage());
        }
    }

    public function getExchangeRate($currency) {
        try {
            $response = Http::get("{$this->apiUrl}/exchange_rate/{$currency}");

            if($response->successful()) {
                return $response->json();
            } else {
                Log::error("Cryptapi API error: " . $response->body());
                throw new Exception("Failed to get exchange rate");
            }
        } catch (Exception $e) {
            Log::error("Cryptapi API error: " . $e->getMessage());
            throw new Exception("Cryptapi error: ". $e->getMessage());
        }
    }
}
