
@extends('backend.master')
@section('content')

<div class="content">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-4">All Category</h4>
                    @if(session('trash'))

                        <div class="alert alert-success alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Success!</strong> {{ session('trash') }}.
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
                                <th scope="col">SubCategory Name</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Updated At</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                           
                            @foreach($subcategory as $key=>$subcate)
                            <tr>
                                <td>{{ $subcate->id }}</td>
                                <td>{{ $subcate->subcategory_name }}</td>
                                <td>{{ $subcate->get_category->category_name ?? "N/A" }}</td>
                                <td>{{ $subcate->created_at->diffForHumans() }}</td>
                                <td>{{ $subcate->updated_at->format('d/m/Y') }}</td>
                                <td>
                                    <a class="btn btn-success" href="{{ url('/edit-subcategory') }}/{{ $subcate->id }}">Edit</a>
                                    <a class="btn btn-danger" href="{{ url('/delete-subcategory') }}/{{ $subcate->id }}">Delete</a>
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