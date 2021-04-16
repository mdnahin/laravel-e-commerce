@extends('layouts.app')
@section('content')
@if(session('trash'))
<p>{{ session('trash') }}</p>
@endif

@if(session('drop'))
<p>{{ session('drop') }}</p>
@endif

@if(session('update'))
<p>{{ session('update') }}</p>
@endif
<h3>Total= {{ $count }}</h3>
<table>
    <thead>
        <th>SL</th>
        <th>SubCategory Name</th>
        <th>Created At</th>
        <th>Updated At</th>
        <th>Action</th>
    </thead>
    <tbody>
    @forelse($deleted as $key=>$del)
        <tr>
            <td>{{ $del->id }}</td>
            <td>{{ $del->subcategory_name }}</td>
            <td>{{ $del->created_at->diffForHumans() }}</td>
            <td>{{ $del->deleted_at->diffForHumans() }}</td>
            <td>
                <a href="{{ url('/restore-subcategory') }}/{{ $del->id }}">Restore</a>
                <a href="{{ url('/force-subcategory') }}/{{ $del->id }}">Drop</a>
                
            </td>
        </tr>
        @empty
            <tr class="text-center">
                <td colspan="50">No data available</td>    
            </tr>
    @endforelse
    </tbody>
</table>
@endsection