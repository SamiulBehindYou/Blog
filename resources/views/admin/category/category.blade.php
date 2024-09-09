@extends('admin.layout')

@section('main')

<div class="row">
    <div class="col-md-10 m-auto">
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="text-white text-center">Category Table</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered text-center">
                    <tr>
                        <th width='30'><p>All </p><input type="checkbox" name="selection"></th>
                        <th>SL</th>
                        <th>Category</th>
                        <th>Image</th>
                        <th>Created on</th>
                        <th>Action</th>
                    </tr>
                    @forelse ($categories as $sl=>$category)
                    <tr>
                        <td><input type="checkbox" name="selection"></td>
                        <td>{{ $sl+1 }}</td>
                        <td>{{ $category->category_name }}</td>
                        <td><img src="{{ asset('uploads/categories').'/'.$category->category_image }}" alt=""></td>
                        <td>{{ $category->created_at }}</td>
                        <td>
                            <a href="{{ route('category.delete', $category->id) }}" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center"><h3>No data to show</h3></td>
                    </tr>
                    @endforelse
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
