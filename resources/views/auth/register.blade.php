@extends('mainLayout')

@section('page-title', 'Account Registration')

@section('auth-content')
<div class="container p-5">
    <div class="row d-flex justify-content-center">
        <form method="POST" action="{{ route('register') }}" style="width:700px">
            @csrf
            <h2>Register New User</h2>
            <div class="row">
                <div class="col-12">
                        <label class="auth-labels">First Name</label>
                        <input type="text" name="firstname" value="{{ old('firstname') }}" required
                            class="auth-textbox form-control form-control-sm border border-dark">
                        @error('firstname')
                            <span>{{ $message }}</span>
                        @enderror
                        <label class="auth-labels">Last Name</label>
                        <input type="text" name="lastname" value="{{ old('lastname') }}" required
                            class="auth-textbox form-control form-control-sm border border-dark">
                        @error('lastname')
                            <span>{{ $message }}</span>
                        @enderror
                </div>
                <div class="mb-3">
                    <label class="auth-labels">Username</label>
                    <input type="text" name="name" value="{{ old('name') }}" required
                        class="auth-textbox form-control form-control-sm border border-dark">
                    @error('name')
                        <span>{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col">
                <div>
                    <label class="auth-labels">Email</label>
                    <input type="email" name="email"
                        class="auth-textbox form-control form-control-sm border border-dark">
                    <input type="checkbox" name="generate_email" id="generate_email"
                        class="form-check-input border border-dark">
                    <label for="generate_email" class="form-check-label">Generate Email Address</label>
                    @error('email')
                        <span>{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label class="auth-labels">Password</label>
                    <input type="password" name="password" required
                        class="auth-textbox form-control form-control-sm border border-dark">
                    @error('password')
                        <span>{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label class="auth-labels">Confirm Password</label>
                    <input type="password" name="password_confirmation" required
                        class="auth-textbox form-control form-control-sm border border-dark">
                </div>
            </div>
            <button type="submit" class="btn btn-md btn-primary w-100">Register</button>
    </div>
    </form>
</div>
<div class="col-row text-center">
    <a href="{{ route('home') }}"
        class="link-dark link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Return to Landing
        Page</a>
</div>
</div>
@endsection