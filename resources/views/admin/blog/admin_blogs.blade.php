@extends('admin.layout')

@section('main')

<div class="row">
    <div class="col-md-10 m-auto">
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="text-white text-center">Blogs</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered text-center">
                    <tr>
                        <th width='30'><p>All </p><input type="checkbox" name="selection"></th>
                        <th>SL</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Posted</th>
                        <th>Visibility</th>
                        <th>Action</th>
                    </tr>
                    @forelse ($blogs as $sl=>$blog)
                    <tr>
                        <td><input type="checkbox" name="selection"></td>
                        <td>{{ $sl+1 }}</td>
                        <td>{{ $blog->title }}</td>
                        <td><img src="{{ asset('uploads/blogs').'/'.$blog->image }}"></td>
                        <td>{{ $blog->created_at }}</td>
                        <td>
                            @if ($blog->status == 0)
                                <div class="text-danger">Not Visible</div>
                            @else
                                <div class="text-{{ $blog->visibility == 0 ? 'success':'danger' }}">{{ $blog->visibility == 0 ? 'Private':'Public' }}</div>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.blog.edit', $blog->id) }}" class="badge badge-primary">
                                <i class="link-icon" data-feather="edit"></i>
                            </a>

                            <a href="{{ route('admin.blog.visibility', $blog->id) }}" class="badge badge-{{ $blog->visibility == 0 ? 'success':'danger' }}">
                                <i class="link-icon" data-feather="eye{{ $blog->visibility == 0 ? '':'-off' }}"></i>
                            </a>

                            <a href="{{ route('admin.blog.delete', $blog->id) }}" class="badge badge-danger">
                                <i class="link-icon" data-feather="trash-2"></i>
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center"><h3>No data to show</h3></td>
                    </tr>
                    @endforelse
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
