@extends('admin.layout')

@section('main')

@can('About')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="text-center text-white">Create Blog</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('update.about') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="mb-3 col">
                            <label class="form-label">Title</label>
                            <input type="hidden" name="author_id" value="0">
                            <input type="text" name="title" value="{{ $about->title }}" class="form-control">
                            @error('title')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>

                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" id="summernote" rows="5" class="form-control">{{ $about->description }}</textarea>
                        @error('description')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="mb-3 col">
                            <label class="form-label">Thumbnail Image</label>
                            <input type="file" name="image" class="form-control" onchange="document.getElementById('img').src = window.URL.createObjectURL(this.files[0])">
                            <div><small class="text-danger">Image should be less then 4MB and type: jpg, png, gif and webp.</small></div>
                            @error('image')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                            <div><img id="img" src="{{ asset('uploads/about').'/'.$about->image }}" width="200" class="mt-2 rounded "></div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary btn-lg col">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endcan

@endsection
