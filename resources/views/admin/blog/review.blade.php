@extends('admin.layout')

@section('main')

<div class="row">
    <div class="col-md-10 m-auto">
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="text-white text-center">Review Blogs</h3>
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
                        <th>Status</th>
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
                                @if ($blog->visibility == 0)
                                    <div class="text-info">Private</div>
                                @else
                                    <div class="text-info">Public</div>
                                @endif
                            @endif
                        </td>
                        <td>
                            @if ($blog->status == 0)
                                <div class="text-danger">Not approved</div>
                            @elseif ($blog->status == 1)
                                <div class="text-success">Approved</div>
                            @else
                                <div class="text-danger">Rejected</div>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('blog.approve', $blog->id) }}" class="btn btn-facebook btn-sm">Approve</a>
                            <a href="{{ route('blog.reject', $blog->id) }}" class="btn btn-danger btn-sm">Reject</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center"><h3>No data to show</h3></td>
                    </tr>
                    @endforelse
                </table>
                @if ($blogs->hasPages())
                    <div class="pagination-wrapper mt-3">
                        {{ $blogs->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection
