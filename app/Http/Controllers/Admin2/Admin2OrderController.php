<?php
namespace App\Http\Controllers\Admin2;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
class Admin2OrderController extends Controller
{
public function index(Request $request)
{
$status = $request->status;
$orders = Order::with('user')
->when($status, function ($query) use ($status) {
$query->where('status', $status);
})
->latest()
->paginate(10);
$statuses = Order::STATUSES;
return view('admin2.orders.index', compact('orders', 'statuses',
'status'));
}
public function show($id)
{
$order = Order::with(['items.product', 'user'])->findOrFail($id);
$statuses = Order::STATUSES;
return view('admin2.orders.show', compact('order', 'statuses'));
}
public function updateStatus(Request $request, $id)
{
$request->validate([
'status' =>
'required|in:New,Accepted,Cancelled,Onshipping,Completed',
]);
$order = Order::findOrFail($id);
$order->update([
'status' => $request->status,
]);
return back()->with('success', 'Order status updated successfully.');
}
}
