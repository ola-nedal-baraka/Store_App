<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $orders = Order::where('user_id', Auth::id())->paginate(12);//typically 15 items per page(default value)
        return view('admin.orders.index', compact('orders'));
    }

    public function create()
    {
        $products = Product::where('user_id', Auth::id())->get();
        return view('admin.orders.create', compact('products'));
    }

    public function store(Request $request)
    {
        $order = new Order;

        $order->name = $request->name;
        $order->user_id = Auth::id();
        $order->product_id = $request->product_id;
        $order->quantity = $request->quantity;
        $order->total_price = $request->total_price;
        $order->save();

        return redirect()->back();
    }
    public function show(Order $order)
    {
        
    }

    public function edit($id)
    {
        $order = Order::find($id);
        $products = Product::where('user_id', Auth::id())->get();

        return view("admin.orders.edit", compact('order', 'products'));
    }

    public function update(Request $request, $id)
    {
        $order = Order::find($id);

        $order->name = $request->name;
        $order->user_id = Auth::id();
        $order->product_id = $request->product_id;
        $order->quantity = $request->quantity;
        $order->total_price = $request->total_price;

        $order->save();

        return redirect()->back();
    }


    public function purchase($product_Id)
{
    $orderData = [
        'name' => auth()->user()->name .'purchases'. Product::find($product_Id)->name,
        'user_id' => auth()->id(),
        'product_id' => $product_Id,
        'quantity' => request()->input("quantity", 1),
        'total_price' => request()->input("quantity", 1) * Product::find($product_Id)->price,
    ];

    Order::create($orderData);
    return redirect()->back();        
}


    public function destroy($id)
    {
        $order = Order::find($id);
        $order->delete();
        return redirect()->back();
    }

    
}
