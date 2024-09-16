{{-- resources/views/reports/index.blade.php --}}
@extends('layouts.app')

@section('content')
    <h1>Reports</h1>
    @foreach ($reports as $report)
        <div>{{ $report->name }}</div> 
    @endforeach
@endsection
