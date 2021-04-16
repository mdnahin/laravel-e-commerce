@extends('backend.master')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                <a class="btn btn-info float-right" href="{{ url('/all-slide') }}">All Slide</a>
                    <h4 class="header-title mb-4">Create Slide</h4>
                   
                    @if(session('slider'))

                        <div class="alert alert-success alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Success!</strong> {{ session('slider') }}.
                        </div>
                        @endif
                        <form action="{{ url('/slider-post') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="">
                            <h5 class="font-14 mb-1">Title:</h5>
                            <p class="sub-header mb-2"> </p>                                                      
                            <input type="text" name="slider_title" id="category_name-ajax" placeholder="Slider Title" class="form-control @error('slider_title') is-invalid  @enderror" autocomplete="off">
                            @error('slider_title')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="">
                            <h5 class="font-14 mb-1">Slider Content:</h5>
                            <p class="sub-header mb-2"> </p>  
                            <textarea name="slider_content" class="form-control"></textarea>                                                    
                            @error('slider_content')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="">
                            <h5 class="font-14 mb-1">Slider Image:</h5>
                            <p class="sub-header mb-2"> </p>                                                      
                            <input type="file" name="slider_image" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])"  class="form-control" />
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