@extends('admin.layout')

@section('main')

<div class="row">
    <div class="col-md-10 m-auto">
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="text-white text-center">Tags</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered text-center">
                    <tr>
                        <th width='30'><p>All </p><input type="checkbox" name="selection"></th>
                        <th>SL</th>
                        <th>Tag</th>
                        <th>Created on</th>
                        <th>Action</th>
                    </tr>
                    @forelse ($tags as $sl=>$tag)
                    <tr>
                        <td><input type="checkbox" name="selection"></td>
                        <td>{{ $sl+1 }}</td>
                        <td>{{ $tag->tag }}</td>
                        <td>{{ $tag->created_at }}</td>
                        <td>
                            <a href="{{ route('tag.delete', $tag->id) }}" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center"><h3>No data to show</h3></td>
                    </tr>
                    @endforelse
                </table>
                @if ($tags->hasPages())
                    <div class="pagination-wrapper mt-3">
                        {{ $tags->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection
