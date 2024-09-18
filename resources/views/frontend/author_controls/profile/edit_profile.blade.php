@extends('frontend.author_controls.layout')

@section('main')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary">
                    <h3 class="text-white text-center">Edit Profile Info</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('author.profile.update') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" value="{{ Auth::guard('author')->user()->name }}" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="text" name="email" value="{{ Auth::guard('author')->user()->email }}" class="form-control">
                            @error('email')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary">
                    <h3 class="text-white text-center">Edit Image</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('author.update.image') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Upload Image</label>
                            <input type="file" name="image" class="form-control"
                                onchange="document.getElementById('img').src = window.URL.createObjectURL(this.files[0])">
                            <img src="{{ Auth::guard('author')->user()->image != null ? asset('uploads/authors/'.Auth::guard('author')->user()->image):'' }}" id="img" width="200" class="rounded mt-2">
                            @error('image')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
