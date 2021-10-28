@extends('templates.layouts.index')
@section('content')
<section class="container max-width-adaptive-xs margin-top-md margin-bottom-md text-center">
    <h1>Login</h1>
    <p class="margin-top-sm">Don't have an account? <a href="{{ url('/site2/register') }}">Get started</a></p>
    <x-auth.login-form />
    <p class="margin-top-sm">Forgot Password? <a href="{{ url('/site2/passreset') }}">Reset Here</a></p>
</section>
@endsection

@push('module-scripts')
<x-auth.script.signin-script />
@endpush
