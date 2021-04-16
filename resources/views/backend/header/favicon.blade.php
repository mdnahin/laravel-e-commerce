@extends('backend.master')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-4">Upload Fav-Icon</h4>
                    @if(session('fav-icon'))

                        <div class="alert alert-success alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Success!</strong> {{ session('fav-icon') }}.
                        </div>
                        @endif

            @forelse($fav_icon as $fav_img)

                <form action="{{ url('/update-favicon') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="fav_id" value="{{ $fav_img->id }}">
                        <div class="">
                            <h5 class="font-14 mb-1">FavIcon Image:</h5>
                            <p class="sub-header mb-2"> </p>                                                      
                            <input type="file" name="favicon_image" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])"  class="form-control @error('product_name') is-invalid  @enderror" autocomplete="off" />
                            @error('favicon_image')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="">
                            <h5 class="font-14 mb-1">Image Preview:</h5>                                                   
                            <img src="{{ url('img') }}/logo/{{ $fav_img->favicon_image }}" id="blah" width="100" height="100" alt="">
                        </div>

                        <div class="mt-3">
                        <button type="submit" class="btn btn-info">Update</button>
                        </div>
                    </form>  
                @empty
                <form action="{{ url('/add-favicon') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="">
                            <h5 class="font-14 mb-1">FavIcon Image:</h5>
                            <p class="sub-header mb-2"> </p>                                                      
                            <input type="file" name="favicon_image" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])"  class="form-control @error('product_name') is-invalid  @enderror" autocomplete="off" />
                            @error('favicon_image')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="">
                            <h5 class="font-14 mb-1">Image Preview:</h5>                                                   
                            <img src="" id="blah" width="100" height="100" alt="">
                        </div>

                        <div class="mt-3">
                        <button type="submit" class="btn btn-info">Save</button>
                        </div>
                    </form>  
            @endforelse  
                </div>
                </div>
    </div>                      
    </div>
 </div>                                       
@endsection