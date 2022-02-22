<?php

namespace App\Http\Controllers\Backend;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;

class BrandController extends Controller
{
    /**
     *  show brand view page
     */
    public function brandView()
    {
        $brands = Brand::latest() -> get();
        return view('backend.brand.brand_view', compact('brands'));
    }
    /**
     *  brand store
     */
    public function brandStore(Request $request)
    {
        $validateData = $request -> validate([
            'brand_name_en'  => 'required',
            'brand_name_bn'  => 'required',
            'brand_image'  => 'required',
        ], [
            'brand_name_en.required'  => 'Input Brand English Name',
            'brand_name_bn.required'  => 'Input Brand Bangla Name',
        ]);

        $image = $request -> file('brand_image');
        $name_gen = hexdec(uniqid()).'.'.$image -> getClientOriginalExtension();
        Image::make($image) -> resize(300,300) -> save('upload/brand/'.$name_gen);
        $save_url = 'upload/brand/'.$name_gen;

        Brand::insert([
            'brand_name_en' => $request -> brand_name_en,
            'brand_name_bn' => $request -> brand_name_bn,
            'brand_slug_en' => strtolower(str_replace(' ', '-', $request -> brand_name_en)),
            'brand_slug_bn' => strtolower(str_replace(' ', '-', $request -> brand_name_bn)),
            'brand_image' => $save_url,
        ]);
        $notification = array(
            'message'   => 'Brand inserted Successfully',
            'alert-type' => 'success',
        );
        return redirect() -> back() -> with($notification);
    }
    /**
     *  brand Edit page show
     */
    public function brandEdit($id)
    {
       $brand = Brand::findOrFail($id);
       return view('backend.brand.brand_edit', compact('brand'));
    }
    /**
     *  brand update
     */
    public function brandUpdate(Request $request, $id)
    {

        if($request -> file('brand_image')){
            unlink($request -> old_image);
            $image = $request -> file('brand_image');
            $name_gen = hexdec(uniqid()).'.'.$image -> getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save('upload/brand/'.$name_gen);
            $save_url = 'upload/brand/'.$name_gen;

            Brand::findOrFail($id)->update([
                'brand_name_en' => $request -> brand_name_en,
                'brand_name_bn' => $request -> brand_name_bn,
                'brand_slug_en' => strtolower(str_replace(' ', '-', $request -> brand_name_en)),
                'brand_slug_bn' => strtolower(str_replace(' ', '-', $request -> brand_name_bn)),
                'brand_image' => $save_url,
            ]);

            $notification = array(
                'message'   => 'Brand Updated Successfully',
                'alert-type' => 'info',
            );
            return redirect() -> route('all.brand') -> with($notification);
        }else{
            Brand::find($id) -> update([
                'brand_name_en' => $request -> brand_name_en,
                'brand_name_bn' => $request -> brand_name_bn,
                'brand_slug_en' => strtolower(str_replace(' ', '-', $request -> brand_name_en)),
                'brand_slug_bn' => strtolower(str_replace(' ', '-', $request -> brand_name_bn)),
            ]);
            $notification = array(
                'message'   => 'Brand Updated Successfully',
                'alert-type' => 'info',
            );
            return redirect() -> route('all.brand') -> with($notification);
        }

    }

    /**
     *  brand delete data
     */
    public function brandDelete($id)
    {
        $brand = Brand::findOrFail($id);
        $img = $brand -> brand_image;
        unlink($img);
        Brand::findOrFail($id)-> delete();
        
        $notification = array(
            'message'   => 'Brand Deleted Successfully',
            'alert-type' => 'info',
        );
        return redirect() -> back() -> with($notification);
    }
}
