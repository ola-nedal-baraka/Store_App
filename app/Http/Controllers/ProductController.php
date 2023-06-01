<?php   
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
 
    public function index()
    {
       // $products = Product::all();

        $products = Product::where('user_id', Auth::id())->paginate();//typically 15 items per page(default value)
        return view('admin.products.index',compact('products'));
    }

    public function create(){

        //$categories = Category::all();
        $categories = Category::where('user_id', Auth::id())->get();
        return view('admin.products.create', compact('categories'));//بدي ارسلهم للفيو 

       
    }
    /**
     * @param \Illuminate\Http\Request $request;
     * @param \Illuminate\Http\Response;
     * 
     * 
     */

    public function store( Request $request)
    
    {
     $product = new Product();

     $product->name = $request->name;
     $product->quantity = $request->quantity;
     $product->price = $request->price;
     $product->category_id = $request->category_id;
     $product->description = $request->description;
     $product->user_id = Auth::id();
     $product->save();
     return redirect()->back();

    }

    public function show( Product $product){

    }

/**
 * 
 * @param \App\Models\Admin\Product $product;
 *  @return \App\Models\Http\Response ;
 */


    public function edit($id){

        $product = Product::find($id);
        //$categories = Category::all();
        $categories = Category::where('user_id', Auth::id())->get();
        return view('admin.products.edit',compact('products','categories'));

    }


    public function update(Request $request,$id)
    {
        $product = Product::find($id);

        $product->name = $request->name;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        $product->description = $request->description;
        $product->user_id = Auth::id();
        $product->save();
        return redirect('products'); //return redirect()->back();
    }
    public function destroy($id){
        
    Product::find($id)->delete();
    return redirect()->back();

    }
}
