@extends('admin.layout')

@section('main')
@can('Add_sub_category')
<div class="row">
    <div class="col-md-6 m-auto">
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="text-center text-white">Add SubCategory</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('subcategory.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Select Category</label>
                        <select name="category_id" id="">
                            <option value="" readonly>Select category</option>
                            @forelse ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                            @empty
                            <option readonly>No category found</option>
                            @endforelse
                        </select>
                        @error('category_id')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">SubCategory name</label>
                        <input type="text" name="subcategory_name" class="form-control">
                        @error('subcategory_name')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endcan

@endsection
