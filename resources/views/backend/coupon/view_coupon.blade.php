@extends('backend.dashboard')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                <a class="btn btn-primary float-right" href="{{ url('/add-coupon') }}"> Create Coupon</a>
                    <h4 class="header-title mb-4">All Category</h4>
                    
                    @if(session('delete'))

                        <div class="alert alert-success alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Success!</strong> {{ session('delete') }}.
                        </div>
                        @endif
                        @if(session('update'))

                        <div class="alert alert-success alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Success!</strong> {{ session('update') }}.
                        </div>
                        @endif
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">SL</th>
                                <th scope="col">Coupon Code</th>
                                <th scope="col">Coupon Discount</th>
                                <th scope="col">Coupon Validity</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                             @foreach($coupons as $key=>$coupon)
                                <tr>
                                    <td>{{ $coupon->id }}</td>
                                    <td>{{ $coupon->coupon_code }}</td>
                                    <td>{{ $coupon->coupon_discount }}</td>
                                    <td>{{ $coupon->coupon_validity }}</td>
                                    
                                    <td>{{ $coupon->created_at ?? 'N/A' }}</td>
                                    
                                    <td>
                                        <a class="btn btn-success" href="{{ url('/edit-coupon') }}/{{ $coupon->id }}">Edit</a>
                                        <a class="btn btn-danger" href="{{ url('/delete-coupon') }}/{{ $coupon->id }}">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            
                        </tbody>
                        
                    </table>
                    
                </div>
                </div>
    </div>                      
    </div>
 </div> 
 @endsection