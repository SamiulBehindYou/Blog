@extends('admin.layout')
@section('main')
@can('Roles')

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="text-center text-white">Role Table</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered text-center">
                    <tr>
                        <th>SL</th>
                        <th>Role</th>
                        <th>Permissions</th>
                        <th>Created at</th>
                        <th>Action</th>
                    </tr>
                    @forelse ($roles as $index=>$role)
                        <tr>
                            <td>{{ $index+1 }}</td>
                            <td>{{ $role->name }}</td>
                            <td class="text-wrap ">
                                @foreach ($role->getPermissionNames() as $permission)
                                <span class="badge badge-primary my-1">{{ $permission }}</span>
                                @endforeach
                            </td>
                            <td>{{ $role->created_at->diffForHumans() }}</td>
                            @can('Delete_role')
                            <td><a href="{{ route('role.delete', $role->id) }}" class="btn btn-danger">Delete</a></td>
                            @endcan
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3">No Data found</td>
                        </tr>
                    @endforelse
                </table>
            </div>
        </div>
    </div>

    @can('Add_role')
    <div class="col-md-4">
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="text-white">Add role</h3>
            </div>
            <div class="card-body">
                <form action="#" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Role name</label>
                        <input type="text" class="form-control" name="role_name">
                        @error('role_name')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Select permissions</label>
                        <br>
                        @foreach ($permissions as $permission)
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input type="checkbox" name="permission[]" value="{{ $permission->name }}" class="form-check-input">
                                    {{ $permission->name }}
                                <i class="input-frame"></i></label>
                            </div>
                        @endforeach
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary" type="submit">Add role</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endcan
</div>
@endcan

@endsection
