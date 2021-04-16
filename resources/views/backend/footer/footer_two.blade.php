@extends('backend.master')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-4">Footer Two</h4>
                    @if(session('success'))

                        <div class="alert alert-success alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Success!</strong> {{ session('success') }}.
                        </div>
                        @endif
                        @if(App\FooterTwo::count() > 0)
                        <form action="{{ url('/update-footer-two') }}" method="post" >
                                @csrf
                                <div class="">
                                    <h5 class="font-14 mb-1">Footer Descriptio:</h5>
                                    <p class="sub-header mb-2"> </p>                                                      
                                    <textarea name="footer_desc" class="form-control">{{ $footer_items->footer_desc }}</textarea>
                                </div>

                                <div class="">
                                    <h5 class="font-14 mb-1">Email address:</h5>
                                    <p class="sub-header mb-2"> </p>                                                      
                                    <input type="text" name="email" value="{{ $footer_items->email }}" placeholder="Email address" class="form-control @error('category_name') is-invalid  @enderror" autocomplete="off">
                                    
                                </div>

                                <div class="">
                                    <h5 class="font-14 mb-1">Telephone:</h5>
                                    <p class="sub-header mb-2"> </p>                                                      
                                    <input type="text" name="telephone" value="{{ $footer_items->telephone }}" placeholder="Telephone Number" class="form-control @error('category_name') is-invalid  @enderror" autocomplete="off">
                                </div>

                                <div class="">
                                    <h5 class="font-14 mb-1">Address:</h5>
                                    <p class="sub-header mb-2"> </p>                                                      
                                    <textarea name="address"  class="form-control">{{ $footer_items->address }} </textarea>
                                </div>

                                <div class="">
                                    <h5 class="font-14 mb-1">Copy Right Text:</h5>
                                    <p class="sub-header mb-2"> </p> 
                                    <input type="text" name="copy_right" value="{{ $footer_items->copy_right }}" placeholder="Copy Right Text" class="form-control @error('category_name') is-invalid  @enderror" autocomplete="off">                                                     
                                    
                                </div>

                                <div class="mt-3">
                                <button type="submit" class="btn btn-info">Upade</button>
                                </div>
                            </form>     
                        @else
                            <form action="{{ url('/create-footer-two') }}" method="post" >
                                @csrf
                                <div class="">
                                    <h5 class="font-14 mb-1">Footer Descriptio:</h5>
                                    <p class="sub-header mb-2"> </p>                                                      
                                    <textarea name="footer_desc" class="form-control"> </textarea>
                                </div>

                                <div class="">
                                    <h5 class="font-14 mb-1">Email address:</h5>
                                    <p class="sub-header mb-2"> </p>                                                      
                                    <input type="text" name="email" id="category_name-ajax" placeholder="Email address" class="form-control @error('category_name') is-invalid  @enderror" autocomplete="off">
                                    @error('category_name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="">
                                    <h5 class="font-14 mb-1">Telephone:</h5>
                                    <p class="sub-header mb-2"> </p>                                                      
                                    <input type="text" name="telephone" id="category_name-ajax" placeholder="Telephone Number" class="form-control @error('category_name') is-invalid  @enderror" autocomplete="off">
                                </div>

                                <div class="">
                                    <h5 class="font-14 mb-1">Address:</h5>
                                    <p class="sub-header mb-2"> </p>                                                      
                                    <textarea name="address" class="form-control"> </textarea>
                                </div>

                                <div class="">
                                    <h5 class="font-14 mb-1">Copy Right Text:</h5>
                                    <p class="sub-header mb-2"> </p> 
                                    <input type="text" name="copy_right" id="category_name-ajax" placeholder="Copy Right Text" class="form-control @error('category_name') is-invalid  @enderror" autocomplete="off">                                                     
                                    
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