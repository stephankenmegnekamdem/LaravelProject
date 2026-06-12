@extends('layout.app')
@section('title')
Checkout
@endsection
@section('content')
<div id="breadcrumb">
<div class="container">
<ul class="breadcrumb">
<li><a href="{{ route('home') }}">Home</a></li>
<li class="active">Checkout</li>
</ul>
</div>
</div>
<div class="section">
<div class="container">
<div class="row">
@if(session('error'))
<div class="alert alert-danger">{{ session('error')
}}</div>
@endif
@if($errors->any())
<div class="alert alert-danger">
<ul>
@foreach($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif
<form id="checkout-form" class="clearfix" action="{{
route('place.order') }}" method="POST">
@csrf
<div class="col-md-6">
<div class="billing-details">
<div class="section-title">
<h3 class="title">Billing Details</h3>
</div>
<div class="form-group">
<input class="input" type="text" name="name"
placeholder="Full Name" value="{{ old('name', auth()->user()->name ?? '') }}"
required>
</div>
<div class="form-group">
<input class="input" type="email"
name="email" placeholder="Email" value="{{ old('email', auth()->user()->email
?? '') }}" required>
</div>
<div class="form-group">
<input class="input" type="text"
name="address" placeholder="Address" value="{{ old('address') }}" required>
</div>
<div class="form-group">
<input class="input" type="text" name="city"
placeholder="City" value="{{ old('city') }}">
</div>
<div class="form-group">
<input class="input" type="text"
name="country" placeholder="Country" value="{{ old('country') }}">
</div>
<div class="form-group">
<input class="input" type="text"
name="zip_code" placeholder="ZIP Code" value="{{ old('zip_code') }}">
</div>
<div class="form-group">
<input class="input" type="tel" name="phone"
placeholder="Telephone" value="{{ old('phone') }}">
</div>
</div>
</div>
<div class="col-md-6">
<div class="shiping-methods">
<div class="section-title">
<h4 class="title">Shipping Methods</h4>
</div>
<div class="input-checkbox">
<input type="radio" name="shipping_method"
id="shipping-1" value="Free Shipping" checked>
<label for="shipping-1">Free Shipping -
$0.00</label>
</div>
<div class="input-checkbox">
<input type="radio" name="shipping_method"
id="shipping-2" value="Standard Shipping">
<label for="shipping-2">Standard Shipping -
$4.00</label>
</div>
</div>
<div class="payments-methods">
<div class="section-title">
<h4 class="title">Payment Methods</h4>
</div>
<div class="input-checkbox">
<input type="radio" name="payment_method"
id="payments-1" value="Direct Bank Transfer" checked>
<label for="payments-1">Direct Bank
Transfer</label>
</div>
<div class="input-checkbox">
<input type="radio" name="payment_method"
id="payments-2" value="Cash on Delivery">
<label for="payments-2">Cash on
Delivery</label>
</div>
<div class="input-checkbox">
<input type="radio" name="payment_method"
id="payments-3" value="Paypal">
<label for="payments-3">Paypal</label>
</div>
</div>
</div>
<div class="col-md-12">
<div class="order-summary clearfix">
<div class="section-title">
<h3 class="title">Order Review</h3>
</div>
<table class="shopping-cart-table table">
<thead>
<tr>
<th>Product</th>
<th></th>
<th class="text-center">Price</th>
<th class="text-center">Quantity</th>
<th class="text-center">Total</th>
</tr>
</thead>
<tbody>
@foreach($cartItems as $item)
<tr>
<td class="thumb">
@if($item->product && $item->product->image)
<img src="{{ asset('storage/'
. $item->product->image) }}" alt="{{ $item->product->title }}">
@else
<img src="{{ asset('img/no-
image.png') }}" alt="">
@endif
</td>
<td class="details">
<a href="#">
{{ $item->product->title ??
'Product Deleted' }}
</a>
</td>
<td class="price text-center">
<strong>${{ number_format($item->price, 2) }}</strong>
</td>
<td class="qty text-center">
{{ $item->quantity }}
</td>
<td class="total text-center">
<strong class="primary-color">
${{ number_format($item->price * $item->quantity, 2) }}
</strong>
</td>
</tr>
@endforeach
</tbody>
<tfoot>
<tr>
<th class="empty" colspan="2"></th>
<th colspan="2">SUBTOTAL</th>
<th class="sub-total">
${{ number_format($subtotal, 2) }}
</th>
</tr>
<tr>
<th class="empty" colspan="2"></th>
<th colspan="2">SHIPPING</th>
<td>Free Shipping / Standard</td>
</tr>
<tr>
<th class="empty" colspan="2"></th>
<th colspan="2">TOTAL</th>
<th class="total">
${{ number_format($total, 2) }}
</th>
</tr>
</tfoot>
</table>
<div class="pull-right">
<button type="submit" class="primary-btn">
Place Order
</button>
</div>
</div>
</div>
</form>
</div>
</div>
</div>
@endsection
