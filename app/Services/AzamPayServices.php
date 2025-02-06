<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;


class AzamPayServices
{
    protected $clientId;
    protected $clientSecret;
    protected $environment;

    public function __construct()
    {
        $this->clientId = env('AZAMPAY_CLIENT_ID');
        $this->clientSecret = env('AZAMPAY_CLIENT_SECRET');
        $this->appName = env('AZAMPAY_APP_NAME');
        $this->environment = env('AZAMPAY_ENVIRONMENT');
    }

    public function getToken()
    {
        if (Cache::has('azampay_token')) {
            return Cache::get('azampay_token');
        }

        $url = $this->environment === 'sandbox'
            ? 'https://authenticator-sandbox.azampay.co.tz/AppRegistration/GenerateToken'
            : 'https://authenticator.azampay.co.tz/AppRegistration/GenerateToken';

        $basicAuth = base64_encode($this->clientId . ':' . $this->clientSecret);

        $response = Http::withHeaders([
            'Authorization' => 'Basic ' . $basicAuth,
            'Content-Type' => 'application/json'
        ])->post($url, [
            'appName' => $this->appName
        ]);

        if ($response->successful()) {
            $token = $response->json()['access_token'];
            Cache::put('azampay_token', $token, now()->addMinutes(55));
            return $token;
        } else {
            throw new \Exception('Unable to fetch token: ' . $response->body());
        }
    }

    public function makePayment($amount, $phoneNumber, $referenceId)
    {
        $token = $this->getToken();
        // Make the payment request using the fetched token
        // For example:
        // $response = Http::withToken($token)->post(...);
    }

    // Add other methods for different API calls as needed
}
