@extends('admin.layout')

@section('main')

@can('Generel_settings')
@livewire('admin.settings')
@endcan

@endsection
