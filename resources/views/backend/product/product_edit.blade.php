@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="container-full">
    <!-- Main content -->
    <section class="content">
        <!-- Basic Forms -->
        <div class="box">
            <div class="box-header with-border">
                <h4 class="box-title">Edit Product</h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col">
                        <form action="{{ route('product-update') }}" method="POST">
                            @csrf

                            <input type="hidden" name="id" value="{{ $products -> id }}">

                            <div class="row">
                                <div class="col-12">
                                    <div class="row"> <!--start 1st row -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Brand Select<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="brand_id" class="form-control" required>
                                                        <option value="" selected="" disabled="">Select Brand</option>
                                                        @foreach ($brands as $brand)
                                                        <option value="{{ $brand -> id }}" {{ ($brand -> id == $products -> brand_id) ? 'selected' : '' }}>{{ $brand -> brand_name_en }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('brand_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div><!--End col md 4 -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Category Select<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="category_id" class="form-control" required>
                                                        <option value="" selected="" disabled="">Select Category</option>
                                                        @foreach ($categories as $category)
                                                        <option value="{{ $category -> id }}" {{ ($category -> id == $products -> category_id) ? 'selected' : '' }}>{{ $category -> category_name_en }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('category_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div><!--End col md 4 -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>SubCategory Select<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="subcategory_id" class="form-control" required>
                                                        <option value="" selected="" disabled="">Select SubCategory</option>
                                                        @foreach ($subcategory as $subcat)
                                                        <option value="{{ $subcat -> id }}" {{ ($subcat -> id == $products -> subcategory_id) ? 'selected' : '' }}>{{ $subcat -> subcategory_name_en }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('subcategory_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div><!--End col md 4 -->
                                    </div><!--end 1st row -->
                                    <div class="row"> <!--start 2nd row -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Sub-Sub Category Select<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="subsubcategory_id" class="form-control" required>
                                                        <option value="" selected="" disabled="">Select SubSubCategory</option>
                                                        @foreach ($subsubcategory as $subsubcat)
                                                        <option value="{{ $subsubcat -> id }}" {{ ($subsubcat -> id == $products -> subsubcategory_id) ? 'selected' : '' }}>{{ $subsubcat -> subsubcategory_name_en }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('subsubcategory_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div><!--End col md 4 -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Product Name English <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="product_name_en" value="{{ $products -> product_name_en }}" class="form-control" required />
                                                    @error('product_name_en')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div><!--End col md 4 -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Product Name Bangla <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="product_name_bn" value="{{ $products -> product_name_bn }}" class="form-control" required />
                                                    @error('product_name_bn')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div><!--End col md 4 -->
                                    </div><!--end 2nd row -->
                                    <div class="row"> <!--start 3rd row -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Product Code <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="product_code" value="{{ $products -> product_code }}" class="form-control"/>
                                                    @error('product_code')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div><!--End col md 4 -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Product Quantity <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="product_qty" value="{{ $products -> product_qty}}" class="form-control" required/>
                                                    @error('product_qty')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div><!--End col md 4 -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Product Tags English<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" required name="product_tags_en" class="form-control" value="{{ $products -> product_tags_en }}" data-role="tagsinput" />
                                                    @error('product_tags_en')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div><!--End col md 4 -->
                                    </div><!--end 3rd row -->
                                    <div class="row"> <!--start 4th row -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Product Tags Bangla<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="product_tags_bn" class="form-control" value="{{ $products -> product_tags_bn }}" data-role="tagsinput" />
                                                    @error('product_tags_bn')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div><!--End col md 4 -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Product Size English<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" required name="product_size_en" class="form-control" value="{{ $products -> product_size_en }}" data-role="tagsinput" />
                                                    @error('product_size_en')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div><!--End col md 4 -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Product Size Bangla<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" required name="product_size_bn" class="form-control" value="{{ $products -> product_size_bn }}" data-role="tagsinput" />
                                                    @error('product_size_bn')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div><!--End col md 4 -->
                                    </div><!--end 4th row -->
                                    <div class="row"> <!--start 5th row -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Product Color English<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" required name="product_color_en" class="form-control" value="{{ $products -> product_color_en }}" data-role="tagsinput" />
                                                    @error('product_color_en')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div><!--End col md 6 -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Product Color Bangla<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" required name="product_color_bn" class="form-control" value="{{ $products -> product_color_bn }}" data-role="tagsinput" />
                                                    @error('product_color_bn')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div><!--End col md 6 -->
                                    </div><!--end 5th row -->
                                    <div class="row"> <!--start 6th row -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Product Selling Price <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" required name="selling_price" value="{{ $products -> selling_price }}" class="form-control"  />
                                                    @error('selling_price')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div><!--End col md 4 -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Discount Price <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="discount_price" value="{{ $products -> discount_price }}" class="form-control"  />
                                                    @error('discount_price')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div><!--End col md 4 -->
                                    </div><!--end 6th row -->
                                    <div class="row"> <!--start 7th row -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Short Description English <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <textarea name="short_desc_en" id="textarea" class="form-control" required>
                                                        {!! $products -> short_desc_en !!}
                                                    </textarea>
                                                    @error('short_desc_en')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div><!--End col md 6 -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Short Description Bangla <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <textarea name="short_desc_bn" id="textarea" class="form-control" required>
                                                        {!! $products -> short_desc_bn !!}
                                                    </textarea>
                                                    @error('short_desc_bn')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div><!--End col md 6 -->
                                    </div><!--end 7th row -->
                                    <div class="row"> <!--start 8th row -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Long Description English <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <textarea id="editor1" name="long_desc_en" rows="10" cols="80" required>
                                                        {!! $products -> long_desc_en !!}
                                                    </textarea>
                                                    @error('long_desc_en')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div><!--End col md 6 -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Long Description Bangla <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <textarea id="editor2" name="long_desc_bn" rows="10" cols="80" required>
                                                        {!! $products -> long_desc_bn !!}
                                                    </textarea>
                                                    @error('long_desc_bn')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div><!--End col md 6 -->
                                    </div><!--end 8th row -->
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="controls">
                                            <fieldset>
                                                <input type="checkbox" name="hot_deals" id="checkbox_2" value="1" {{ ($products -> hot_deals == 1) ? 'checked' : '' }} />
                                                <label for="checkbox_2">Hot Deals</label>
                                            </fieldset>
                                            <fieldset>
                                                <input type="checkbox" name="featured" id="checkbox_3" value="1" {{ ($products -> featured == 1) ? 'checked' : '' }} />
                                                <label for="checkbox_3">Featured</label>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="controls">
                                            <fieldset>
                                                <input type="checkbox" name="special_offer" id="checkbox_4" value="1" {{ ($products -> special_offer == 1) ? 'checked' : '' }} />
                                                <label for="checkbox_4">Special Offer</label>
                                            </fieldset>
                                            <fieldset>
                                                <input type="checkbox" name="special_deals" id="checkbox_5" value="1" {{ ($products -> special_deals == 1) ? 'checked' : '' }} />
                                                <label for="checkbox_5">Special Deals</label>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-xs-right">
                                <button type="submit" class="btn btn-rounded btn-info">Update Product</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->

    <!-- Multiple image update area -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
				<div class="box bt-3 border-info">
                    <div class="box-header">
                        <h4 class="box-title">Product Multiple Image <strong>Update</strong></h4>
                    </div>

                    <form action="{{ route('update-product-image') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row row-sm">
                            @foreach ($multiImgs as $img)
                                <div class="col-md-3 ml-3 mt-3">
                                    <div class="card">
                                        <img class="card-img-top" src="{{ asset($img -> photo_name) }}" height="130px" width="280px" />
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                <a href="{{ route('product-multiimg-delete', $img -> id) }}" class="btn btn-sm btn-danger" id="delete" title="Delete Data"><i class="fa fa-trash"></i></a>
                                            </h5>
                                            <p class="card-text">
                                                <div class="form-group">
                                                    <label for="" class="form-control-label">Change Image <span class="text-danger">*</span></label>
                                                    <input type="file" class="form-control" name="multi_img[{{ $img->id }}]" >
                                                </div>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="form-layout-footer ml-3">
                            <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Image">
                        </div>
                        <br><br>
                    </form>

				</div>
			</div>
        </div>
    </section><!--End Multiple image update area -->

    <!-- Product image thambnail update area -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
				<div class="box bt-3 border-info">
                    <div class="box-header">
                        <h4 class="box-title">Product Thambnail Image <strong>Update</strong></h4>
                    </div>

                    <form action="{{ route('update-product-thambnail') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{-- pass id --}}
                        <input type="hidden" name="id" value="{{ $products -> id }}">
                        <input type="hidden" name="old_img" value="{{ $products -> product_thambnail }}">

                        <div class="row row-sm">
                            <div class="col-md-3 ml-3 mt-3">
                                <div class="card">
                                    <img class="card-img-top" src="{{ asset($products -> product_thambnail) }}" height="130px" width="280px" />
                                    <div class="card-body">
                                        <p class="card-text">
                                            <div class="form-group">
                                                <label for="" class="form-control-label">Change Image <span class="text-danger">*</span></label>
                                                <input type="file" required name="product_thambnail" class="form-control" onchange="mainThambUrl(this)" />
                                                <img src="" id="mainThamb">
                                            </div>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-layout-footer ml-3">
                            <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Image">
                        </div>
                        <br><br>
                    </form>

				</div>
			</div>
        </div>
    </section><!--End product thambnail image update area -->
</div>

<script>
    function mainThambUrl(input){
        if(input.files && input.files[0]){
            let reader = new FileReader();
            reader.onload = function(e){
                $('#mainThamb').attr('src', e.target.result).width(80).height(80);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection
