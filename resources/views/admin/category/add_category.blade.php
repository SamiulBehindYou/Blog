@extends('admin.layout')

@section('main')

<div class="row">
    <div class="col-md-6 m-auto">
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="text-center text-white">Add Category</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('categroy.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Category name</label>
                        <input type="text" name="category_name" class="form-control">
                        @error('category_name')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Category Image</label>
                        <input type="file" name="category_image" class="form-control" onchange="document.getElementById('img').src = window.URL.createObjectURL(this.files[0])">
                        @error('category_image')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                        <div>
                            <img id="img" width="200" class="mt-2 rounded ">
                        </div>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
