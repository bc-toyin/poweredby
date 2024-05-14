<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class StoreController extends Controller
{
    public function index(Request $request)
    {
        $page = $request->has('page') ? $request->get('page') : 1;
        $_stores = $this->getStores($page);
        $stores = $_stores['data'];
        $pageInfo = $_stores['meta']['pagination'];

        return view('stores.index', compact('stores', 'pageInfo'));
    }

    public function create($account_id)
    {
        return view('stores.create', compact('account_id'));
    }

    public function store($account_id)
    {
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'X-Auth-Client' => session('client_id'),
            'X-Auth-Token' => session('franchise_token')
        ])->post('https://api.bigcommerce.com/franchises/'. session('franchise_id') .'/v1/accounts/'. $account_id .'/stores', [
            'plan_sku' => request()->get('plan_sku'),
            'store_name' => request()->get('store_name'),
            'country' => request()->get('country')
        ]);

        if ($response->failed()) {
            return back()->withErrors([
                'message' => 'Something went wrong. Please try again.'
            ]);
        }

        return redirect()->route('stores.index')->with([
            'message' => 'Store created successfully!'
        ]);
    }

    public function show($store_id)
    {
        $_store = $this->getStore($store_id);
        $store = [];

        if (!empty($_store)) {
            $store = $_store['data'];
        }

        return view('stores.show', compact('store'));
    }

    public function edit($store_id)
    {
        $_store = $this->getStore($store_id);

        if (empty($_store)) {
            abort(404);
        }

        $store = $_store['data'];

        return view('stores.edit', compact('store'));
    }

    public function update(Request $request, $store_id)
    {
        $request->validate([
            'status' => 'required',
            'plan_sku' => 'required',
            'store_name' => 'required',
            'store_hash' => 'required',
            'primary_hostname' => 'required',
            'canonical_hostname' => 'required',
            'country' => 'required',
            'expires_at' => 'required',
        ]);

        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'X-Auth-Client' => session('client_id'),
            'X-Auth-Token' => session('franchise_token')
        ])->put('https://api.bigcommerce.com/franchises/'. session('franchise_id') .'/v1/stores/'. $store_id, [
            'status' => $request->get('status'),
            'plan_sku' => $request->get('plan_sku'),
            'store_name' => $request->get('store_name'),
            'store_hash' => $request->get('store_hash'),
            'primary_hostname' => $request->get('primary_hostname'),
            'canonical_hostname' => $request->get('canonical_hostname'),
            'country' => $request->get('country'),
            'expires_at' => $request->get('expires_at'),
            'store_launched' => $request->has('store_launched') ? true : false
        ]);

        if ($response->failed()) {
            return back()->withErrors([
                'message' => 'Something went wrong. Please try again.'
            ]);
        }

        return redirect()->route('stores.show', ['store_id' => $store_id])->with([
            'message' => 'Store updated successfully!'
        ]);
    }

    public function suspend($store_id)
    {
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'X-Auth-Client' => session('client_id'),
            'X-Auth-Token' => session('franchise_token')
        ])->post('https://api.bigcommerce.com/franchises/'. session('franchise_id') .'/v1/stores/'. $store_id . '/suspensions');

        if ($response->successful()) {
            return response()->json([
                'message' => 'Store suspended successfully!',
                'success' => true
            ]);
        }

        return response()->json([
            'message' => 'Something went wrong. Please try again.',
            'success' => false
        ]);
    }

    public function cancel(Request $request, $store_id)
    {
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'X-Auth-Client' => session('client_id'),
            'X-Auth-Token' => session('franchise_token')
        ])->post('https://api.bigcommerce.com/franchises/'. session('franchise_id') .'/v1/stores/'. $store_id . '/cancellations', [
            'id' => $request->get('id'),
            'plan_sku' => $request->get('plan_sku'),
            'store_name' => $request->get('store_name'),
            'country' => $request->get('country')
        ]);

        if ($response->successful()) {
            return response()->json([
                'message' => 'Store cancelled successfully!',
                'success' => true
            ]);
        }

        return response()->json([
            'message' => 'Something went wrong. Please try again.',
            'success' => false
        ]);
    }

    public function reactivate(Request $request, $store_id)
    {
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'X-Auth-Client' => session('client_id'),
            'X-Auth-Token' => session('franchise_token')
        ])->post('https://api.bigcommerce.com/franchises/'. session('franchise_id') .'/v1/stores/'. $store_id . '/reactivations');

        if ($response->successful()) {
            return response()->json([
                'message' => 'Store reactivated successfully!',
                'success' => true
            ]);
        }

        return response()->json([
            'message' => 'Something went wrong. Please try again.',
            'success' => false
        ]);
    }
}
