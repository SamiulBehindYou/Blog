@extends('admin.layout')

@section('main')

<div class="row">
<div class="col-md-4">
    <div class="card">
        <div class="card-header bg-primary">
            <h3 class="text-center text-white">Change Logo</h3>
        </div>
        <div class="card-body">
            <form action="" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="" class="form-label">Logo</label>
                    <input type="file" name="logo" class="form-control">
                    <img src="" alt="">
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary" type="submit">Change</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="col-md-4">
    <div class="card">
        <div class="card-header bg-primary">
            <h3 class="text-center text-white">Change Title</h3>
        </div>
        <div class="card-body">
            <form action="" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="" class="form-label">Title</label>
                    <input type="text" name="title" class="form-control">
                    <img src="" alt="">
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary" type="submit">Change</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="col-md-4">
    <div class="card">
        <div class="card-header bg-primary">
            <h3 class="text-center text-white">Change Icon</h3>
        </div>
        <div class="card-body">
            <form action="" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="" class="form-label">Icon</label>
                    <input type="file" name="icon" class="form-control">
                    <img src="" alt="">
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary" type="submit">Change</button>
                </div>
            </form>
        </div>
    </div>
</div>

</div>

<div class="row mt-4">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="text-center text-white">Carousel Blog</h3>
            </div>
            <div class="card-body">
                <form action="" method="post">
                <div class="mb-3">
                    <label class="form-label">Blogs</label>
                    <select name="blog_id" id="select-blog" class="demo-default" multiple placeholder="Select blog...">
                        <option value="">Select gear...</option>
                        <optgroup label="Blogs">
                            @forelse ($blogs as $blog)
                            <option value="{{ $blog->id }}">{{ $blog->title }}</option>
                            @empty
                            <option>No blogs found</option>
                            @endforelse
                        </optgroup>
                      </select>
                    @error('blog_id')
                        <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary" type="submit">Assgin</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="text-center text-white">Footer visibility</h3>
            </div>
            <div class="card-body">
                <div class="row mt-3">
                    <div class="col mb-3">
                        <label for="" >Left section</label>
                        <a href="" class="btn"><div class="text-success"><i class="link-icon " data-feather="toggle-right"></i></div></a>
                    </div>
                    <div class="col mb-3">
                        <label for="" class="form-label">Center section</label>
                        <a href="" class="btn"><div class="text-success"><i class="link-icon " data-feather="toggle-right"></i></div></a>
                    </div>
                    <div class="col mb-3">
                        <label for="" class="form-label">Right section</label>
                        <a href="" class="btn"><div class="text-success"><i class="link-icon " data-feather="toggle-right"></i></div></a>
                    </div>
                </div>
                <div class="row mt-3">
                    <a class="col btn btn-primary btn-lg">Active all</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="text-center text-white">Social Media Links</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <form action="" method="post">
                            <div class="mb-3">
                                <label for="" class="form-label">Facebook link</label>
                                <input type="text" name="facebook" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="">Active status</label>
                                <a href=""><div class="text-success"><i class="feather-icon" data-feather="toggle-left"></i></div></a>
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary" type="submit">Change</button>
                            </div>
                        </form>
                    </div>
                    <div class="col">
                        <form action="" method="post">
                            <div class="mb-3">
                                <label for="" class="form-label">Instragram link</label>
                                <input type="text" name="instragram" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="">Active status</label>
                                <a href=""><div class="text-success"><i class="feather-icon" data-feather="toggle-left"></i></div></a>
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary" type="submit">Change</button>
                            </div>
                        </form>
                    </div>
                    <div class="col">
                        <form action="" method="post">
                            <div class="mb-3">
                                <label for="" class="form-label">Twiter link</label>
                                <input type="text" name="twiter" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="">Active status</label>
                                <a href=""><div class="text-success"><i class="feather-icon" data-feather="toggle-left"></i></div></a>
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary" type="submit">Change</button>
                            </div>
                        </form>
                    </div>
                    <div class="col">
                        <form action="" method="post">
                            <div class="mb-3">
                                <label for="" class="form-label">Youtube link</label>
                                <input type="text" name="youtube" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="">Active status</label>
                                <a href=""><div class="text-success"><i class="feather-icon" data-feather="toggle-left"></i></div></a>
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary" type="submit">Change</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
