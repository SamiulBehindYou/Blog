@extends('admin.layout')

@section('main')
@can('Announcement')

<div class="row">
    <div class="col-md-7">
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="text-white text-center">Announcements Table</h3>
            </div>
            <div class="card-body">
                <table class="table text-center">
                    <tr>
                        <th>SL</th>
                        <th>Subject</th>
                        <th>Description</th>
                        <th>Importance</th>
                        <th>Action</th>
                    </tr>
                    @forelse ($announcements as $sl=>$announce)

                    <tr>
                        <td>{{ $sl+1 }}</td>
                        <td>{{ $announce->title }}</td>
                        <td>{{ $announce->description }}</td>
                        <td>{{ $announce->importance }}</td>
                        <td>
                            <a href="{{ route('admin.announce.delete', $announce->id) }}" class="btn btn-outline-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5"><div class="text-danger"><i data-feather="bell-off"></i></div><h3>No Annoucements</h3></td>
                    </tr>
                    @endforelse
                </table>
                @if ($announcements->hasPages())
                    <div class="pagination-wrapper mt-3">
                        {{ $announcements->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <div class="card">
            <div class="card-header bg-primary">
                <h1 class="text-center text-white">New announce</h1>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.announce.store') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" name="title" class="form-control">
                        @error('title')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" rows="5" class="form-control"></textarea>
                        @error('description')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Importance level (%)</label>
                        <input type="number" name="importance" class="form-control">
                        @error('importance')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary" type="submit">Announce</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endcan

@endsection

