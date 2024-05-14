<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AccountController extends Controller
{
    public function index(Request $request)
    {
        $page = $request->has('page') ? $request->get('page') : 1;
        $_accounts = $this->getAccounts($page);
        $accounts = $_accounts['data'];
        $pageInfo = $_accounts['meta']['pagination'];

        return view('accounts.index', compact('accounts', 'pageInfo'));
    }

    public function create(Request $request)
    {
        return view('accounts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'p_first_name' => 'required',
            'p_last_name' => 'required',
            'p_email' => 'required|email',
            'p_phone' => 'required',
            'p_district' => 'required',
            'p_country' => 'required',
            'b_first_name' => 'required',
            'b_last_name' => 'required',
            'b_email' => 'required|email',
            'b_phone' => 'required',
            'b_district' => 'required',
            'b_country' => 'required'
        ]);

        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'X-Auth-Client' => session('client_id'),
            'X-Auth-Token' => session('franchise_token')
        ])->post('https://api.bigcommerce.com/franchises/'. session('franchise_id') .'/v1/accounts', [
            'name' => $request->get('name'),
            'user_email' => $request->get('email'),
            'billing_contact' => [
                'first_name' => $request->get('b_first_name'),
                'last_name' => $request->get('b_last_name'),
                'email' => $request->get('b_email'),
                'phone_number' => $request->get('b_phone'),
                'district' => $request->get('b_district'),
                'country' => $request->get('b_country')
            ],
            'primary_contact' => [
                'first_name' => $request->get('p_first_name'),
                'last_name' => $request->get('p_last_name'),
                'email' => $request->get('p_email'),
                'phone_number' => $request->get('p_phone'),
                'district' => $request->get('p_district'),
                'country' => $request->get('p_country')
            ]
        ]);

        if ($response->successful()) {
            $json = $response->json();

            return redirect()->route('accounts.show', $json['data']['id']);
        }
    }

    public function edit($account_id)
    {
        $_account = $this->getAccount($account_id);
        $account = $_account['data'];

        return view('accounts.edit', compact('account'));
    }

    public function update(Request $request, $account_id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'p_first_name' => 'required',
            'p_last_name' => 'required',
            'p_email' => 'required|email',
            'p_phone' => 'required',
            'p_district' => 'required',
            'p_country' => 'required',
            'b_first_name' => 'required',
            'b_last_name' => 'required',
            'b_email' => 'required|email',
            'b_phone' => 'required',
            'b_district' => 'required',
            'b_country' => 'required'
        ]);

        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'X-Auth-Client' => session('client_id'),
            'X-Auth-Token' => session('franchise_token')
        ])->put('https://api.bigcommerce.com/franchises/'. session('franchise_id') .'/v1/accounts/' . $account_id, [
            'name' => $request->get('name'),
            'user_email' => $request->get('email'),
            'billing_contact' => [
                'first_name' => $request->get('b_first_name'),
                'last_name' => $request->get('b_last_name'),
                'email' => $request->get('b_email'),
                'phone_number' => $request->get('b_phone'),
                'district' => $request->get('b_district'),
                'country' => $request->get('b_country')
            ],
            'primary_contact' => [
                'first_name' => $request->get('p_first_name'),
                'last_name' => $request->get('p_last_name'),
                'email' => $request->get('p_email'),
                'phone_number' => $request->get('p_phone'),
                'district' => $request->get('p_district'),
                'country' => $request->get('p_country')
            ]
        ]);

        if ($response->successful()) {
            $json = $response->json();

            return redirect()->route('accounts.edit', $json['data']['id']);
        }
    }

    public function show($account_id)
    {
        $_account = $this->getAccount($account_id);
        $account = $_account['data'];

        return view('accounts.show', compact('account'));
    }
}
