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

                    
                    <h3>Client Details:</h3>
                        <form action="{{ url('/update-testimonial/'.$testimonial->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="">
                            <h5 class="font-14 mb-1">Client Name:</h5>
                            <p class="sub-header mb-2"> </p>                                                      
                            <input type="text" name="client_name" value="{{ $testimonial->client_name }}" placeholder="Client Name" class="form-control @error('client_name') is-invalid  @enderror" autocomplete="off">
                            @error('client_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="">
                            <h5 class="font-14 mb-1">Client Designation:</h5>
                            <p class="sub-header mb-2"> </p>                                                      
                            <input type="text" name="client_designation" value="{{ $testimonial->client_designation }}" placeholder="Client Designation" class="form-control @error('client_designation') is-invalid  @enderror" autocomplete="off">
                            @error('client_designation')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="">
                            <h5 class="font-14 mb-1">Client Quote:</h5>
                            <p class="sub-header mb-2"> </p>                                                      
                            <textarea class="form-control" name="desc"> {{ $testimonial->desc }}</textarea>
                        </div>

                        <div class="">
                            <h5 class="font-14 mb-1">Client Image:</h5>
                            <p class="sub-header mb-2"> </p>                                                      
                            <input type="file" name="client_img" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])"  class="form-control" />
                        </div>

                        <div class="">
                            <h5 class="font-14 mb-1">Image Preview:</h5>                                                   
                            <img src="{{ url('img/testimonial') }}/{{ $testimonial->client_img }}" id="blah" width="100" height="100" alt="">
                        </div>

                        <div class="mt-3">
                        <button type="submit" class="btn btn-info">Update</button>
                        </div>
                    </form>    
                </div>
                </div>
    </div>                      
    </div>
 </div>                                       
@endsection