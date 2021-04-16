@extends('backend.dashboard')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                <a class="btn btn-primary float-right" href="{{ url('/testimonial') }}"> Create Testimonial</a>
                    <h4 class="header-title mb-4">All Category</h4>
                    
                    @if(session('success'))

                        <div class="alert alert-success alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Success!</strong> {{ session('success') }}.
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
                                <th scope="col">Client Name</th>
                                <th scope="col">Client Designation</th>
                                <th scope="col">Description</th>
                                <th scope="col">Client Imahe</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                             @foreach($testimonial as $key=>$test)
                                <tr>
                                    <td>{{ $test->id }}</td>
                                    <td>{{ $test->client_name }}</td>
                                    <td>{{ $test->client_designation }}</td>
                                    <td>{{ Str::limit($test->desc,50) }}</td>
                                    
                                    <td><img width="100" height="100" src="{{ url('img/testimonial').'/'.$test->client_img }}" alt=""></td>
                                    
                                    <td>
                                        <a class="btn btn-success" href="{{ url('/edit-testimonial') }}/{{ $test->id }}">Edit</a>
                                        <a class="btn btn-danger" href="{{ url('/delete-testimonial') }}/{{ $test->id }}">Delete</a>
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