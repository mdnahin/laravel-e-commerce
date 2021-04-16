@extends('backend.master')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-4">Create Testimonial</h4>
                    <a class="btn btn-primary float-right" href="{{ url('/all-testimonial') }}">All Testimonial</a>
                    @if(session('success'))
                        
                        <div class="alert alert-success alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Success!</strong> {{ session('success') }}.
                        </div>
                        @endif

                        <h3>Testimonial Area Title:</h3>
                        @if($count > 0)
                        <form action="{{ url('/testimonial-title-update') }}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $title->id }}" />
                            <div class="">
                                <h5 class="font-14 mb-1">Testimonial Area Title Text:</h5>
                                <p class="sub-header mb-2"> </p>                                                      
                                <input type="text" name="title" value="{{ $title->title ?? '' }}" placeholder="Client Name" class="form-control @error('client_name') is-invalid  @enderror" autocomplete="off">
                                
                            </div>
                            <div class="mt-3">
                            <button type="submit" class="btn btn-info">Update</button>
                            </div>
                        </form>    
                        @else
                        <form action="{{ url('/testimonial-title') }}" method="post">
                            @csrf
                            <div class="">
                                <h5 class="font-14 mb-1">Testimonial Area Title Text:</h5>
                                <p class="sub-header mb-2"> </p>                                                      
                                <input type="text" name="title" id="category_name-ajax" placeholder="Client Name" class="form-control @error('client_name') is-invalid  @enderror" autocomplete="off">
                                
                            </div>
                            <div class="mt-3">
                            <button type="submit" class="btn btn-info">Add</button>
                            </div>
                        </form>    
                        @endif
                        
                    <!--Client Area-->
                    <br>
                    <h3>Client Details:</h3>
                        <form action="{{ url('/add-testimonial') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="">
                            <h5 class="font-14 mb-1">Client Name:</h5>
                            <p class="sub-header mb-2"> </p>                                                      
                            <input type="text" name="client_name" id="category_name-ajax" placeholder="Client Name" class="form-control @error('client_name') is-invalid  @enderror" autocomplete="off">
                            @error('client_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="">
                            <h5 class="font-14 mb-1">Client Designation:</h5>
                            <p class="sub-header mb-2"> </p>                                                      
                            <input type="text" name="client_designation" id="category_name-ajax" placeholder="Client Designation" class="form-control @error('client_designation') is-invalid  @enderror" autocomplete="off">
                            @error('client_designation')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="">
                            <h5 class="font-14 mb-1">Client Quote:</h5>
                            <p class="sub-header mb-2"> </p>                                                      
                            <textarea class="form-control" name="desc"> </textarea>
                        </div>

                        <div class="">
                            <h5 class="font-14 mb-1">Client Image:</h5>
                            <p class="sub-header mb-2"> </p>                                                      
                            <input type="file" name="client_img" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])"  class="form-control" />
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