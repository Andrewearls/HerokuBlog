<?php

namespace App\Http\Controllers\Audience\Shopper;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Cart\CartInterface as Cart;
use App\Product;

class CartController extends Controller
{	
	/**
	 * return a list of items in the cart.
	 *
	 * @return view
	 */
	public function index(Cart $cart)
	{
		// dd($cart->content());
		$products = [];

		foreach ($cart->content() as $item) {
			$product = Product::find($item->id);
			$product->quantity = $item->quantity;
			$products[] = $product;
		}

		return view('audience.shopping.cart')->with(['cart' => $products]);
	}

	/**
	 * Add an item to the cart.
	 *
	 * @param Request
	 * @return redirect
	 */
	public function addItem(Request $request, Cart $cart, $productId)
	{
		// dd($productId);
		$item = Product::find($productId);
		// dd($item);
		$cart->add($item);

		$cart->save();

		return redirect()->route('cart');
	}

	/**
	 * Remove an item from the cart.
	 *
	 * @param Request
	 * @return redirect
	 */
	public function removeItem(Request $request, Cart $cart, $productId)
	{
		$item = Product::find($productId);

		$cart->remove($item);
		
		$cart->save();
		
		return redirect()->route('cart');
	}

}
