@extends('admin.layout')

@section('main')
@can('Admin')
<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <div>
      <h4 class="mb-3 mb-md-0">Welcome to Dashboard <strong class="text-primary">{{ Auth::user()->name }}</strong></h4>
    </div>
</div>

<div class="row">
    <div class="col-md-9 m-auto">
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="text-white text-center">Users Table</h3>
            </div>
            <div class="card-body">
                <table class="table text-center">
                    <tr>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Photo</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($users as $sl=>$user)

                    <tr>
                        <td>{{ $sl+1 }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if ($user->image == null)
                                No Photo
                            @else
                                <img src="{{ asset('uploads/users/').'/'.$user->image }}" >
                            @endif
                        </td>
                        <td>
                            @if (Auth::user()->id == $user->id)
                            <p>You</p>
                            @else
                            <a href="{{ route('user.delete', $user->id) }}" class="btn btn-outline-danger btn-sm">Delete</a>

                            @endif
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endcan

@endsection
