@extends('backend.master')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-4">Footer One</h4>
                    @if(session('success'))

                        <div class="alert alert-success alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Success!</strong> {{ session('success') }}.
                        </div>
                        @endif
                        @if(App\FooterOne::count() > 0)
                        <form action="{{ url('/update-social-link') }}" method="post" >
                            @csrf
                            <div class="">
                                <h5 class="font-14 mb-1">Facebook Link:</h5>
                                <p class="sub-header mb-2"> </p>                                                      
                                <input type="text" name="facebook" value="{{ $link->facebook }}" placeholder="Category Name" class="form-control @error('category_name') is-invalid  @enderror" autocomplete="off">
                                @error('category_name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="">
                                <h5 class="font-14 mb-1">Twitter Link:</h5>
                                <p class="sub-header mb-2"> </p>                                                      
                                <input type="text" name="twitter" value="{{ $link->twitter }}" placeholder="Category Name" class="form-control @error('category_name') is-invalid  @enderror" autocomplete="off">
                                @error('category_name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="">
                                <h5 class="font-14 mb-1">Linkden Link:</h5>
                                <p class="sub-header mb-2"> </p>                                                      
                                <input type="text" name="linkden" value="{{ $link->linkden }}" placeholder="Category Name" class="form-control @error('category_name') is-invalid  @enderror" autocomplete="off">
                                @error('category_name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="">
                                <h5 class="font-14 mb-1">Instragram Link:</h5>
                                <p class="sub-header mb-2"> </p>                                                      
                                <input type="text" name="instragram" value="{{ $link->instragram }}" placeholder="Category Name" class="form-control @error('category_name') is-invalid  @enderror" autocomplete="off">
                                @error('instragram_link')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mt-3">
                            <button type="submit" class="btn btn-info">Update</button>
                            </div>
                        </form>    
                        @else
                            <form action="{{ url('/create-social-link') }}" method="post" >
                                @csrf
                                <div class="">
                                    <h5 class="font-14 mb-1">Facebook Link:</h5>
                                    <p class="sub-header mb-2"> </p>                                                      
                                    <input type="text" name="facebook" id="category_name-ajax" placeholder="Category Name" class="form-control @error('category_name') is-invalid  @enderror" autocomplete="off">
                                    @error('category_name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="">
                                    <h5 class="font-14 mb-1">Twitter Link:</h5>
                                    <p class="sub-header mb-2"> </p>                                                      
                                    <input type="text" name="twitter" id="category_name-ajax" placeholder="Category Name" class="form-control @error('category_name') is-invalid  @enderror" autocomplete="off">
                                    @error('category_name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="">
                                    <h5 class="font-14 mb-1">Linkden Link:</h5>
                                    <p class="sub-header mb-2"> </p>                                                      
                                    <input type="text" name="linkden" id="category_name-ajax" placeholder="Category Name" class="form-control @error('category_name') is-invalid  @enderror" autocomplete="off">
                                    @error('category_name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="">
                                    <h5 class="font-14 mb-1">Instragram Link:</h5>
                                    <p class="sub-header mb-2"> </p>                                                      
                                    <input type="text" name="instragram" id="category_name-ajax" placeholder="Category Name" class="form-control @error('category_name') is-invalid  @enderror" autocomplete="off">
                                    @error('instragram_link')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mt-3">
                                <button type="submit" class="btn btn-info">Save</button>
                                </div>
                            </form>    
                        @endif
                        
                </div>
                </div>
    </div>                      
    </div>
 </div>                                       
@endsection