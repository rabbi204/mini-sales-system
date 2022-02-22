<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\SubSubCategory;
use App\Http\Controllers\Controller;

class SubCategoryController extends Controller
{
    /**
     *  sub category view
     */
    public function subCategoryView()
    {
        $categories = Category::orderBy('category_name_en', 'ASC') -> get();
        $subcategory = SubCategory::latest() -> get();
        return view('backend.category.subcategory_view', compact('categories','subcategory'));
    }
    /**
     *  store sub category
     */
    public function SubCategoryStore(Request $request)
    {
        // dd($request -> all());
        $validateData = $request -> validate([
            'category_id'  => 'required',
            'subcategory_name_en'  => 'required',
            'subcategory_name_bn'  => 'required'
        ], [
            'category_id.required'  => 'Please Select Any Option',
            'subcategory_name_en.required'  => 'Input SubCategory English Name',
            'subcategory_name_bn.required'  => 'Input SubCategory Bangla Name'
        ]);

        SubCategory::create([
            'category_id' => $request -> category_id,
            'subcategory_name_en' => $request -> subcategory_name_en,
            'subcategory_name_bn' => $request -> subcategory_name_bn,
            // 'subcategory_slug_en' => strtolower(str_replace(' ', '-', $request -> subcategory_name_en)),
            // 'subcategory_slug_bn' => strtolower(str_replace(' ', '-', $request -> subcategory_name_bn)),
            'subcategory_slug_en' => strtolower(Str::slug($request -> subcategory_name_en)),
            'subcategory_slug_bn' => strtolower(Str::slug($request -> subcategory_name_bn)),
        ]);
        $notification = array(
            'message'   => 'SubCategory inserted Successfully',
            'alert-type' => 'success',
        );
        return redirect() -> back() -> with($notification);
    }
    /**
     *  sub category edit
     */
    public function subCategoryEdit($id)
    {
        $categories = Category::orderBy('category_name_en', 'ASC') -> get();
        $subcategory = SubCategory::findOrFail($id);
       return view('backend.category.subcategory_edit', compact('categories','subcategory'));
    }
    /**
     *  Sub Category Update
     */
    public function subCategoryUpdate(Request $request)
    {
        $subcat_id = $request -> id;

        SubCategory::findOrFail($subcat_id)-> update([
            'category_id' => $request -> category_id,
            'subcategory_name_en' => $request -> subcategory_name_en,
            'subcategory_name_bn' => $request -> subcategory_name_bn,
            // 'subcategory_slug_en' => strtolower(str_replace(' ', '-', $request -> subcategory_name_en)),
            // 'subcategory_slug_bn' => strtolower(str_replace(' ', '-', $request -> subcategory_name_bn)),
            'subcategory_slug_en' => strtolower(Str::slug($request -> subcategory_name_en)),
            'subcategory_slug_bn' => strtolower(Str::slug($request -> subcategory_name_bn)),
        ]);
        $notification = array(
            'message'   => 'SubCategory Updated Successfully',
            'alert-type' => 'info',
        );
        return redirect() -> route('all.subcategory') -> with($notification);
    }
    /**
     * sub category delete
     */
    public function subCategoryDelete($id)
    {
        SubCategory::findOrFail($id) -> delete();
        $notification = array(
            'message'   => 'SubCategory Deleted Successfully',
            'alert-type' => 'success',
        );
        return redirect() -> back() -> with($notification);
    }

    /**************************************************
     *  admin sub sub category view
     **************************************************/
    public function subSubCategoryView()
    {
        $categories = Category::orderBy('category_name_en', 'ASC') -> get();
        $subsubcategory = SubSubCategory::latest() -> get();
        return view('backend.category.sub_subcategory_view', compact('categories', 'subsubcategory'));
    }
    /**
     *  get sub category
     */
    public function getSubCategory($category_id)
    {
        $subcat = SubCategory::where('category_id', $category_id) -> orderBy('subcategory_name_en', 'ASC') -> get();
        // dd($subcat);
        return json_encode($subcat);
    }
    /**
     *  get sub sub category
     */
    public function getSubSubCategory($subcategory_id)
    {
        $subsubcat = SubSubCategory::where('subcategory_id', $subcategory_id) -> orderBy('subsubcategory_name_en', 'ASC') -> get();
        // dd($subcat);
        return json_encode($subsubcat);
    }
    /**
     *  sub-sub category store
     */
    public function subSubCategoryStore(Request $request)
    {
        $validateData = $request -> validate([
            'category_id'  => 'required',
            'subcategory_id'  => 'required',
            'subsubcategory_name_en'  => 'required',
            'subsubcategory_name_bn'  => 'required'
        ], [
            'category_id.required'  => 'Please Select Any Option',
            'subcategory_id.required'  => 'Please Select Any Option',
            'subsubcategory_name_en.required'  => 'Input SubSubCategory English Name',
            'subsubcategory_name_bn.required'  => 'Input SubSubCategory Bangla Name'
        ]);

        SubSubCategory::create([
            'category_id' => $request -> category_id,
            'subcategory_id' => $request -> subcategory_id,
            'subsubcategory_name_en' => $request -> subsubcategory_name_en,
            // 'subsubcategory_slug_en' => strtolower(str_replace(' ', '-', $request -> subsubcategory_name_en)),
            'subsubcategory_slug_en' => strtolower(Str::slug($request -> subsubcategory_name_en)),
            'subsubcategory_name_bn' => $request -> subsubcategory_name_bn,
            // 'subsubcategory_slug_bn' => strtolower(str_replace(' ', '-', $request -> subsubcategory_name_bn)),
            'subsubcategory_slug_bn' => strtolower(Str::slug($request -> subsubcategory_name_bn)),
        ]);
        $notification = array(
            'message'   => 'SubSubCategory inserted Successfully',
            'alert-type' => 'success',
        );
        return redirect() -> back() -> with($notification);
    }
    /**
     *  sub-sub category edit
     */
    public function subSubCategoryEdit($id)
    {
        $categories = Category::orderBy('category_name_en', 'ASC') -> get();
        $subcategories = SubCategory::orderBy('subcategory_name_en', 'ASC') -> get();
        $subsubcategories = SubSubCategory::findOrFail($id);
        return view('backend.category.sub_subcategory_edit',compact('categories','subcategories','subsubcategories'));
    }
    /**
     *  sub-sub category Update
     */
    public function subSubCategoryUpdate(Request $request)
    {
        $subsubcat = $request -> id;

        SubSubCategory::findOrFail($subsubcat)->update([
            'category_id' => $request -> category_id,
            'subcategory_id' => $request -> subcategory_id,
            'subsubcategory_name_en' => $request -> subsubcategory_name_en,
            // 'subsubcategory_slug_en' => strtolower(str_replace(' ', '-', $request -> subsubcategory_name_en)),
            'subsubcategory_slug_en' => strtolower(Str::slug($request -> subsubcategory_name_en)),
            'subsubcategory_name_bn' => $request -> subsubcategory_name_bn,
            // 'subsubcategory_slug_bn' => strtolower(str_replace(' ', '-', $request -> subsubcategory_name_bn)),
            'subsubcategory_slug_bn' => strtolower(Str::slug($request -> subsubcategory_name_bn)),
        ]);
        $notification = array(
            'message'   => 'SubSubCategory Updated Successfully',
            'alert-type' => 'info',
        );
        return redirect() -> route('all.subsubcategory') -> with($notification);
    }
    /**
     *  sub sub category delete
     */
    public function subSubCategoryDelete($id)
    {
        SubSubCategory::findOrFail($id) -> delete();
        $notification = array(
            'message'   => 'SubSubCategory Deleted Successfully',
            'alert-type' => 'info',
        );
        return redirect() -> back() -> with($notification);
    }
}
