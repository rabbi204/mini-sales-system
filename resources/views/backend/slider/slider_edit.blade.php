@extends('admin.admin_master')
@section('admin')
<div class="container-full">


    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Slider</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <form action="{{ route('slider.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" name="id" value="{{ $sliders -> id }}">
                                <input type="hidden" name="old_img" value="{{ $sliders -> slider_image }}">

                                <div class="form-group">
                                    <h5>Slider Title English</h5>
                                    <div class="controls">
                                        <input type="text" name="slider_title_en" value="{{ $sliders -> slider_title_en }}" class="form-control" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Slider Title Bangla</h5>
                                    <div class="controls">
                                        <input type="text" name="slider_title_bn" value="{{ $sliders -> slider_title_bn }}" class="form-control" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Slider Description English</h5>
                                    <div class="controls">
                                        <input type="text" name="slider_desc_en" value="{{ $sliders -> slider_desc_en }}" class="form-control"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Slider Description Bangla</h5>
                                    <div class="controls">
                                        <input type="text" name="slider_desc_bn" value="{{ $sliders -> slider_desc_bn }}" class="form-control"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Brand Image <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="file" name="slider_image" value="{{ $sliders -> slider_image }}" class="form-control"/>
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
