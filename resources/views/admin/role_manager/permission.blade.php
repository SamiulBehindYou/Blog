@extends('admin.layout')
@section('main')

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="text-center text-white">Permission table</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered text-center">
                    <tr>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Created at</th>
                    </tr>
                    @forelse ($permissions as $index=>$permission)
                        <tr>
                            <td>{{ $index+1 }}</td>
                            <td>{{ $permission->name }}</td>
                            <td>{{ $permission->created_at->diffForHumans() }}</td>
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
    <div class="col-md-4">
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="text-white">Add permission</h3>
            </div>
            <div class="card-body">
                <form action="#" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Permission name</label>
                        <input type="text" class="form-control" name="permission_name">
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary" type="submit">Add permission</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
