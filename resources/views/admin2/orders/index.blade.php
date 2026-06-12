@extends('layout.admin2')
@section('title')Orders List @endsection
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
<h3 class="mb-0">Orders List</h3>
</div>
<div class="col-sm-8">
<ol class="breadcrumb float-sm-end">
<li class="breadcrumb-item"><a
href="/admin2">admin2</a></li>
<li class="breadcrumb-item active" aria-current="page">Orders List</li>
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
<div class="card mb-3">
<div class="card-body">
<form action="{{ route('admin2.orders.index') }}"
method="GET" class="row g-2">
<div class="col-md-4">
<select name="status" class="form-control">
<option value="">All Orders</option>
@foreach($statuses as $item)
<option value="{{ $item }}" {{
$status == $item ? 'selected' : '' }}>
{{ $item }}
</option>
@endforeach
</select>
</div>
<div class="col-md-2">
<button type="submit" class="btn btn-
primary">
Filter
</button>
</div>
<div class="col-md-2">
<a href="{{ route('admin2.orders.index') }}"
class="btn btn-secondary">
Clear
</a>
</div>
</form>
</div>
</div>
<table class="table table-bordered">
<thead>
<tr>
<th>ID</th>
<th>Customer</th>
<th>Email</th>
<th>Phone</th>
<th>Total</th>
<th>Status</th>
<th>Date</th>
<th width="120">Actions</th>
</tr>
</thead>
<tbody>
@forelse($orders as $order)
<tr>
<td>{{ $order->id }}</td>
<td>{{ $order->name }}</td>
<td>{{ $order->email }}</td>
<td>{{ $order->phone }}</td>
<td>
${{ number_format($order->total, 2) }}
</td>
<td>
@if($order->status == 'New')
<span class="badge bg-primary">New</span>
@elseif($order->status == 'Accepted')
<span class="badge bg-
info">Accepted</span>
@elseif($order->status == 'Cancelled')
<span class="badge bg-
danger">Cancelled</span>
@elseif($order->status == 'Onshipping')
<span class="badge bg-
warning">Onshipping</span>
@elseif($order->status == 'Completed')
<span class="badge bg-
success">Completed</span>
@else
<span class="badge bg-secondary">{{
$order->status }}</span>
@endif
</td>
<td>
{{ $order->created_at->format('m/d/Y H:i') }}
</td>
<td>
<a href="{{ route('admin2.orders.show',$order->id) }}" class="btn btn-info btn-sm">
Show
</a>
</td>
</tr>
@empty
<tr>
<td colspan="8" class="text-center">
No orders found.
</td>
</tr>
@endforelse
</tbody>
</table>
<div class="mt-3">
{{ $orders->links() }}
</div>
</div>
<!--end::Container-->
</div>
<!--end::App Content-->
</main>
<!--end::App Main-->
@endsection
