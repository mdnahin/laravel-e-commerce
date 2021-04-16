@extends('backend.master')
@section('content')


<div class="content">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-4">Create SubCategory</h4>
                    @if(session('create'))

                        <div class="alert alert-success alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Success!</strong> {{ session('create') }}.
                        </div>
                        @endif
                        <form action="{{ url('/create-subcategory') }}" method="post">
                        @csrf
                        <div class="">
                        
                            <h5 class="font-14 mb-1">SubCategory Name:</h5>
                            <p class="sub-header mb-2"> </p>                                                      
                            <input type="text" value="{{ old('subcategory_name') }}" name="subcategory_name" class="form-control @error('category_name') is-invalid  @enderror" autocomplete="off">
                            @error('category_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            
                        </div>

                        <div class="mt-3">
                            <label for="">Select Category:</label>
                            <select name="category_id" id="category_id" class="form-control">
                                <option value="">Select One</option>
                                @foreach($category as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->category_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mt-3">
                        <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </form>    
                </div>
                </div>
    </div>                      
    </div>

@endsection