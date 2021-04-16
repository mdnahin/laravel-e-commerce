@extends('backend.dashboard')
@section('content')


<div class="content">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-4">Update SubCategory</h4>
                    @if(session('create'))

                        <div class="alert alert-success alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Success!</strong> {{ session('create') }}.
                        </div>
                        @endif
                        <form action="{{ url('/update-subcategory/'.$subcategory->id) }}" method="post">
                        @csrf
                        <div class="">
                        
                            <h5 class="font-14 mb-1">SubCategory Name:</h5>
                            <p class="sub-header mb-2"> </p>                                                      
                            <input type="text" value="{{ $subcategory->subcategory_name }}" name="subcategory_name" class="form-control @error('category_name') is-invalid  @enderror" autocomplete="off">
                            @error('category_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            
                        </div>

                        <div class="mt-3">
                        <label for="">Select Category:</label>
                        <select name="category_id" id="category_id">
                            <option value="{{ $subcategory->category_id }}">{{ $subcategory->subcategory_name }}</option>
                            @foreach($category as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->category_name }}</option>
                            @endforeach
                        </select>
                        </div>

                        <div class="mt-3">
                        <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>    
                </div>
                </div>
    </div>                      
    </div>
@endsection