<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PlanController extends Controller
{
    public function changePlan(Request $request, $store_id)
    {
        $request->validate([
            'plan_sku' => 'required',
            'effect' => 'required'
        ]);

        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'X-Auth-Client' => session('client_id'),
            'X-Auth-Token' => session('franchise_token')
        ])->post('https://api.bigcommerce.com/franchises/'. session('franchise_id') .'/v1/stores/'. $store_id .'/change-plan', [
            'plan_sku' => $request->get('plan_sku'),
            'effective' => $request->get('effect')
        ]);

        if ($response->successful()) {
            return response()->json([
                'message' => 'Plan changed successfully!',
                'success' => true
            ]);
        }

        return response()->json([
            'message' => 'Something went wrong. Please try again.',
            'success' => false
        ]);
    }
}
