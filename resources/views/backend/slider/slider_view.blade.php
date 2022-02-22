@extends('admin.admin_master')
@section('admin')
<div class="container-full">


    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-8">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Slider List</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Slider Title En</th>
                                        <th>Slider Title Bn</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sliders as $item)
                                    <tr>
                                        <td><img src="{{ asset($item -> slider_image) }} " style="width: 70px; height:40px"></td>
                                        <td>
                                            @if ($item ->slider_title_en == NULL)
                                                <span class="badge badge-pill badge-danger">No Title</span>
                                                @else
                                                {{ $item -> slider_title_en }}
                                            @endif
                                        </td>
                                        <td>
                                            @if ($item ->slider_title_bn == NULL)
                                                <span class="badge badge-pill badge-danger">No Title</span>
                                                @else
                                                {{ $item -> slider_title_bn }}
                                            @endif
                                        </td>
                                        <td>
                                            @if ($item ->slider_desc_en == NULL)
                                                <span class="badge badge-pill badge-danger">No Description</span>
                                                @else
                                                {{ $item -> slider_desc_en }}
                                            @endif
                                        </td>
                                        <td>
                                            @if ($item ->status == 1)
                                                <span class="badge badge-pill badge-success">Active</span>
                                                @else
                                                <span class="badge badge-pill badge-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td width="25%">
                                            <a href="{{ route('slider.edit', $item -> id) }}" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
                                            <a href="{{ route('slider.delete', $item -> id) }}" class="btn btn-danger btn-sm" id="delete"><i class="fa fa-trash"></i></a>
                                            @if ($item ->status == 1)
                                                <a href="{{ route('slider-inactive', $item -> id) }}" class="btn btn-danger btn-sm"><i class="fa fa-arrow-down" title="Inactive Now"></i></a>
                                                @else
                                                <a href="{{ route('slider-active', $item -> id) }}" class="btn btn-success btn-sm"><i class="fa fa-arrow-up" title="Active Now"></i></a>
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

            <!-----add brand page------->
            <div class="col-4">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Slider</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <form action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <h5>Slider Title English</h5>
                                    <div class="controls">
                                        <input type="text" name="slider_title_en" class="form-control" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Slider Title Bangla</h5>
                                    <div class="controls">
                                        <input type="text" name="slider_title_bn" class="form-control" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Slider Description English</h5>
                                    <div class="controls">
                                        <input type="text" name="slider_desc_en" class="form-control"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Slider Description Bangla</h5>
                                    <div class="controls">
                                        <input type="text" name="slider_desc_bn" class="form-control"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Brand Image <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="file" name="slider_image" class="form-control"/>
                                    </div>
                                </div>
                                <div class="text-xs-right">
                                    <button type="submit" class="btn btn-rounded btn-info">Add Slider</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>


@endsection
