<?php

namespace App\Cart;

use Illuminate\Http\Request;
use Melihovv\ShoppingCart\Facades\ShoppingCart;
use App\Product;
/**
 * Interface with the shopping cart pacage
 */
class CartInterface
{
	
	function __construct(Request $request)
	{
		if ($this->checkForSessionCart($request)) {
			$this->loadCart($request->session()->pull('cart')[0]);
		}
	}

	/**
	 * Check if cart is stored in session.
	 *
	 * @param Request
	 * @return bool
	 */
	public function checkForSessionCart($request)
	{
		if ($request->session()->has('cart')) {
			return true;
		}
		return false;
	}

	/**
	 * Fill the cart from session data.
	 *
	 * @param collection
	 * @return this
	 */
	public function loadCart($cartItems)
	{
		try {
			// add the items to the current cart
			foreach ($cartItems as $key => $item) {	
				$product = Product::find($item->id);			
				$this->add($product, $item->quantity);
			}

			return true;
		} catch (Exception $e) {
			throw new Exception("Cart items did not load", 1);
		}
		// Cart::content()->each(function ($item, $key) {
		// 	dd($item->getUniqueId());
		// });

		// Cart::content()->each(function ($item, $key) {
		// 	dd($item->getUniqueId());
		// });

		return false;
	}

	/**
	 * Display the content of the cart.
	 *
	 * @return collection
	 */
	public function content()
	{
		return ShoppingCart::content();
	}

	/**
	 * add items to the cart.
	 *
	 * @param id
	 * @param name
	 * @param price
	 * @param quantity
	 * @param options
	 * @return cartItem
	 */
	public function add(Product $item, $quantity = 1)
	{
		return ShoppingCart::add(
					$item->id,
					$item->name,
					$item->price,
					$quantity,
					$item->options
				);
	}
}