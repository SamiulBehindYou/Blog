@extends('admin.layout')

@section('main')

<div class="row">
    <div class="col-md-10 m-auto">
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="text-white text-center">Author Messagesphp</h3>
            </div>
            <div class="card-body">
                <table class="table text-center">
                    <tr>
                        <th width='5%'>SL</th>
                        <th width='10%'>Author</th>
                        <th width='10%'>Subject</th>
                        <th width='60%'>Message</th>
                        <th width='5%'>Receive</th>
                        <th width='10%'>Action</th>
                    </tr>
                    @forelse ($messages as $sl=>$message)
                    <tr>
                        <td>{{ $sl+1 }}</td>
                        <td>{{ $message->rel_to_author->name }}</td>
                        <td>{{ $message->subject }}</td>
                        <td>{{ $message->message }}</td>
                        <td>{{ $message->created_at->diffForHumans() }}</td>
                        <td>
                            @if ($message->read_recipt == 0)
                                <a href="{{ route('make.read', $message->id) }}" class="btn btn-outline-success">Make read</a>
                            @elseif ($message->read_recipt == 1)
                                <a class="btn btn-outline-facebook">Readed</a>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6"><div class="text-danger"><i data-feather="bell-off"></i></div><h3>No Messages</h3></td>
                    </tr>
                    @endforelse
                </table>
                @if ($messages->hasPages())
                    <div class="pagination-wrapper mt-3">
                        {{ $messages->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>

</div>
@endsection


@section('footer')

@endsection
