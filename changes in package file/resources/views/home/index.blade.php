@extends('shopify-app::layouts.default')

@section('styles')
    @include('shopify-app::partials.laravel_skeleton_css')
@endsection

@section('content')
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                Laravel &amp; Shopify
            </div>
            <p>Welcome to your Shopify App powered by Laravel.</p>
            <p>&nbsp;</p>
        </div>
    </div>
@endsection

@section('scripts')
    @parent

    @if(config('shopify-app.appbridge_enabled'))
        <script>
            actions.TitleBar.create(app, { title: 'Welcome' });
        </script>
    @endif
@endsection
