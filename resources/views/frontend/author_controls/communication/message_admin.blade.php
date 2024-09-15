@extends('frontend.author_controls.layout')

@section('main')

<div class="row">
    <div class="col-md-7">
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="text-white text-center">All Messages</h3>
            </div>
            <div class="card-body">
                <table class="table text-center">
                    <tr>
                        <th>SL</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th>Action</th>
                    </tr>
                    @forelse ($messages as $sl=>$message)

                    <tr>
                        <td>{{ $sl+1 }}</td>
                        <td>{{ $message->title }}</td>
                        <td>{{ $message->description }}</td>
                        <td>{{ $message->importance }}</td>
                        <td>
                            <a href="{{ route('author.message.delete', $message->id) }}" class="btn btn-outline-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5"><div class="text-danger"><i data-feather="bell-off"></i></div><h3>No Messages</h3></td>
                    </tr>
                    @endforelse
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <div class="card">
            <div class="card-header bg-primary">
                <h1 class="text-center text-white">New message</h1>
            </div>
            <div class="card-body">
                <form action="{{ route('author.message.store') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Subject</label>
                        <input type="text" name="subject" class="form-control">
                        @error('subject')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Message</label>
                        <textarea name="message" rows="5" class="form-control"></textarea>
                        @error('message')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary" type="submit">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection


@section('footer')

@endsection
