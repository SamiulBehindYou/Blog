@extends('admin.layout')

@section('main')

<div class="row">
    <div class="col-md-9 m-auto">
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="text-white text-center">Authors Table</h3>
            </div>
            <div class="card-body">
                <table class="table text-center">
                    <tr>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Photo</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    {{-- @foreach ($authors as $sl=>$author)

                    <tr>
                        <td>{{ $sl+1 }}</td>
                        <td>{{ $author->name }}</td>
                        <td>{{ $author->email }}</td>
                        <td>
                            @if ($author->image == null)
                                No Photo
                            @else
                                <img src="{{ asset('uploads/authors/').'/'.$author->image }}" >
                            @endif
                        </td>
                        <td>
                            @if ( $author->status == 1)
                            <a href="{{ route('author.status', $author->id) }}" class="btn btn-outline-success btn-sm">Active</a>
                            @else
                            <a href="{{ route('author.status', $author->id) }}" class="btn btn-outline-danger btn-sm">Not Active</a>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('author.delete', $author->id) }}" class="btn btn-outline-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                    @endforeach --}}
                </table>
            </div>
        </div>
    </div>
</div>
@endsection


@section('footer')

@endsection
