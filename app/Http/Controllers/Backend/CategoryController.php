<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     *  category view
     */
    public function categoryView()
    {
        $category = Category::latest() -> get();
        return view('backend.category.category_view', compact('category'));
    }
    /**
     *  category store
     */
    public function categoryStore(Request $request)
    {
        $validateData = $request -> validate([
            'category_name_en'  => 'required',
            'category_name_bn'  => 'required',
            'category_icon'  => 'required',
        ], [
            'category_name_en.required'  => 'Input Category English Name',
            'category_name_bn.required'  => 'Input Category Bangla Name',
            'category_icon.required'  => 'Input Category Icon',
        ]);

        Category::create([
            'category_name_en' => $request -> category_name_en,
            'category_name_bn' => $request -> category_name_bn,
            'category_icon' => $request -> category_icon,
            'category_slug_en' => strtolower(str_replace(' ', '-', $request -> category_name_en)),
            'category_slug_bn' => strtolower(str_replace(' ', '-', $request -> category_name_bn)),
        ]);
        $notification = array(
            'message'   => 'Category inserted Successfully',
            'alert-type' => 'success',
        );
        return redirect() -> back() -> with($notification);

    }
    /**
     *  category edit
     */
    public function categoryEdit($id)
    {
        $category = Category::findOrFail($id);
       return view('backend.category.category_edit', compact('category'));
    }
    /**
     *  category update
     */
    public function categoryUpdate(Request $request)
    {
        $cat_id = $request -> id;
        Category::findOrFail($cat_id)->update([
            'category_name_en' => $request -> category_name_en,
            'category_name_bn' => $request -> category_name_bn,
            'category_slug_en' => strtolower(str_replace(' ', '-', $request -> category_name_en)),
            'category_slug_bn' => strtolower(str_replace(' ', '-', $request -> category_name_bn)),
            'category_icon' => $request -> category_icon
        ]);

        $notification = array(
            'message'   => 'Category Updated Successfully',
            'alert-type' => 'success',
        );
        return redirect() -> route('all.category') -> with($notification);
    }
    /**
     *  category delete
     */
    public function categoryDelete($id)
    {
        Category::findOrFail($id) -> delete();
        $notification = array(
            'message'   => 'Category Deleted Successfully',
            'alert-type' => 'success',
        );
        return redirect() -> route('all.category') -> with($notification);
    }
}
