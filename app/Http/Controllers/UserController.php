<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function getUser()
    {
        $shopDomain = session('shopify_domain');

        if (!$shopDomain) {
            Log::error('No authenticated shop domain');
            return response()->json(['error' => 'No authenticated user or shop domain'], 401);
        }

        // Your query here
        $user = User::where('name', null)
            ->where('shopify_namespace', null)
            ->whereNull('deleted_at')
            ->first();

        return response()->json($user);
    }
} 