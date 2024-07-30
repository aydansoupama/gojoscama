<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebhookController extends Controller
{
    public function handlePaymentNotification(Request $request)
    {
        $paymentData = $request->all();
        $paymentId = $paymentData['payment_id'];
        $status = $paymentData['payment_status'];
        return response()->json(['status' => 'success']);
    }
}
