@extends('admin.layout')

@section('main')

<div class="row">
    <div class="col-md-6 m-auto">
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="text-center text-white">Edit Blog</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.blog.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Sub Categroy</label>
                        <select name="sub_category" >
                            <option readonlhy value="">Select sub category</option>
                            @forelse ($subcategories as $subcategory)
                            <option {{ $subcategory->id == $blog->subcategory_id ? 'selected':'' }} value="{{ $subcategory->id }}">{{ $subcategory->subcategory_name }}</option>
                            @empty
                            <option readonly value="">No SubCategory found</option>
                            @endforelse
                        </select>
                        @error('sub_category')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                        <input type="text" value="{{ $blog->title }}" name="title" class="form-control">
                        @error('title')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" rows="5" class="form-control">{{ $blog->description }}</textarea>
                        @error('description')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Read Time. <small>Not required</small></label>
                        <select name="readtime" class="form-control" id="">
                            <option readonly value="">Select read time</option>
                            <option {{ '1 min' == $blog->read_time ? 'selected':'' }} value="1 min">1 min</option>
                            <option {{ '5 min' == $blog->read_time ? 'selected':'' }} value="5 min">5 min</option>
                            <option {{ '10 min' == $blog->read_time ? 'selected':'' }} value="10 min">10 min</option>
                            <option {{ '20 min' == $blog->read_time ? 'selected':'' }} value="20 min">20 min</option>
                            <option {{ '30 min' == $blog->read_time ? 'selected':'' }} value="30 min">30 min</option>
                            <option {{ '45 min' == $blog->read_time ? 'selected':'' }} value="45 min">45 min</option>
                            <option {{ '1 hour' == $blog->read_time ? 'selected':'' }} value="1 hour">1 hour</option>
                            <option {{ '1 hour+' == $blog->read_time ? 'selected':'' }} value="1 hour+">1 hour+</option>
                        </select>
                        @error('readtime')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Image</label>
                        <input type="file" name="image" class="form-control" onchange="document.getElementById('img').src = window.URL.createObjectURL(this.files[0])">
                        <div><small class="text-danger">Image should be less then 4MB and type: jpg, png, gif and webp.</small></div>
                        @error('image')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                        <div><img id="img" src="{{ asset('uploads/blogs/').'/'.$blog->image }}" width="200" class="mt-2 rounded "></div>
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
