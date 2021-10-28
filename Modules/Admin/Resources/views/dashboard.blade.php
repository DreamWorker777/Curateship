@extends('layouts.simple')

@section('title', 'Dashboard')
@section('content')
<h3>
            {{-- Get the email username if there is no name (e.g. [johndoe]@gmail.com) --}}
    Hello {{ $admin->name ?? explode('@', $admin['email'])[0] }}
</h3>
<p>
    You are now logged in. 
    Click <a href="{{ route('admins.logout') }}">here</a> to logout.
</p>
@endsection