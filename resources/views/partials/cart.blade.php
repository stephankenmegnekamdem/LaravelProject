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
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            <div class="col-md-12">
                <div class="order-summary clearfix">
                    <div class="section-title">
                        <h3 class="title">My Cart</h3>
                    </div>
                    @if($cartItems->count() > 0)
                    <div class="table-responsive">
                    <table class="shopping-cart-table table">
                        <thead>
                            <tr>
                                <th width="80">Product</th>
                                <th>Name</th>
                                <th class="text-center" width="100">Price</th>
                                <th class="text-center" width="160">Quantity</th>
                                <th class="text-center" width="100">Total</th>
                                <th class="text-center" width="80">Remove</th>
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
                                        <img src="{{ asset('storage/' . $item->product->image) }}"
                                             alt="{{ $item->product->title }}"
                                             style="width: 60px; height: 60px; object-fit: cover;">
                                    @else
                                        <img src="{{ asset('img/no-image.png') }}"
                                             alt=""
                                             style="width: 60px; height: 60px; object-fit: cover;">
                                    @endif
                                </td>
                                <td class="details align-middle">
                                    <a href="#">{{ $item->product->title ?? 'Product Deleted' }}</a>
                                </td>
                                <td class="price text-center align-middle">
                                    <strong>${{ number_format($item->price, 2) }}</strong>
                                </td>
                                <td class="qty text-center align-middle">
                                    <form action="{{ route('cart.update', $item->id) }}" method="POST"
                                          class="d-flex justify-content-center align-items-center">
                                        @csrf
                                        <input class="form-control text-center me-2"
                                               type="number"
                                               name="quantity"
                                               value="{{ $item->quantity }}"
                                               min="1"
                                               style="width: 60px;">
                                        <button type="submit" class="btn btn-sm btn-outline-primary">
                                            Update
                                        </button>
                                    </form>
                                </td>
                                <td class="total text-center align-middle">
                                    <strong class="primary-color">${{ number_format($lineTotal, 2) }}</strong>
                                </td>
                                <td class="text-center align-middle">
                                    <form action="{{ route('cart.remove', $item->id) }}" method="POST"
                                          class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="3"></th>
                                <th class="text-end">SUBTOTAL</th>
                                <th colspan="2" class="text-center">
                                    ${{ number_format($subtotal, 2) }}
                                </th>
                            </tr>
                            <tr>
                                <th colspan="3"></th>
                                <th class="text-end">TOTAL</th>
                                <th colspan="2" class="text-center">
                                    <strong>${{ number_format($subtotal, 2) }}</strong>
                                </th>
                            </tr>
                        </tfoot>
                    </table>
                    </div>
                    <div class="text-end mt-3">
                        <a href="{{ route('checkout') }}" class="primary-btn">
                            Checkout <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                    @else
                        <p class="text-muted">
                            <i class="fa fa-shopping-cart me-2"></i> Your cart is empty.
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
