@extends('admin.admin_master')
@section('admin')
<div class="container-full">


    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Product List</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Product English</th>
                                        <th>Product Price</th>
                                        <th>Discount Price</th>
                                        <th>Qauntity</th>
                                        <th>status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $item)
                                    <tr>
                                        <td><img src="{{ asset($item -> product_thambnail) }}" width="60px" height="50px"></td>
                                        <td>{{ $item -> product_name_en }}</td>
                                        <td>{{ $item -> selling_price }} Taka</td>
                                        <td>
                                            @if ($item -> discount_price == NULL)
                                                <span class="badge badge-pill badge-danger">No Discount</span>
                                                @else
                                                @php
                                                    $amount = $item -> selling_price - $item -> discount_price;
                                                    $discount = ($amount / $item -> selling_price) * 100;
                                                @endphp
                                                <span class="badge badge-pill badge-success">{{ round($discount) }} %</span>
                                            @endif
                                        </td>
                                        <td>{{ $item -> product_qty }} pic</td>
                                        <td>
                                            @if ($item ->status == 1)
                                                <span class="badge badge-pill badge-success">Active</span>
                                                @else
                                                <span class="badge badge-pill badge-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td width="25%">
                                            <a href="{{ route('product-edit', $item -> id) }}" class="btn btn-warning btn-sm"><i class="fa fa-pencil" title="Edit"></i></a>
                                            <a href="{{ route('product-delete', $item -> id) }}" class="btn btn-danger btn-sm" id="delete"><i class="fa fa-trash" title="Delete"></i></a>
                                            @if ($item ->status == 1)
                                                <a href="{{ route('product-inactive', $item -> id) }}" class="btn btn-danger btn-sm"><i class="fa fa-arrow-down" title="Inactive Now"></i></a>
                                                @else
                                                <a href="{{ route('product-active', $item -> id) }}" class="btn btn-success btn-sm"><i class="fa fa-arrow-up" title="Active Now"></i></a>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>


@endsection
