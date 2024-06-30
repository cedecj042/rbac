@extends('mainLayout')

@section('title', 'Manage Users')

@section('page-content')

<div class="container">
    <a href="{{ route('usertool ') }}" class="link-dark">Back</a>
    <h3>Edit User</h3>
    <div class="row">
        <div class="col d-flex flex-col justify-content-center">
            <form action="{{ route('admin.updateUser', $user->id) }}" method="POST" style="width:500px;">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="user_id" class="form-label">User ID</label>
                    <input type="text" class="form-control" id="user_id" value="{{ $user->id }}" disabled>
                </div>
                <div class="mb-3">
                    <label for="user_name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="user_name" name="name" value="{{ $user->name }}">
                </div>
                <div class="mb-3">
                    <label for="user_email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="user_email" name="email" value="{{ $user->email }}">
                </div>
                <div class="mb-3">
                    <label for="user_role" class="form-label">User Role</label>
                    <select class="form-select form-select-md mb-3" name="roles[]" id="roles">
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}" @if($user->roles->contains($role->id)) selected @endif>
                                {{ $role->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Update User</button>
            </form>
        </div>
    </div>
</div>
@endsection