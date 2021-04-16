@extends('backend.dashboard')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-4">All Slide</h4>
                    
                    @if(session('delete'))

                        <div class="alert alert-danger alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Success!</strong> {{ session('delete') }}.
                        </div>
                        @endif
                        @if(session('update'))

                        <div class="alert alert-success alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Success!</strong> {{ session('update') }}.
                        </div>
                        @endif
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">SL</th>
                                <th scope="col">Slide Title</th>
                                <th scope="col">Slide Content </th>
                                <th scope="col">Slide Image</th>
                                
                                <th scope="col">Created At</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                             @foreach($slider as $key=>$slide)
                                <tr>
                                    <td>{{ $slide->id }}</td>
                                    <td>{{ $slide->slider_title ?? "N/A"}}</td>
                                    <td>{{ Str::limit($slide->slider_content ?? "N/A",50) }}</td>
                                    <td><img src="{{ url('/img/slider/').'/'.$slide->slider_image ?? '' }}"  width="100" alt=""></td>
                                    <td>{{ $slide->created_at->diffForHumans() ?? 'N/A' }}</td>
                                    
                                    <td>
                                        <a class="btn btn-success btn-sm" href="{{ url('/edit-slide') }}/{{ $slide->id }}">Edit</a>
                                        <a class="btn btn-danger btn-sm" href="{{ url('/delete-slide') }}/{{ $slide->id }}">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            
                        </tbody>
                        
                    </table>
                   
                </div>
                </div>
    </div>                      
    </div>
 </div> 
 @endsection