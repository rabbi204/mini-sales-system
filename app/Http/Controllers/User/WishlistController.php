<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    /**
     *  view wishlist page
     */
    public function viewWishlist()
    {
        return view('frontend.wishlist.view_wishlist');
    }

    /**
     *  get all wishlist product
     */
    public function getWishlistProduct()
    {
        $wishlist = Wishlist::with('product') -> where('user_id', Auth::id()) -> latest() ->get();
        return response() -> json($wishlist);
    }
    /**
     *  remove wishlist product
     */
    public function wishlistRemove($id)
    {
        Wishlist::where('user_id', Auth::id())
            -> where('id',$id) -> delete();

        return response() -> json([
            'success'   => 'Product Remove Successfully'
        ]);
    }
}
