@extends('layouts.admin')

@section('content')

    <div class="col-sm-12">
        @if (count($products))
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Product List</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered datatable">
                        <thead>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Brand</th>
                            <th>Category</th>
                            <th>Sub Category</th>
                            <th>Price</th>
                            <th>Barcode</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach ($products as $p)
                                <tr>
                                    <td><img width="65" src="{{ $p->images[0]->image }}"></td>
                                    <td>{{ $p->title }}</td>
                                    <td>{{ $p->brand->name }}</td>
                                    <td>{{ $p->category->name }}</td>
                                    <td>{{ $p->subCategory->name }}</td>
                                    <td>{{ $p->price->buying_price }}</td>
                                    <td>{{ $p->barcode }}</td>
                                    <td>
                                        {{-- <a href="{{ route('product.show',$p->slug) }}" class="btn btn-info"><i class="fa fa-eye"></i></a> --}}
                                        <a href="{!! route('product.details.create', $p->id) !!}" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                                        <a href="" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @else
            <div class="panel panel-default">
                <div class="panel-body">
                    No product found
                </div>
            </div>
        @endif
    </div>

@endsection
