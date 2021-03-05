<h4 class="mb-3">Payment</h4>

<!-- <div class="d-block my-3">
  <div class="custom-control custom-radio">
    <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked="" required="">
    <label class="custom-control-label" for="credit">Credit card</label>
  </div>
  <div class="custom-control custom-radio">
    <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required="">
    <label class="custom-control-label" for="debit">Debit card</label>
  </div>
</div> -->

<div class="row">
  <div class="col-md-6 mb-3">

    <label for="cc-name">Name on card</label>
    <input type="text" class="form-control" id="cc-name" placeholder="" required="">
    <small class="text-muted">Full name as displayed on card</small>
    <div class="invalid-feedback">
      Name on card is required
    </div>
  </div>
  <div class="col-md-6 mb-3">
    <label for="cc-number">Credit card number</label>
    <input type="text" class="form-control" id="cc-number" placeholder="" required="">
    <div class="invalid-feedback">
      Credit card number is required
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-3 mb-3">
    <label for="cc-expiration">Expiration</label>
    <input type="text" class="form-control" id="cc-expiration" placeholder="" required="">
    <div class="invalid-feedback">
      Expiration date required
    </div>
  </div>
  <div class="col-md-3 mb-3">
    <label for="cc-expiration">CVV</label>
    <input type="text" class="form-control" id="cc-cvv" placeholder="" required="">
    <div class="invalid-feedback">
      Security code required
    </div>
  </div>
</div>
<hr class="mb-4">
<div class="card">
  <div id="stripe-payment-card" class="card-body">
    @include('stripe.update-payment-method')
  </div>
</div>
<!--      <span class="_hsShareImage hsShareImage">&nbsp;</span></body>
      <div class="card-header">
        <h2>Checkout</h2>
      </div>
      <div class="card-body">
        @foreach($cart->products as $product)
          <div>
            {{$product->quantity}}
            {{$product->name}}
            ${{toDollars($product->price)}}
          </div>
        @endforeach
      </div>
      <div class="card-body">
        Total: ${{$cart->total}}
      </div>
    </div>
    <div class="card">
      <div class="card-body">
        include('stripe.update-payment-method')
      </div>
    </div>
  </div>
</div> -->