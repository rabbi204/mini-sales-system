<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Models\SubSubCategory;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\MultiImg;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    /**
     *  show Home page
     */
    public function index()
    {
        $categories = Category::orderBy('category_name_en','ASC') -> get();
        $sliders = Slider::where('status',1) -> orderBy('id','DESC') -> limit(3) -> get();
        $products = Product::where('status',1) -> orderBy('id','DESC') -> limit(6) -> get();
        $featured = Product::where('featured',1) -> orderBy('id','DESC') -> limit(6) -> get();
        $hot_deals = Product::where('hot_deals',1) ->where('discount_price','!=',NULL) -> orderBy('id','DESC') -> limit(3) -> get();
        $special_offer = Product::where('special_offer',1) ->where('discount_price','!=',NULL) -> orderBy('id','DESC') -> limit(3) -> get();
        $special_deals = Product::where('special_deals',1) ->where('discount_price','!=',NULL) -> orderBy('id','DESC') -> limit(3) -> get();

        $skip_category_0 = Category::skip(0) -> first();
        $skip_product_0 = Product::where('status',1) -> where('category_id', $skip_category_0 -> id) -> orderBy('id', 'DESC') -> get();

        $skip_category_1 = Category::skip(1) -> first();
        $skip_product_1 = Product::where('status',1) -> where('category_id', $skip_category_1 -> id) -> orderBy('id', 'DESC') -> get();

        $skip_brand_0 = Brand::skip(0) -> first();
        $skip_brand_product_0 = Product::where('status',1) -> where('brand_id', $skip_brand_0 -> id) -> orderBy('id', 'DESC') -> get();

        $skip_brand_1 = Brand::skip(1) -> first();
        $skip_brand_product_1 = Product::where('status',1) -> where('brand_id', $skip_brand_1 -> id) -> orderBy('id', 'DESC') -> get();

        // return $skip_category -> id;
        // die();

        return view('frontend.index', compact('categories','sliders','products','featured','hot_deals','special_offer','special_deals','skip_category_0','skip_product_0','skip_category_1','skip_product_1','skip_brand_0','skip_brand_product_0','skip_brand_1','skip_brand_product_1'));
    }
    /**
     *  User Logout
     */
    public function userLogout()
    {
       Auth::logout();
       return redirect() -> route('login');
    }
    /**
     *  user profile edit
     */
    public function userProfile()
    {
        $id = Auth::user() -> id;
        $user = User::find($id);
        return view('frontend.profile.user_profile', compact('user'));
    }
    /**
     * user profile store
     */
    public function userProfileStore(Request $request)
    {
        $data = User::find(Auth::user() -> id);
        $data -> name = $request -> name;
        $data -> email = $request -> email;
        $data -> phone = $request -> phone;
        $data -> address = $request -> address;

        if($request -> file('profile_photo_path')){
            $file = $request -> file('profile_photo_path');
            @unlink(public_path('upload/user_images/'.$data -> profile_photo_path));
            $filename = date('YmdHi').$file -> getClientOriginalName();
            $file -> move(public_path('upload/user_images/'), $filename);
            $data['profile_photo_path'] = $filename;
        }
        $data -> save();

        $notification = array(
            'message'   => 'User Profile Updated Successfully',
            'alert-type' => 'success',
        );
        return redirect() -> route('dashboard') -> with($notification);
    }
    /**
     *  show change password view
     */
    public function changePassword()
    {
        $id = Auth::user() -> id;
        $user = User::find($id);
        return view('frontend.profile.change_password', compact('user'));
    }
    /**
     *  user password change
     */
    public function passwordUpdate(Request $request)
    {
        $validateData = $request -> validate([
            'oldpassword'   => 'required',
            'password'   => 'required',
            'password_confirmation'   => 'required|confirmed',
        ]);

        $hashedPassword = Auth::user() -> password;

        if (Hash::check($request -> oldpassword, $hashedPassword)) {
            $user = User::find(Auth::user() -> id);
            $user -> password = Hash::make($request -> password);
            $user->save();
           Auth::logout();
           $notification = array(
                'message'   => 'Password Updated Successfully',
                'alert-type' => 'success',
            );
        return redirect() -> route('user.logout') -> with($notification);
            // return redirect()->route('user.logout');
        }else{
            return redirect() -> back();
        }

    }
    /**
     *  product details
     */
    public function productDetails($id, $slug)
    {
        $product = Product::findOrFail($id);

        $color_en = $product -> product_color_en;
        $product_color_en = explode(',', $color_en);

        $color_bn = $product -> product_color_bn;
        $product_color_bn = explode(',', $color_bn);

        $size_en = $product -> product_size_en;
        $product_size_en = explode(',', $size_en);

        $size_bn = $product -> product_size_bn;
        $product_size_bn = explode(',', $size_bn);

        $multiImage = MultiImg::where('product_id',$id) -> get();

        $cat_id = $product -> category_id;
        $relatedProduct = Product::where('category_id', $cat_id) -> where('id', '!=', $id) ->orderBy('id','DESC') -> get();

        return view('frontend.product.product_details', compact('product','multiImage','color_en','product_color_en','color_bn','product_color_bn','size_en','product_size_en','size_bn','product_size_bn','relatedProduct'));
    }

    /**
     *  product wise tag
     */
    public function tagWiseProduct($tag)
    {
        $products = Product::where('status',1)-> where('product_tags_en', $tag)-> orWhere('product_tags_bn', $tag)-> orderBy('id','DESC')-> paginate(6);

        $categories = Category::orderBy('category_name_en','ASC') -> get();
        return view('frontend.tags.tags_view', compact('products','categories'));
    }

    /**
     *  sub category wise product
     */
    public function subCategoryWiseData($subcat_id, $slug)
    {
        $products = Product::where('status',1)-> where('subcategory_id', $subcat_id)-> orderBy('id','DESC')-> paginate(6);

        $categories = Category::orderBy('category_name_en','ASC') -> get();
        return view('frontend.product.subcategory_view', compact('products','categories'));
    }

    /**
     *  sub category wise product
     */
    public function subSubCategoryWiseData($subsubcat_id, $slug)
    {
        $products = Product::where('status',1)-> where('subsubcategory_id', $subsubcat_id)-> orderBy('id','DESC')-> paginate(6);

        $categories = Category::orderBy('category_name_en','ASC') -> get();
        return view('frontend.product.sub_subcategory_view', compact('products','categories'));
    }

    /**
     *  product view ajax
     */
    public function productViewAjax($id)
    {
        $product = Product::with('category','brand')-> findOrFail($id);

        $color = $product -> product_color_en;
        $product_color = explode(',', $color);

        // $color_bn = $product -> product_color_bn;
        // $product_color_bn = explode(',', $color_bn);
        // $size_bn = $product -> product_size_bn;
        // $product_size_bn = explode(',', $size_bn);

        $size = $product -> product_size_en;
        $product_size = explode(',', $size);

        return response() -> json([
            'product'   => $product,
            'color'     => $product_color,
            'size'      => $product_size,
        ]);
    }
}
