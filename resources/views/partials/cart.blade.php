@extends('layout.app')
@section('title')
My Cart
@endsection
@section('content')
<div id="breadcrumb">
<div class="container">
<ul class="breadcrumb">
<li><a href="{{ route('home') }}">Home</a></li>
<li class="active">My Cart</li>
</ul>
</div>
</div>
<div class="section">
<div class="container">
<div class="row">
@if(session('success'))
<div class="alert alert-success">{{ session('success')
}}</div>
@endif
@if(session('error'))
<div class="alert alert-danger">{{ session('error')
}}</div>
@endif
<div class="col-md-12">
<div class="order-summary clearfix">
<div class="section-title">
<h3 class="title">My Cart</h3>
</div>
@if($cartItems->count() > 0)
<table class="shopping-cart-table table">
<thead>
<tr>
<th>Product</th>
<th></th>
<th class="text-center">Price</th>
<th class="text-center">Quantity</th>
<th class="text-center">Total</th>
<th class="text-right"></th>
</tr>
</thead>
<tbody>
@php $subtotal = 0; @endphp
@foreach($cartItems as $item)
@php
$lineTotal = $item->price * $item->quantity;
$subtotal += $lineTotal;
@endphp
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
<form action="{{
route('cart.update', $item->id) }}" method="POST">
@csrf
<input class="input"
type="number" name="quantity" value="{{ $item->quantity }}" min="1">
<button type="submit"
class="main-btn">Update</button>
</form>
</td>
<td class="total text-center">
<strong class="primary-color">${{
number_format($lineTotal, 2) }}</strong>
</td>
<td class="text-right">
<form action="{{
route('cart.remove', $item->id) }}" method="POST">
@csrf
@method('DELETE')
<button type="submit"
class="main-btn icon-btn">
<i class="fa fa-
close"></i>
</button>
</form>
</td>
</tr>
@endforeach
</tbody>
<tfoot>
<tr>
<th class="empty" colspan="3"></th>
<th>SUBTOTAL</th>
<th colspan="2" class="sub-total">
${{ number_format($subtotal, 2) }}
</th>
</tr>
<tr>
<th class="empty" colspan="3"></th>
<th>TOTAL</th>
<th colspan="2" class="total">
${{ number_format($subtotal, 2) }}
</th>
</tr>
</tfoot>
</table>
<div class="pull-right">
<a href="{{ route('checkout') }}"
class="primary-btn">
Checkout <i class="fa fa-arrow-circle-
right"></i>
</a>
</div>
@else
<p>Your cart is empty.</p>
@endif
</div>
</div>
</div>
</div>
</div>
@endsection
