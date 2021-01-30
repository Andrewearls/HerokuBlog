<?php

namespace App\Http\Controllers\Audience\Shopper;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\Receipt;
use App\Cart\CartInterface as Cart;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderConfirmation;
class StripeController extends Controller
{

	/**
	 * The user is returning from stripe billing portal.
	 *
	 * @param  request
	 * @return view
	 */
	public function index(Request $request)
	{
		dd('stripe-index');
		return $request;
	}

	/**
	 * Send the user to Stripes billing portal.
	 *
	 * @param  request
	 * @return redirect
	 */
    public function billingPortal(Request $request)
    {
    	$customer = $request->user()->createOrGetStripeCustomer();
    	return $request->user()->redirectToBillingPortal(
    		route('stripe-index')
    	);
    }

    /**
     * return the stripe checkout view.
     *
     * @param  request
     * @return view
     */
    public function checkout(Request $request, Cart $cart)
    {
        // dd($cart->instance());
    	return view('stripe.checkout')->with(['cart' => $cart->checkout()]);
    }

    /**
     * Process the payment with stripe.
     *
     * @param  request
     * @return view
     */
    public function processCheckout(Request $request, Cart $cart)
    {
    	try {
            $chargeAmount = toCents($cart->checkout()->total);
            \Log::error($cart->content());
            // create a receipt
            $receipt = Receipt::create([
                'user_id' => $request->user()->id,
                'cart_content' => $cart->content(),
                'total' => $chargeAmount,
                'payment' => $request->paymentMethod,
            ]);

            // Charge with stripe
            $stripeCharge = $request->user()->charge($chargeAmount, $request->paymentMethod, ['transfer_group' => $receipt->id]);

            $receipt->transaction_compleated = true;
            $receipt->save();

            // store the cart
            $cart->process($request->user(), $request->paymentMethod);       
            // $receipt->refresh();
            
            

	    	// email the receipt to the user
            // This should be done in a queued job
            Mail::to('andrew.e.earls@gmail.com')->send(new OrderConfirmation($receipt));

	    	return route('shopping-receipt', ['receiptId' => $receipt->id]);
    	} catch (Exception $e) {
    		\Log::error($e);
    		return "false";
    	}
    	
    }

}
