@extends('frontend.author_controls.layout')

@section('main')
<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <div>
      <h4 class="mb-3 mb-md-0">Welcome to Author Controls <strong class="text-primary">{{ Auth::guard('author')->user()->name }}</strong></h4>
    </div>
</div>


@endsection

