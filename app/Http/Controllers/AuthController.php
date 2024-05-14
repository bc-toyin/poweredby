<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    public function login(Request $request) {
        if (!$request->has('id')) {
            return response()->json('Invalid request');
        }

        Storage::disk('poweredby-sessions')->put($request->get('id') . '.txt', $request->get('id'));

        return response()->json([
            'message' => 'Login successful',
            'success' => true,
        ]);
    }
}
