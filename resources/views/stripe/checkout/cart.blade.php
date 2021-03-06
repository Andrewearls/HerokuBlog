<div class="col-md-4 order-md-2 mb-4">
	<h4 class="d-flex justify-content-between align-items-center mb-3">
    <span class="text-muted">Your cart</span>
    <span class="badge badge-secondary badge-pill">{{count($cart->products)}}</span>
  </h4>
  <ul class="list-group mb-3">
    @foreach($cart->products as $product)
    <li class="list-group-item d-flex justify-content-between lh-condensed">
    	<div>
      	<h6 class="my-0">{{$product->name}}</h6>
      	<small class="text-muted">{{limitchars($product->description, 20)}}</small>
    	</div>
    	<span class="text-muted">{{$product->usd}}</span>
    </li>
    @endforeach
    <!-- <li class="list-group-item d-flex justify-content-between lh-condensed">
    	<div>
      	<h6 class="my-0">Second product</h6>
      	<small class="text-muted">Brief description</small>
    	</div>
    	<span class="text-muted">$8</span>
    </li>
    <li class="list-group-item d-flex justify-content-between lh-condensed">
      <div>
        <h6 class="my-0">Third item</h6>
        <small class="text-muted">Brief description</small>
      </div>
      <span class="text-muted">$5</span>
    </li>
    <li class="list-group-item d-flex justify-content-between bg-light">
      <div class="text-success">
        <h6 class="my-0">Promo code</h6>
        <small>EXAMPLECODE</small>
      </div>
      <span class="text-success">-$5</span>
    </li> -->
    <li class="list-group-item d-flex justify-content-between">
      <span>Total (USD)</span>
      <strong>${{$cart->total}}</strong>
    </li>
  </ul>

 <!--  <form class="card p-2">
    <div class="input-group">
      <input type="text" class="form-control" placeholder="Promo code">
      <div class="input-group-append">
        <button type="submit" class="btn btn-secondary">Redeem</button>
      </div>
    </div>
  </form> -->
</div>