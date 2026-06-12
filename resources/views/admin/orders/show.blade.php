@extends('layout.admin')

@section('title') Order Detail #{{ $order->id }} @endsection

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Order Detail #{{ $order->id }}</h1>
    <ol class="breadcrumb mb-0">
        <li class="breadcrumb-item"><a href="#">Admin</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.orders.index') }}">Orders</a></li>
        <li class="breadcrumb-item active">Order Detail</li>
    </ol>
</div>

<!-- Flash Messages -->
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fas fa-check-circle mr-1"></i> {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
    </div>
@endif

@if($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Please fix the following errors:</strong>
        <ul class="mb-0 mt-1">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
    </div>
@endif

<div class="row">

    <!-- Customer Information -->
    <div class="col-lg-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-user fa-fw mr-1"></i> Customer Information
                </h6>
            </div>
            <div class="card-body">

                <div class="row border-bottom py-2 align-items-center">
                    <div class="col-4 font-weight-bold text-dark border-left-primary pl-3">Name</div>
                    <div class="col-8 text-gray-800">{{ $order->name }}</div>
                </div>
                <div class="row border-bottom py-2 align-items-center">
                    <div class="col-4 font-weight-bold text-dark border-left-primary pl-3">Email</div>
                    <div class="col-8 text-gray-800">{{ $order->email }}</div>
                </div>
                <div class="row border-bottom py-2 align-items-center">
                    <div class="col-4 font-weight-bold text-dark border-left-primary pl-3">Phone</div>
                    <div class="col-8 text-gray-800">{{ $order->phone ?? '—' }}</div>
                </div>
                <div class="row border-bottom py-2 align-items-center">
                    <div class="col-4 font-weight-bold text-dark border-left-primary pl-3">Address</div>
                    <div class="col-8 text-gray-800">{{ $order->address }}</div>
                </div>
                <div class="row border-bottom py-2 align-items-center">
                    <div class="col-4 font-weight-bold text-dark border-left-primary pl-3">City</div>
                    <div class="col-8 text-gray-800">{{ $order->city ?? '—' }}</div>
                </div>
                <div class="row border-bottom py-2 align-items-center">
                    <div class="col-4 font-weight-bold text-dark border-left-primary pl-3">Country</div>
                    <div class="col-8 text-gray-800">{{ $order->country ?? '—' }}</div>
                </div>
                <div class="row py-2 align-items-center">
                    <div class="col-4 font-weight-bold text-dark border-left-primary pl-3">ZIP Code</div>
                    <div class="col-8 text-gray-800">{{ $order->zip_code ?? '—' }}</div>
                </div>

            </div>
        </div>
    </div>

    <!-- Order Information -->
    <div class="col-lg-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-clipboard-list fa-fw mr-1"></i> Order Information
                </h6>
            </div>
            <div class="card-body">

                <div class="row border-bottom py-2 align-items-center">
                    <div class="col-5 font-weight-bold text-dark border-left-primary pl-3">Order ID</div>
                    <div class="col-7 text-gray-800">#{{ $order->id }}</div>
                </div>
                <div class="row border-bottom py-2 align-items-center">
                    <div class="col-5 font-weight-bold text-dark border-left-primary pl-3">Status</div>
                    <div class="col-7">
                        @if($order->status == 'New')
                            <span class="badge badge-primary px-3 py-2">New</span>
                        @elseif($order->status == 'Accepted')
                            <span class="badge badge-info px-3 py-2">Accepted</span>
                        @elseif($order->status == 'Cancelled')
                            <span class="badge badge-danger px-3 py-2">Cancelled</span>
                        @elseif($order->status == 'Onshipping')
                            <span class="badge badge-warning px-3 py-2">Onshipping</span>
                        @elseif($order->status == 'Completed')
                            <span class="badge badge-success px-3 py-2">Completed</span>
                        @else
                            <span class="badge badge-secondary px-3 py-2">{{ $order->status }}</span>
                        @endif
                    </div>
                </div>
                <div class="row border-bottom py-2 align-items-center">
                    <div class="col-5 font-weight-bold text-dark border-left-primary pl-3">Payment Method</div>
                    <div class="col-7 text-gray-800">{{ $order->payment_method }}</div>
                </div>
                <div class="row border-bottom py-2 align-items-center">
                    <div class="col-5 font-weight-bold text-dark border-left-primary pl-3">Shipping Method</div>
                    <div class="col-7 text-gray-800">{{ $order->shipping_method }}</div>
                </div>
                <div class="row border-bottom py-2 align-items-center">
                    <div class="col-5 font-weight-bold text-dark border-left-primary pl-3">Order Date</div>
                    <div class="col-7 text-gray-800">{{ $order->created_at->format('m/d/Y H:i') }}</div>
                </div>
                <div class="row border-bottom py-2 align-items-center">
                    <div class="col-5 font-weight-bold text-dark border-left-primary pl-3">Subtotal</div>
                    <div class="col-7 text-gray-800">${{ number_format($order->subtotal, 2) }}</div>
                </div>
                <div class="row border-bottom py-2 align-items-center">
                    <div class="col-5 font-weight-bold text-dark border-left-primary pl-3">Shipping</div>
                    <div class="col-7 text-gray-800">${{ number_format($order->shipping_price, 2) }}</div>
                </div>
                <div class="row py-2 align-items-center">
                    <div class="col-5 font-weight-bold text-dark border-left-primary pl-3">Total</div>
                    <div class="col-7 font-weight-bold text-primary">${{ number_format($order->total, 2) }}</div>
                </div>

                <hr>

                <!-- Update Status -->
                <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="status" class="font-weight-bold text-dark border-left-primary pl-2">
                            Change Status
                        </label>
                        <select name="status" id="status" class="form-control">
                            @foreach($statuses as $status)
                                <option value="{{ $status }}" {{ $order->status == $status ? 'selected' : '' }}>
                                    {{ $status }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success btn-block">
                        <i class="fas fa-sync-alt fa-sm mr-1"></i> Update Status
                    </button>
                </form>

            </div>
        </div>
    </div>

</div>

<!-- Order Items -->
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">
            <i class="fas fa-shopping-cart fa-fw mr-1"></i> Order Items
        </h6>
        <a href="{{ route('admin.orders.index') }}" class="btn btn-sm btn-secondary">
            <i class="fas fa-arrow-left fa-sm"></i> Back to Orders
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="thead-light">
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
                            <td>${{ number_format($item->price, 2) }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>${{ number_format($item->total, 2) }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">
                                <i class="fas fa-info-circle mr-1"></i> No order items found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
                <tfoot class="thead-light">
                    <tr>
                        <th colspan="4" class="text-right">Subtotal</th>
                        <th>${{ number_format($order->subtotal, 2) }}</th>
                    </tr>
                    <tr>
                        <th colspan="4" class="text-right">Shipping</th>
                        <th>${{ number_format($order->shipping_price, 2) }}</th>
                    </tr>
                    <tr>
                        <th colspan="4" class="text-right">Total</th>
                        <th class="text-primary">${{ number_format($order->total, 2) }}</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

@endsection
