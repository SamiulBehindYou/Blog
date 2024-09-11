@extends('admin.layout')

@section('main')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary">
                    <h3 class="text-white text-center">Edit Profile Info</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('profile.update') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" value="{{ Auth::user()->name }}" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="text" name="email" value="{{ Auth::user()->email }}" class="form-control">
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
                    <form action="{{ route('profile.update.image') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Upload Image</label>
                            <input type="file" name="image" class="form-control"
                                onchange="document.getElementById('img').src = window.URL.createObjectURL(this.files[0])">
                            <img src="{{ Auth::user()->image != null ? asset('uploads/users/'.Auth::user()->image):'' }}" id="img" width="200" class="rounded mt-2">
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
    <div class="row  mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary">
                    <h3 class="text-center text-white">Account Deletation</h3>
                </div>
                <div class="card-body">

                    <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
                        @csrf
                        @method('delete')
                        <div class="mb-3">
                            <label class="form-label">Enter Password</label>
                            <input type="password" name="password" placeholder="Enter password to delete account!" class="form-control">
                            <small class="text-danger">Once your account is deleted, all of its resources and data will be permanently deleted.</small>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-outline-danger">Delete Account</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
