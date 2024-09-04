@extends('admin.layout')

@section('main')
<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <div>
      <h4 class="mb-3 mb-md-0">Welcome to sub category {{ Auth::user()->name }}</h4>
    </div>
  </div>

@endsection
