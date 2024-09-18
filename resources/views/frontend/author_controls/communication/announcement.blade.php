@extends('frontend.author_controls.layout')

@section('main')

<div class="row">
    <div class="col-md-10 m-auto">
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="text-white text-center">Announcements Table</h3>
            </div>
            <div class="card-body">
                <table class="table text-center">
                    <tr>
                        <th width='10%'>SL</th>
                        <th width='10%'>Subject</th>
                        <th width='60%'>Description</th>
                        <th width='10%'>Importance</th>
                        <th width='10%'>Announce at</th>
                    </tr>
                    @forelse ($announcements as $sl=>$announce)
                    <tr>
                        <td>{{ $sl+1 }}</td>
                        <td>{{ $announce->title }}</td>
                        <td>{{ $announce->description }}</td>
                        <td>{{ $announce->importance }}</td>
                        <td>{{ $announce->created_at->diffForHumans() }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4"><div class="text-danger"><i data-feather="bell-off"></i></div><h3>No Annoucements</h3></td>
                    </tr>
                    @endforelse
                </table>
            </div>
        </div>
    </div>

</div>
@endsection


@section('footer')

@endsection
