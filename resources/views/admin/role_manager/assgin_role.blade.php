@extends('admin.layout')
@section('main')
@can('Assignment')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="text-center text-white">Assignment Table</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered text-center">
                    <tr>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                    @forelse ($users as $index=>$user)
                    <form action="{{ route('remove.role') }}" method="POST">
                        @csrf
                        <tr>
                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                            <td>{{ $index+1 }}</td>
                            <td>{{ $user->name }}</td>
                            <td>
                                @foreach ($user->getRoleNames() as $role)
                                    <span class="badge badge-primary">{{ $role }}</span>
                                    <input type="hidden" name="role" value="{{ $role }}">
                                @endforeach

                            </td>
                            @can('Delete_assginment')
                            <td><button class="btn btn-danger" type="submit">Remove Role</button></td>
                            @endcan
                        </tr>
                    </form>
                    @empty
                        <tr>
                            <td colspan="3">No Data found</td>
                        </tr>
                    @endforelse
                </table>
            </div>
        </div>
    </div>

    @can('Assgin_role')
    <div class="col-md-4">
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="text-white">Assign role</h3>
            </div>
            <div class="card-body">
                <form action="#" method="post">
                    @csrf
                    <div class="mb-3">
                        <select name="user_id" class="form-control">
                            <option>Select user</option>
                            @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <select name="role" class="form-control">
                            <option>Select user</option>
                            @foreach ($roles as $role)
                            <option value="{{ $role->name }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary" type="submit">Assign role</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endcan

</div>

@endcan

@endsection
