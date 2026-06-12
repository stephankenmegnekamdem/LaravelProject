@extends('layout.admin')

@section('title') Orders List @endsection

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Orders List</h1>
    <ol class="breadcrumb mb-0">
        <li class="breadcrumb-item"><a href="#">Admin</a></li>
        <li class="breadcrumb-item active">Orders List</li>
    </ol>
</div>

<!-- Flash Messages -->
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fas fa-check-circle mr-1"></i> {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
    </div>
@endif

<!-- Filter Card -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            <i class="fas fa-filter fa-fw mr-1"></i> Filter Orders
        </h6>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.orders.index') }}" method="GET">
            <div class="row align-items-center">
                <div class="col-md-4">
                    <select name="status" class="form-control">
                        <option value="">All Orders</option>
                        @foreach($statuses as $item)
                            <option value="{{ $item }}" {{ $status == $item ? 'selected' : '' }}>
                                {{ $item }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary btn-block">
                        <i class="fas fa-search fa-sm mr-1"></i> Filter
                    </button>
                </div>
                <div class="col-md-2">
                    <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary btn-block">
                        <i class="fas fa-times fa-sm mr-1"></i> Clear
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Orders Table -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            <i class="fas fa-clipboard-list fa-fw mr-1"></i> Orders
        </h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead class="thead-light">
                    <tr>
                        <th>ID</th>
                        <th>Customer</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th width="100">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($orders as $order)
                        <tr>
                            <td>#{{ $order->id }}</td>
                            <td>{{ $order->name }}</td>
                            <td>{{ $order->email }}</td>
                            <td>{{ $order->phone ?? '—' }}</td>
                            <td>${{ number_format($order->total, 2) }}</td>
                            <td>
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
                            </td>
                            <td>{{ $order->created_at->format('m/d/Y H:i') }}</td>
                            <td>
                                <a href="{{ route('admin.orders.show', $order->id) }}"
                                   class="btn btn-info btn-sm btn-block">
                                    <i class="fas fa-eye fa-sm"></i> Show
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center text-muted">
                                <i class="fas fa-info-circle mr-1"></i> No orders found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-3">
            {{ $orders->links() }}
        </div>

    </div>
</div>

@endsection
