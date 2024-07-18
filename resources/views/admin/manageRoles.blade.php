@extends('mainLayout')

@section('title', 'Manage Roles')

@section('page-content')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <a href="{{ route('dash') }}" class="link-dark">Back</a>
            <hr>
            <div class="d-flex flex-col justify-content-between mb-3">
                <h2 class="m-0">Roles</h2>
                <a href="roles/add" class="btn btn-primary">Add Role</a>
            </div>
            <table class="table table-light table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($roles as $role)
                        <tr>
                            <td>{{ $role->id }}</td>
                            <td>{{ $role->name }}</td>
                            <td>
                                <a class="btn btn-primary" href="edit/role/{{$role->id}}">Edit</a>
                                <form action="{{ route('deleteRoles', $role->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
        </div>

    </div>
</div>

@endsection