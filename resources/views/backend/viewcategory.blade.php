@extends('backend.dashboard')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-4">All Category</h4>
                    @if(session('delete'))

                        <div class="alert alert-success alert-dismissible">
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
                                <th scope="col">Category Name</th>
                                <th scope="col">Category Image</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                             @foreach($cat as $key=>$cate)
                                <tr>
                                    <td>{{ $cat->firstItem() + $key }}</td>
                                    <td>{{ $cate->category_name }}</td>
                                    <td><img width="100" height="100" src="{{ url('img/category_img').'/'.$cate->category_image }}" alt=""></td>
                                    <td>{{ $cate->created_at->diffForHumans() ?? 'N/A' }}</td>
                                    
                                    <td>
                                        <a class="btn btn-success" href="{{ url('/edit-category') }}/{{ $cate->id }}">Edit</a>
                                        <a class="btn btn-danger" href="{{ url('/delete-category') }}/{{ $cate->id }}">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            
                        </tbody>
                        
                    </table>
                    {{ $cat->links() }}
                </div>
                </div>
    </div>                      
    </div>
 </div> 
 @endsection