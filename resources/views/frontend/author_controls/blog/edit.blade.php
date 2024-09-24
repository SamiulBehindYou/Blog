@extends('frontend.author_controls.layout')

@section('main')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="text-center text-white">Edit Blog</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('author.blog.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="mb-3 col">
                            <label class="form-label">Title</label>
                            <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                            <input type="text" name="title" value="{{ $blog->title }}" class="form-control">
                            @error('title')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="mb-3 col">
                            <label class="form-label">Sub Categroy</label>
                            <select name="sub_category" >
                                <option readonlhy value="">Select sub category</option>
                                @forelse ($subcategories as $subcategory)
                                <option {{ $blog->subcategory_id == $subcategory->id ? 'selected':'' }} value="{{ $subcategory->id }}">{{ $subcategory->subcategory_name }}</option>
                                @empty
                                <option readonly value="">No SubCategory found</option>
                                @endforelse
                            </select>
                            @error('sub_category')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" id="summernote" rows="5" class="form-control">{{ $blog->description }}</textarea>
                        @error('description')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="mb-3 col">
                            <label class="form-label">Blog Thamnail</label>
                            <input type="file" name="image" class="form-control" onchange="document.getElementById('img').src = window.URL.createObjectURL(this.files[0])">
                            <div><small class="text-warning">Image should be less then 4MB and type: jpg, png, gif and webp.</small></div>
                            @error('image')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                            <div><img id="img" src="{{ asset('uploads/blogs').'/'.$blog->image }}" width="200" class="mt-2 rounded "></div>
                        </div>
                        <div class="mb-3 col">
                            <label class="form-label">Tags</label>
                            <select id="select-tag" name="tag_id[]" class="demo-default" multiple placeholder="Select Tag">
                                <option value="">Select Tag</option>
                                <optgroup label="Tags">
                                    @foreach ($tags as $index=>$tag)
                                    <option @if(in_array($tag->id, $selected_tags)) selected @endif value="{{ $tag->id }}">{{ $tag->tag }}</option>
                                    @endforeach
                                </optgroup>
                              </select>
                            @error('tag_id')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="mb-3 col">
                            <label class="form-label">Read Time <small class="text-warning">min</small></label>
                            <input type="number" value="{{ $blog->read_time }}" name="read_time" class="form-control">
                            @error('read_time')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
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

@endsection
