<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class FranchiseController extends Controller
{
    public function index(Request $request) {
        if (session()->has('franchise_token')) {
            return redirect()->route('accounts.index');
        }

        return view('welcome');
    }

    public function login(Request $request)
    {
        $request->validate([
            'franchise_id' => 'required',
            'client_id' => 'required',
            'client_secret' => 'required',
        ]);

        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'X-Auth-Client' => $request->get('client_id'),
            'X-Auth-Secret' => $request->get('client_secret')
        ])->post('https://api.bigcommerce.com/franchises/'. $request->get('franchise_id') .'/v1/oauth/token');

        if ($response->successful()) {
            $json = $response->json();
            $data = $json['data'];

            session([
                'franchise_token' => $data['access_token'],
                'franchise_id' => $request->get('franchise_id'),
                'client_id' => $request->get('client_id'),
                'client_secret' => $request->get('client_secret')
            ]);

            return redirect()->route('accounts.index');
        }

        return back()->withErrors([
            'account' => 'The provided credentials do not match our records.',
        ]);
    }
}
