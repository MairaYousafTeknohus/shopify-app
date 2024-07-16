<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function callback(Request $request)
    {
        $shop = $request->query('shop');
        $accessToken = $this->getAccessToken($shop, $request->query('code'));

        session(['shopify_domain' => $shop, 'shopify_token' => $accessToken]);

        return redirect()->route('home');
    }

    protected function getAccessToken($shop, $code)
    {
        // Use Shopify API to exchange the code for an access token
        // Return the access token
    }
}