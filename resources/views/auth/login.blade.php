@extends('mainLayout')

@section('page-title', 'Account Login')

@section('auth-content')
<div class="container-fluid p-5">
    <div class="row w-20">
        <div class="col d-flex justify-content-center">
            <form method="POST" action="{{ route('login') }}" class="form" style="width:500px;">
                @csrf
                <h2>Login</h2>
                <div class="formgroup mb-3">
                    <label class="auth-labels">Username</label>
                    <input type="text" name="name" value="{{ old('name') }}" required
                        class="form-control border-secondary"  placeholder="Enter username">
                    @error('name')
                        <span>{{ $message }}</span>
                    @enderror
                </div>
                <div class="formgroup mb-3">
                    <label class="auth-labels">Password</label>
                    <input type="password" name="password" required class="form-control border border-secondary" placeholder="Enter password">
                    @error('password')
                        <span>{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary w-100">Login</button>
                <div class="text-center mt-4" style="font-size:21px;">
                    No Account Yet? <a href="{{ route('register') }}" style="font-size:18px;">Sign Up</a>.
                </div>
            </form>
        </div>
    </div>
</div>
@endsection