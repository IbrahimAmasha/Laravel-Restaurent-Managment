<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    public function addToCart(Request $request , $itemId) 
    {
        $item = Menu::find($itemId);

        if(!$item) 
        {
            abort(403,'Menu item not found.');
        }

        $cart = $request->session()->get('cart',[]);

        if(isset($cart[$itemId])) 
        {
            $cart[$itemId]['quantity']++;
        }

        else 
        {
            $cart[$itemId] = [
                'item' => $item , 
                'quantity' => 1 , 
            ];
        }

        $request->session()->put('cart', $cart);

        return view('cart.show', compact('cart'));
    }

    public function removeItemFromCart(Request $request, $itemId) 
    {
        $cart = $request->session()->get('cart', []);
    
        if(isset($cart[$itemId])) {
            unset($cart[$itemId]); // Properly remove the item from the cart
        }
    
        $request->session()->put('cart', $cart);
    
        return view('cart.show', compact('cart'));
    }
    

}
