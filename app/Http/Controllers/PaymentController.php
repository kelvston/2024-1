<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers;

use App\Services\AzamPayServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;


class PaymentController extends Controller
{
    protected $azamPayService;

    public function __construct(AzamPayServices $azamPayService)
    {
        $this->azamPayService = $azamPayService;
    }

    public function getToken()
    {
        try {
            $token = $this->azamPayService->getToken();
            return response()->json(['token' => $token]);
        } catch (\Exception $e) {
            Log::error('Error fetching token: ' . $e->getMessage());
            return response()->json(['error' => 'Unable to fetch token', 'details' => $e->getMessage()], 500);
        }
    }

    public function makePayment(Request $request)
    {
        $amount = $request->input('amount');
        $phoneNumber = $request->input('phone_number');
        $referenceId = $request->input('reference_id');

        try {
            $response = $this->azamPayService->makePayment($amount, $phoneNumber, $referenceId);
            return response()->json($response);
        } catch (\Exception $e) {
            Log::error('Payment error: ' . $e->getMessage());
            return response()->json(['error' => 'Payment failed', 'details' => $e->getMessage()], 500);
        }
    }
}
