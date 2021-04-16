@extends('backend.master')
@section('content')


<div class="content">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-4">Create Product</h4>
                    @if(session('product_create'))

                        <div class="alert alert-success alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Success!</strong> {{ session('product_create') }}.
                        </div>
                        @endif
                        <form action="{{ url('/create-product') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="">
                            <h5 class="font-14 mb-1">Product Name:</h5>                                                   
                            <input type="text" value="{{ old('product_name') }}" name="product_name" class="form-control @error('product_name') is-invalid  @enderror" autocomplete="off">
                            @error('product_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror   
                        </div>

                        <div class="">
                        <div class="mt-3">
                            <label for="">Select Category:</label>
                            <select name="category_id" id="category_id" class="form-control">
                                <option value="">Select One</option>
                                @foreach($cat as $category)
                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                        </div>  
                        </div>

                        <div class="">                                                 
                            <div class="mt-3">
                                <label for="">Select SubCategory:</label>
                                <select name="subcategory_id" id="subcategory_id" class="form-control">
                                    <option value="">Select One</option>
                                    @foreach($subcat as $subcategory)
                                    <option value="{{ $subcategory->id}}">{{ $subcategory->subcategory_name }}</option>
                                    @endforeach
                                </select>
                            </div>  
                        </div>

                        <div class="">
                            <h5 class="font-14 mb-1">Product Price:</h5>                                                   
                            <input type="text" value="{{ old('product_price') }}" name="product_price" class="form-control @error('product_price') is-invalid  @enderror" autocomplete="off">
                            @error('product_price')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror   
                        </div>

                        <div class="">
                            <h5 class="font-14 mb-1">Product Quantity:</h5>                                                   
                            <input type="number" value="{{ old('product_quantity') }}" name="product_quantity" class="form-control @error('product_quantity') is-invalid  @enderror" autocomplete="off">
                            @error('product_quantity')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror   
                        </div>
                        <div class="">
                            <h5 class="font-14 mb-1">Product Summery:</h5>                                                   
                            <textarea name="product_summery" value="{{ old('product_summery') }}" class="form-control"></textarea>  
                        </div>
                        <div class="">
                            <h5 class="font-14 mb-1">Product Description:</h5>                                                   
                            <textarea name="product_description" value="{{ old('product_description') }}" class="form-control"></textarea> 
                        </div>
                        <div class="">
                            <h5 class="font-14 mb-1">Product Thumbnail:</h5>                                                   
                            <input type="file" name="product_thumbnail" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])"  class="form-control" />
                        </div>
                        <div class="">
                            <h5 class="font-14 mb-1">Product Preview:</h5>                                                   
                            <img src="" id="blah" width="100" height="100" alt="">
                        </div>

                        <div class="">
                            <h5 class="font-14 mb-1">Product Gallery:</h5>                                                   
                            <input type="file" multiple name="product_gallery[]" onchange="document.getElementById('blah2').src = window.URL.createObjectURL(this.files[0])"  class="form-control" />
                        </div>

                        <div class="mt-3">
                        <button type="submit" class="btn btn-info">Create</button>
                        </div>
                    </form>    
                </div>
                </div>
    </div>                      
    </div>

@endsection
