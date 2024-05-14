<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Http;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function getAccounts($page = 1) {
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'X-Auth-Client' => session('client_id'),
            'X-Auth-Token' => session('franchise_token')
        ])->get('https://api.bigcommerce.com/franchises/'. session('franchise_id') .'/v1/accounts', [
            'page' => $page
        ]);

        if ($response->successful()) {
            $json = $response->json();

            return $json;
        }

        return [];
    }

    public function getAccount($account_id) {
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'X-Auth-Client' => session('client_id'),
            'X-Auth-Token' => session('franchise_token')
        ])->get('https://api.bigcommerce.com/franchises/'. session('franchise_id') .'/v1/accounts/'. $account_id);

        if ($response->successful()) {
            $json = $response->json();

            return $json;
        }

        return [];
    }

    public function getStores($page = 1) {
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'X-Auth-Client' => session('client_id'),
            'X-Auth-Token' => session('franchise_token')
        ])->get('https://api.bigcommerce.com/franchises/'. session('franchise_id') .'/v1/stores', [
            'page' => $page
        ]);

        if ($response->successful()) {
            $json = $response->json();

            return $json;
        }

        return [];
    }

    public function getStore($store_id) {
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'X-Auth-Client' => session('client_id'),
            'X-Auth-Token' => session('franchise_token')
        ])->get('https://api.bigcommerce.com/franchises/'. session('franchise_id') .'/v1/stores/'. urlencode($store_id));

        if ($response->successful()) {
            $json = $response->json();

            return $json;
        }

        return [];
    }

    public function getStorePlanSku($store_id) {
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'X-Auth-Client' => session('client_id'),
            'X-Auth-Token' => session('franchise_token')
        ])->get('https://api.bigcommerce.com/franchises/'. session('franchise_id') .'/v1/stores/'. $store_id);

        if ($response->successful()) {
            $json = $response->json();

            return $json['data']['plan_sku'];
        }

        return '';
    }

    public function getStoreAccountName($account_id) {
        $account = $this->getAccount($account_id);

        if (isset($account['data']) && isset($account['data']['name'])) {
            return $account['data']['name'];
        }

        return '';
    }
}
