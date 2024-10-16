<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\apiGetTokenService;
use Illuminate\Support\Facades\Http;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * @return array|mixed|void
     */
    public function makeApiCall(Request $request)
    {
        $apiService = new apiGetTokenService();
        $accessToken = $apiService->getAccessToken();

        $response = Http::withToken($accessToken)->get(
            env('API_TASK', 'https://api.baubuddy.de/index.php/v1/tasks/select')
            . 'v1/tasks/select');

        if ($response->successful()) {
            return $response->json();
        } else {
            abort($response->status(), 'API request failed');
        }
    }
}
