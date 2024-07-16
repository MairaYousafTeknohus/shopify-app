<?php
return [
    'api_key' => env('SHOPIFY_API_KEY', '99de19ce875a127b78c30192350a33f1'),
    'api_secret' => env('SHOPIFY_API_SECRET', '0e10d50888d93742a099593645e9b9c6'),
    'api_scopes' => env('SHOPIFY_API_SCOPES', 'read_products,write_products,write_script_tags'),
    'api_redirect' => env('SHOPIFY_REDIRECT_URI', 'http://localhost:8000/authenticate'),
];