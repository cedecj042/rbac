@extends('mainLayout')

@section('title', 'Add Roles')

@section('page-content')

<div class="container">
    <a href="{{ route('rolestool') }}" class="link-dark">Back</a>
    <h3>Add Roles</h3>
    <div class="row">
        <div class="col d-flex flex-col justify-content-center">
            <form action="{{ route('addRolesPermission') }}" method="POST" style="width:500px;">
                @csrf
                @method('POST')
                <div class="mb-3">
                    <label for="user_name" class="form-label">Role Name</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="mb-3">
                    <label for="user_role" class="form-label">Permissions</label>
                    <select class="form-select form-select-md mb-3" name="permissions[]" id="permissions" multiple>
                        @foreach($permissions as $permission)
                            <option value="{{ $permission->id }}" >
                                {{ $permission->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Add Role</button>
            </form>
        </div>
    </div>
</div>
@endsection