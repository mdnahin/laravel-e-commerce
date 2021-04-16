@extends('backend.master')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-4">Add Topbar Title</h4>
                    @if(session('topbar'))

                        <div cla ss="alert alert-success alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Success!</strong> {{ session('topbar') }}
                        </div>
                        @endif
                @forelse(App\Topbar::all() as $topbar)
                <form action="{{ url('/topbar-update') }}" method="post">
                        @csrf
                        <input type="hidden" value="{{ $topbar->id }}" name="topbar_id">
                        <div class="">
                            <h5 class="font-14 mb-1">Title 1:</h5>
                            <p class="sub-header mb-2"> </p>                                                      
                            <input type="text" name="title_one" class="form-control" value="{{ $topbar->title_one }}">
                        </div>

                        <div class="">
                            <h5 class="font-14 mb-1">Title 2:</h5>
                            <p class="sub-header mb-2"> </p>                                                      
                            <input type="text" name="title_two" class="form-control" value="{{ $topbar->title_two }}">
                        </div>

                        <div class="mt-3">
                        <button type="submit" class="btn btn-info">Update</button>
                        </div>
                    </form>  
                @empty
                <form action="{{ url('/topbar-post') }}" method="post">
                        @csrf
                        
                        <div class="">
                            <h5 class="font-14 mb-1">Title 1:</h5>
                            <p class="sub-header mb-2"> </p>                                                      
                            <input type="text" name="title_one" class="form-control">
                        </div>

                        <div class="">
                            <h5 class="font-14 mb-1">Title 2:</h5>
                            <p class="sub-header mb-2"> </p>                                                      
                            <input type="text" name="title_two" class="form-control">
                        </div>

                        <div class="mt-3">
                        <button type="submit" class="btn btn-info">Add</button>
                        </div>
                    </form> 
                @endforelse
                </div>
                </div>
    </div>                      
    </div>
 </div>                                       
@endsection