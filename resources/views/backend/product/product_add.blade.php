@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="container-full">
    <!-- Main content -->
    <section class="content">
        <!-- Basic Forms -->
        <div class="box">
            <div class="box-header with-border">
                <h4 class="box-title">Add Product</h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col">
                        <form action="{{ route('product-store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
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
                                                        <option value="{{ $brand -> id }}">{{ $brand -> brand_name_en }}</option>
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
                                                        <option value="{{ $category -> id }}">{{ $category -> category_name_en }}</option>
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
                                                    <input type="text" name="product_name_en" class="form-control" required />
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
                                                    <input type="text" name="product_name_bn" class="form-control" required />
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
                                                    <input type="text" name="product_code" class="form-control"/>
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
                                                    <input type="text" name="product_qty" class="form-control" required/>
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
                                                    <input type="text" required name="product_tags_en" class="form-control" value="v-neck,round-neck,popular" data-role="tagsinput" />
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
                                                    <input type="text" name="product_tags_bn" class="form-control" value="পপুলার,রাউন্ড নেক,ভি নেক" data-role="tagsinput" />
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
                                                    <input type="text" required name="product_size_en" class="form-control" value="SM,M,L,XL,XLL" data-role="tagsinput" />
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
                                                    <input type="text" required name="product_size_bn" class="form-control" value="ছোট,বড়,মাজারি,এক্সেল" data-role="tagsinput" />
                                                    @error('product_size_bn')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div><!--End col md 4 -->
                                    </div><!--end 4th row -->
                                    <div class="row"> <!--start 5th row -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Product Color English<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" required name="product_color_en" class="form-control" value="Red,Green,Yellow,Blue,white" data-role="tagsinput" />
                                                    @error('product_color_en')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div><!--End col md 4 -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Product Color Bangla<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" required name="product_color_bn" class="form-control" value="লাল,নীল,হলুদ,ব্লু,সাদা" data-role="tagsinput" />
                                                    @error('product_color_bn')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div><!--End col md 4 -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Product Selling Price <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" required name="selling_price" class="form-control"  />
                                                    @error('selling_price')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div><!--End col md 4 -->
                                    </div><!--end 5th row -->
                                    <div class="row"> <!--start 6th row -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Discount Price <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" required name="discount_price" class="form-control"  />
                                                    @error('discount_price')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div><!--End col md 4 -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Main Thambnail <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="file" required name="product_thambnail" class="form-control" onchange="mainThambUrl(this)" />
                                                    @error('product_thambnail')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                    <img src="" id="mainThamb">
                                                </div>
                                            </div>
                                        </div><!--End col md 4 -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Multiple Image <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="file" required id="multiImg" name="multi_img[]" class="form-control" multiple />
                                                    @error('multi_img')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                    <div class="row" id="preview_img">

                                                    </div>
                                                </div>
                                            </div>
                                        </div><!--End col md 4 -->
                                    </div><!--end 6th row -->
                                    <div class="row"> <!--start 7th row -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Short Description English <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <textarea name="short_desc_en" id="textarea" class="form-control" required></textarea>
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
                                                    <textarea name="short_desc_bn" id="textarea" class="form-control" required></textarea>
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
                                                        This is my textarea to be replaced with CKEditor.
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
                                                        This is my textarea to be replaced with CKEditor.
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
                                                <input type="checkbox" name="hot_deals" id="checkbox_2" value="1" />
                                                <label for="checkbox_2">Hot Deals</label>
                                            </fieldset>
                                            <fieldset>
                                                <input type="checkbox" name="featured" id="checkbox_3" value="1" />
                                                <label for="checkbox_3">Featured</label>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="controls">
                                            <fieldset>
                                                <input type="checkbox" name="special_offer" id="checkbox_4" value="1" />
                                                <label for="checkbox_4">Special Offer</label>
                                            </fieldset>
                                            <fieldset>
                                                <input type="checkbox" name="special_deals" id="checkbox_5" value="1" />
                                                <label for="checkbox_5">Special Deals</label>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-xs-right">
                                <button type="submit" class="btn btn-rounded btn-info">Add Product</button>
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
</div>

<script>
    $(document).ready(function(){
        $('select[name="category_id"]').on('change', function(){
            var category_id = $(this).val();
            if(category_id){
                $.ajax({
                    url: "{{ url('/category/subcategory/ajax') }}/" +category_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data){
                        $('select[name="subsubcategory_id"]').html('');
                        var d = $('select[name="subcategory_id"]').empty();
                        $.each(data, function(key, value){
                            $('select[name="subcategory_id"]').append('<option value="'+value.id+'">' + value.subcategory_name_en +'</option>');
                        });
                    },
                });
            }else{
                alert('danger');
            }
        });

        // show sub-sub category
        $('select[name="subcategory_id"]').on('change', function(){
            var subcategory_id = $(this).val();
            if(subcategory_id){
                $.ajax({
                    url: "{{ url('/category/sub-subcategory/ajax') }}/" +subcategory_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data){
                        var d = $('select[name="subsubcategory_id"]').empty();
                        $.each(data, function(key, value){
                            $('select[name="subsubcategory_id"]').append('<option value="'+value.id+'">' + value.subsubcategory_name_en +'</option>');
                        });
                    },
                });
            }else{
                alert('danger');
            }
        });
    });
</script>

{{-- for main thumb show --}}
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

<script>
$(document).ready(function(){
    $('#multiImg').on('change', function(){ //on file input change
    if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
    {
        var data = $(this)[0].files; //this file data

        $.each(data, function(index, file){ //loop though each file
            if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                var fRead = new FileReader(); //new filereader
                fRead.onload = (function(file){ //trigger function on successful read
                return function(e) {
                    var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(80)
                .height(80); //create image element
                    $('#preview_img').append(img); //append image to output element
                };
                })(file);
                fRead.readAsDataURL(file); //URL representing the file's data.
            }
        });

    }else{
        alert("Your browser doesn't support File API!"); //if File API is absent
    }
    });
});

</script>
@endsection
