@extends('layout.admin2')
@section('title')Order Detail @endsection
@section('content')
<!--begin::App Main-->
<main class="app-main">
<!--begin::App Content Header-->
<div class="app-content-header">
<!--begin::Container-->
<div class="container-fluid">
<!--begin::Row-->
<div class="row">
<div class="col-sm-4">
<h3 class="mb-0">Order Detail #{{ $order->id }}</h3>
</div>
<div class="col-sm-8">
<ol class="breadcrumb float-sm-end">
<li class="breadcrumb-item"><a
href="/admin2">Admin2</a></li>
<li class="breadcrumb-item">
<a href="{{ route('admin2.orders.index')
}}">Orders</a>
</li>
<li class="breadcrumb-item active" aria-current="page">
Order Detail
</li>
</ol>
</div>
</div>
<!--end::Row-->
</div>
<!--end::Container-->
</div>
<!--end::App Content Header-->
<!--begin::App Content-->
<div class="app-content">
<!--begin::Container-->
<div class="container-fluid">
@if(session('success'))
<div class="alert alert-success">
{{ session('success') }}
</div>
@endif
@if($errors->any())
<div class="alert alert-danger">
<ul class="mb-0">
@foreach($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif
<div class="row">
<div class="col-md-6">
<div class="card mb-3">
<div class="card-header">
<h5 class="card-title mb-0">Customer
Information</h5>
</div>
<div class="card-body">
<table class="table table-bordered">
<tr>
<th width="150">Name</th>
<td>{{ $order->name }}</td>
</tr>
<tr>
<th>Email</th>
<td>{{ $order->email }}</td>
</tr>
<tr>
<th>Phone</th>
<td>{{ $order->phone }}</td>
</tr>
<tr>
<th>Address</th>
<td>{{ $order->address }}</td>
</tr>
<tr>
<th>City</th>
<td>{{ $order->city }}</td>
</tr>
<tr>
<th>Country</th>
<td>{{ $order->country }}</td>
</tr>
<tr>
<th>ZIP Code</th>
<td>{{ $order->zip_code }}</td>
</tr>
</table>
</div>
</div>
</div>
<div class="col-md-6">
<div class="card mb-3">
<div class="card-header">
<h5 class="card-title mb-0">Order
Information</h5>
</div>
<div class="card-body">
<table class="table table-bordered">
<tr>
<th width="180">Order ID</th>
<td>{{ $order->id }}</td>
</tr>
<tr>
<th>Current Status</th>
<td>
@if($order->status == 'New')
<span class="badge bg-
primary">New</span>
@elseif($order->status ==
'Accepted')
<span class="badge bg-
info">Accepted</span>
@elseif($order->status ==
'Cancelled')
<span class="badge bg-
danger">Cancelled</span>
@elseif($order->status ==
'Onshipping')
<span class="badge bg-
warning">Onshipping</span>
@elseif($order->status ==
'Completed')
<span class="badge bg-
success">Completed</span>
@else
<span class="badge bg-
secondary">{{ $order->status }}</span>
@endif
</td>
</tr>
<tr>
<th>Payment Method</th>
<td>{{ $order->payment_method }}</td>
</tr>
<tr>
<th>Shipping Method</th>
<td>{{ $order->shipping_method
}}</td>
</tr>
<tr>
<th>Order Date</th>
<td>{{ $order->created_at->format('m/d/Y H:i') }}</td>
</tr>
<tr>
<th>Subtotal</th>
<td>${{ number_format($order->subtotal, 2) }}</td>
</tr>
<tr>
<th>Shipping Price</th>
<td>${{ number_format($order->shipping_price, 2) }}</td>
</tr>
<tr>
<th>Total</th>
<td>
<strong>${{ number_format($order->total, 2) }}</strong>
</td>
</tr>
</table>
<form action="{{
route('admin2.orders.updateStatus', $order->id) }}" method="POST">
@csrf
<div class="form-group mb-2">
<label for="status">Change
Status</label>
<select name="status" id="status"
class="form-control">
@foreach($statuses as $status)
<option value="{{ $status }}"
{{ $order->status == $status ? 'selected' : '' }}>
{{ $status }}
</option>
@endforeach
</select>
</div>
<button type="submit" class="btn btn-
success">
Update Status
</button>
</form>
</div>
</div>
</div>
</div>
<div class="card">
<div class="card-header">
<h5 class="card-title mb-0">Order Items</h5>
</div>
<div class="card-body">
<table class="table table-bordered">
<thead>
<tr>
<th>Product ID</th>
<th>Product</th>
<th>Price</th>
<th>Quantity</th>
<th>Total</th>
</tr>
</thead>
<tbody>
@forelse($order->items as $item)
<tr>
<td>{{ $item->product_id }}</td>
<td>{{ $item->product_title }}</td>
<td>${{ number_format($item->price, 2)
}}</td>
<td>{{ $item->quantity }}</td>
<td>${{ number_format($item->total, 2)
}}</td>
</tr>
@empty
<tr>
<td colspan="5" class="text-center">
No order items found.
</td>
</tr>
@endforelse
</tbody>
<tfoot>
<tr>
<th colspan="4" class="text-
end">Subtotal</th>
<th>${{ number_format($order->subtotal, 2)
}}</th>
</tr>
<tr>
<th colspan="4" class="text-
end">Shipping</th>
<th>${{ number_format($order->shipping_price,
2) }}</th>
</tr>
<tr>
<th colspan="4" class="text-end">Total</th>
<th>${{ number_format($order->total, 2)
}}</th>
</tr>
</tfoot>
</table>
<a href="{{ route('admin2.orders.index') }}"
class="btn btn-secondary">
Back to Orders
</a>
</div>
</div>
</div>
<!--end::Container-->
</div>
<!--end::App Content-->
</main>
<!--end::App Main-->
@endsection
