@extends('backend.master')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-4">Create Category</h4>
                    @if(session('success'))

                        <div class="alert alert-success alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Success!</strong> {{ session('success') }}.
                        </div>
                        @endif
                        <form action="{{ url('/create-category') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="">
                            <h5 class="font-14 mb-1">Category Name:</h5>
                            <p class="sub-header mb-2"> </p>                                                      
                            <input type="text" name="category_name" id="category_name-ajax" placeholder="Category Name" class="form-control @error('category_name') is-invalid  @enderror" autocomplete="off">
                            @error('category_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="">
                            <h5 class="font-14 mb-1">Category Image:</h5>
                            <p class="sub-header mb-2"> </p>                                                      
                            <input type="file" name="category_image" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])"  class="form-control" />
                        </div>

                        <div class="">
                            <h5 class="font-14 mb-1">Image Preview:</h5>                                                   
                            <img src="" id="blah" width="100" height="100" alt="">
                        </div>

                        <div class="mt-3">
                        <button type="submit" class="btn btn-info">Create</button>
                        </div>
                    </form>    
                </div>
                </div>
    </div>                      
    </div>
 </div>                                       
@endsection