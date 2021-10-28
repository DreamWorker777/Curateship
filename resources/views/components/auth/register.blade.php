@extends('templates.layouts.index')
@section('content')
<section class="container max-width-adaptive-xs margin-top-md margin-bottom-md text-center">
    <h1>Register</h1>
    <p class="margin-top-sm">Have an account? <a href="{{ url('/site2/login') }}">Login here</a></p>
    <x-auth.register-form />
</section>
@endsection

@push('module-scripts')
<x-auth.script.signin-script />
@endpush
