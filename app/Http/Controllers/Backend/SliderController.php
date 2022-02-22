<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class SliderController extends Controller
{
    /**
     *  slider page show
     */
    public function sliderView()
    {
        $sliders = Slider::latest() -> get();
        return view('backend.slider.slider_view', compact('sliders'));
    }
    /**
     *  slider store
     */
    public function sliderStore(Request $request)
    {
        $image = $request -> file('slider_image');
        $name_gen = hexdec(uniqid()).'.'.$image -> getClientOriginalExtension();
        Image::make($image) -> resize(300,300) -> save('upload/slider/'.$name_gen);
        $save_url = 'upload/slider/'.$name_gen;

        Slider::insert([
            'slider_title_en' => $request -> slider_title_en,
            'slider_title_bn' => $request -> slider_title_bn,
            'slider_desc_en' => $request -> slider_desc_en,
            'slider_desc_bn' => $request -> slider_desc_bn,
            'slider_image' => $save_url,
            'status' => 1,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message'   => 'Slider inserted Successfully',
            'alert-type' => 'success',
        );
        return redirect() -> back() -> with($notification);
    }
    /**
     *  slider edit
     */
    public function sliderEdit($id)
    {
        $sliders = Slider::findOrFail($id);
        return view('backend.slider.slider_edit', compact('sliders'));
    }
    /**
     *  Slider update
     */
    public function sliderUpdate(Request $request)
    {
        $slider_id = $request -> id;
        $old_img = $request -> old_img;

        if($request -> file('slider_image')){
            unlink($old_img);
            $image = $request -> file('slider_image');
            $name_gen = hexdec(uniqid()).'.'.$image -> getClientOriginalExtension();
            Image::make($image)->resize(870, 370)->save('upload/slider/'.$name_gen);
            $save_url = 'upload/slider/'.$name_gen;

            Slider::findOrFail($slider_id)->update([
                'slider_title_en' => $request -> slider_title_en,
                'slider_title_bn' => $request -> slider_title_bn,
                'slider_desc_en' => $request -> slider_desc_en,
                'slider_desc_bn' => $request -> slider_desc_bn,
                'slider_image' => $save_url,
            ]);

            $notification = array(
                'message'   => 'slider Updated Successfully',
                'alert-type' => 'info',
            );
            return redirect() -> route('manage-slider') -> with($notification);
        }else{
            Slider::find($slider_id) -> update([
                'slider_title_en' => $request -> slider_title_en,
                'slider_title_bn' => $request -> slider_title_bn,
                'slider_desc_en' => $request -> slider_desc_en,
                'slider_desc_bn' => $request -> slider_desc_bn
            ]);
            $notification = array(
                'message'   => 'Slider Updated Without Image Successfully',
                'alert-type' => 'info',
            );
            return redirect() -> route('manage-slider') -> with($notification);
        }

    }
    /**
     *  slider delete
     */
    public function sliderDelete($id)
    {
        $slider = Slider::findOrFail($id);
        $img = $slider -> slider_image;
        unlink($img);
        Slider::findOrFail($id) -> delete();

        $notification = array(
            'message'   => 'Slider Deleted Successfully',
            'alert-type' => 'success',
        );
        return redirect() -> back() -> with($notification);
    }
    /**
     *  slider inactive
     */
    public function sliderInactive($id)
    {
        Slider::findOrFail($id) -> update(['status' => 0]);

        $notification = array(
            'message' => 'Slider Inactive',
            'alert-type' => 'success'
            );
        return redirect()->back()->with($notification);
    }
    /**
     *  slider active
     */
    public function sliderActive($id)
    {
        Slider::findOrFail($id) -> update(['status' => 1]);

        $notification = array(
            'message' => 'Slider Active',
            'alert-type' => 'success'
            );
        return redirect()->back()->with($notification);
    }
}
