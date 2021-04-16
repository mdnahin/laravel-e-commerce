@extends('backend.dashboard')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-4">All Category</h4>
                    @if(session('delete'))

                        <div class="alert alert-danger alert-dismissible">
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
                                <th scope="col">Product Name</th>
                                <th scope="col">Category</th>
                                <th scope="col">Subcategory</th>
                                <th scope="col">Product Price</th>
                                <th scope="col">Product Quantity</th>
                                <th scope="col">Product Thumbnail</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                             @foreach($product as $key=>$item)
                                <tr>
                                    <td>{{ $product->firstItem() + $key }}</td>
                                    <td>{{ $item->product_name ?? "N/A"}}</td>
                                    <td>{{ $item->get_category->category_name  ?? "N/A" }}</td>
                                    <td>{{ $item->get_subcategory->subcategory_name  ?? "N/A" }}</td>
                                    <td>${{ $item->product_price  ?? "N/A" }}</td>
                                    <td>{{ $item->product_quantity  ?? "N/A" }}</td>
                                    <td><img src="{{ url('/img/thumbnail/').'/'.$item->product_thumbnail ?? '' }}"  width="100" alt=""></td>
                                    <td>{{ $item->created_at->diffForHumans() ?? 'N/A' }}</td>
                                    
                                    <td>
                                        <a class="btn btn-success btn-sm" href="{{ url('/edit-product') }}/{{ $item->id }}">Edit</a>
                                        <a class="btn btn-danger btn-sm" href="{{ url('/delete-product') }}/{{ $item->id }}">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            
                        </tbody>
                        
                    </table>
                    {{ $product->links() }}
                </div>
                </div>
    </div>                      
    </div>
 </div> 
 @endsection