<?php

namespace Osiset\ShopifyApp\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Osiset\ShopifyApp\Traits\AuthController as AuthControllerTrait;
use Kyon147\LaravelShopify\Facades\Shopify;
use App\Models\FormUser;
use DB;

class AuthController extends Controller
{
    use AuthControllerTrait;

    public function index(){
        return view('Formuser.create');
        // return view('laravel-shopify::home.index');
        // return view('kyon147.laravel-shopify.home.index');
        // correct way to get the path of package view folder
        // return view()->file(base_path('vendor/kyon147/laravel-shopify/src/resources/views/home/index.blade.php'));
    }
    
    public function create()
    {
        return view('Formuser.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
        ]);

        // FormUser::create([
        //     'name' => $validatedData['name'],
        //     'email' => $validatedData['email'],
        // ]);
        DB::table('formusers')->insert(['name'=>$validatedData['name'],'email' => $validatedData['email']]);

        // return redirect()->route('Formuser.create')->with('success', 'User created successfully.');
        return view('Formuser.create')->with('success', 'User created successfully.');
    }
    public function callback(Request $request)
    {
        $shopDomain = $request->query('shop');
        $accessToken = Shopify::getAccessToken($request->query('code'));

        session(['shopify_domain' => $shopDomain, 'shopify_token' => $accessToken]);

        return redirect()->route('home');
    }
}
