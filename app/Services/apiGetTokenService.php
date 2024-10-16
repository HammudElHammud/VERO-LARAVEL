<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

/**
 * Class apiGetTokenService.
 */
class apiGetTokenService
{
    protected $tokenEndpoint;
    protected $username = '365';
    protected $password = '1';
    protected $basicAuth = 'QVBJX0V4cGxvcmVyOjEyMzQ1NmlzQUxhbWVQYXNz';
    public function __construct()
    {
        $this->tokenEndpoint = rtrim(env('API_TASK', 'https://api.baubuddy.de/index.php/login'), '/') . '/login';
    }



    public function fetchAccessToken()
    {
        $response = Http::withHeaders([
            'Authorization' => 'Basic ' . $this->basicAuth,
            'Content-Type' => 'application/json',
        ])->post($this->tokenEndpoint, [
            'username' => $this->username,
            'password' => $this->password,
        ]);

        if ($response->successful()) {
            $tokenData = $response->json();
            $accessToken = $tokenData['oauth']['access_token'];
            $expiresIn = $tokenData['oauth']['expires_in'];

            Cache::put('api_access_token', $accessToken, $expiresIn - 60);

            return $accessToken;
        } else {
            throw new \Exception('Failed to fetch access token');
        }
    }

    public function getAccessToken()
    {
        if (Cache::has('api_access_token')) {
            return Cache::get('api_access_token');
        } else {
            return $this->fetchAccessToken();
        }
    }
}
