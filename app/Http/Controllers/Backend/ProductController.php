<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use App\Http\Controllers\Controller;
use App\Models\MultiImg;
use App\Models\SubCategory;
use App\Models\SubSubCategory;

class ProductController extends Controller
{
    /**
     *  product page show
     */
    public function addProduct()
    {
        $categories = Category::latest() -> get();
        $brands = Brand::latest() -> get();
        return view('backend.product.product_add', compact('categories','brands'));
    }
    /**
     *  store product
     */
    public function storeProduct(Request $request)
    {

        $image = $request -> file('product_thambnail');
        $name_gen = hexdec(uniqid()).'.'.$image -> getClientOriginalExtension();
        Image::make($image) -> resize(970,1000) -> save('upload/products/thambnail/'.$name_gen);
        $save_url = 'upload/products/thambnail/'.$name_gen;

        $product_id = Product::insertGetId([
            'brand_id'           => $request -> brand_id,
            'category_id'        => $request -> category_id,
            'subcategory_id'     => $request -> subcategory_id,
            'subsubcategory_id'  => $request -> subsubcategory_id,
            'product_name_en'    => $request -> product_name_en,
            'product_name_bn'    => $request -> product_name_bn,
            'product_slug_en'    => strtolower(Str::slug($request -> product_name_en)),
            'product_slug_bn'    => strtolower(Str::slug($request -> product_name_bn)),
            'product_code'       => $request -> product_code,
            'product_qty'        => $request -> product_qty,
            'product_tags_en'    => $request -> product_tags_en,
            'product_tags_bn'    => $request -> product_tags_bn,
            'product_size_en'    => $request -> product_size_en,
            'product_size_bn'    => $request -> product_size_bn,
            'product_color_en'   => $request -> product_color_en,
            'product_color_bn'   => $request -> product_color_bn,

            'selling_price'      => $request -> selling_price,
            'discount_price'     => $request -> discount_price,
            'short_desc_en'      => $request -> short_desc_en,
            'short_desc_bn'      => $request -> short_desc_bn,
            'long_desc_en'       => $request -> long_desc_en,
            'long_desc_bn'       => $request -> long_desc_bn,

            'hot_deals'          => $request -> hot_deals,
            'featured'           => $request -> featured,
            'special_offer'      => $request -> special_offer,
            'special_deals'      => $request -> special_deals,
            'status'             => 1,

            'product_thambnail'  => $save_url,
            'created_at'  => Carbon::now(),
        ]);

        //***** multiple image upload start ***********/
        $images = $request -> file('multi_img');
        foreach ($images as $img) {
            $make_name = hexdec(uniqid()).'.'.$img -> getClientOriginalExtension();
            Image::make($img) -> resize(970,1000) -> save('upload/products/multi-image/'.$make_name);
            $uploadPath = 'upload/products/multi-image/'.$make_name;

            MultiImg::insert([
                'product_id'      => $product_id,
                'photo_name'      => $uploadPath,
                'created_at'      => Carbon::now(),
            ]);
        }
        //***** multiple image upload End ***********/

        $notification = array(
            'message'   => 'Product Added Successfully',
            'alert-type' => 'success',
        );
        return redirect() -> route('manage-product') -> with($notification);
    }
    /**
     *  manage product
     */
    public function manageProduct()
    {
       $products = Product::latest() -> get();
       return view('backend.product.product_view', compact('products'));
    }
    /**
     *  edit product
     */
    public function editProduct($id)
    {
        $categories = Category::all();
        $subcategory = SubCategory::all();
        $subsubcategory = SubSubCategory::all();
        $brands = Brand::all();
        $products = Product::findOrFail($id);
        $multiImgs = MultiImg::where('product_id', $id) -> get();
       return view('backend.product.product_edit', compact('products','brands','categories','subcategory','subsubcategory','multiImgs'));
    }
    /**
     *  product Data update
     */
    public function productDataUpdate(Request $request)
    {
        $product_id = $request -> id;

        Product::findOrFail($product_id)->update([
            'brand_id'           => $request -> brand_id,
            'category_id'        => $request -> category_id,
            'subcategory_id'     => $request -> subcategory_id,
            'subsubcategory_id'  => $request -> subsubcategory_id,
            'product_name_en'    => $request -> product_name_en,
            'product_name_bn'    => $request -> product_name_bn,
            'product_slug_en'    => strtolower(Str::slug($request -> product_name_en)),
            'product_slug_bn'    => strtolower(Str::slug($request -> product_name_bn)),
            'product_code'       => $request -> product_code,
            'product_qty'        => $request -> product_qty,
            'product_tags_en'    => $request -> product_tags_en,
            'product_tags_bn'    => $request -> product_tags_bn,
            'product_size_en'    => $request -> product_size_en,
            'product_size_bn'    => $request -> product_size_bn,
            'product_color_en'   => $request -> product_color_en,
            'product_color_bn'   => $request -> product_color_bn,

            'selling_price'      => $request -> selling_price,
            'discount_price'     => $request -> discount_price,
            'short_desc_en'      => $request -> short_desc_en,
            'short_desc_bn'      => $request -> short_desc_bn,
            'long_desc_en'       => $request -> long_desc_en,
            'long_desc_bn'       => $request -> long_desc_bn,

            'hot_deals'          => $request -> hot_deals,
            'featured'           => $request -> featured,
            'special_offer'      => $request -> special_offer,
            'special_deals'      => $request -> special_deals,
            'status'             => 1,
            'created_at'  => Carbon::now(),
        ]);
        $notification = array(
            'message'   => 'Product Data Updated Without Image Successfully',
            'alert-type' => 'success',
        );
        return redirect() -> route('manage-product') -> with($notification);
    }
    /**
     *  product multiImage Update
     */
	public function multiImageUpdate(Request $request){
		$imgs = $request -> multi_img;

		foreach ($imgs as $id => $img) {
	    $imgDel = MultiImg::findOrFail($id);
	    unlink($imgDel->photo_name);

    	$make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
    	Image::make($img)->resize(917,1000)->save('upload/products/multi-image/'.$make_name);
    	$uploadPath = 'upload/products/multi-image/'.$make_name;

    	MultiImg::where('id',$id)->update([
    		'photo_name' => $uploadPath,
    		'updated_at' => Carbon::now(),
    	]);

	 } // end foreach

       $notification = array(
			'message' => 'Product Image Updated Successfully',
			'alert-type' => 'info'
		);

		return redirect()->back()->with($notification);

	} // end mehtod

    /**
     *  product thambnail update
     */
    public function thambnailImageUpdate(Request $request)
    {
        $pro_id = $request -> id;
        $oldImage = $request -> old_img;
        unlink($oldImage);

        $image = $request -> file('product_thambnail');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    	Image::make($image)->resize(917,1000)->save('upload/products/thambnail/'.$name_gen);
    	$save_url = 'upload/products/thambnail/'.$name_gen;

        Product::findOrFail($pro_id)->update([
    		'product_thambnail' => $save_url,
    		'updated_at' => Carbon::now(),
    	]);

        $notification = array(
			'message' => 'Product Thambnail Updated Successfully',
			'alert-type' => 'info'
		);

		return redirect()->back()->with($notification);
    }//end method

    /**
     *  product multiple image delete
     */
    public function multiImageDelete($id)
    {
       $oldimg = MultiImg::findOrFail($id);
       unlink($oldimg -> photo_name);

       MultiImg::findOrFail($id) -> delete();

       $notification = array(
        'message' => 'Product Image Successfully',
        'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }//end method

    /**
     *  product inactive
     */
    public function productInactive($id)
    {
        Product::findOrFail($id) -> update(['status' => 0]);

        $notification = array(
            'message' => 'Product Inactive',
            'alert-type' => 'success'
            );
        return redirect()->back()->with($notification);
    }
    /**
     *  product active
     */
    public function productActive($id)
    {
        Product::findOrFail($id) -> update(['status' => 1]);

        $notification = array(
            'message' => 'Product Active',
            'alert-type' => 'success'
            );
         return redirect()->back()->with($notification);
    }
    /***
     *  product Delete
     */
    public function productDelete($id)
    {
       $product =  Product::findOrFail($id);
       unlink($product -> product_thambnail);
       Product::findOrFail($id) -> delete();

       $images = MultiImg::where('product_id',$id) -> get();
       foreach($images as $img){
            unlink($img -> photo_name);
            MultiImg::where('product_id', $id) -> delete();
       }

       $notification = array(
            'message' => 'Product Deleted Successfully',
            'alert-type' => 'success'
        );
     return redirect()->back()->with($notification);
    }
}
