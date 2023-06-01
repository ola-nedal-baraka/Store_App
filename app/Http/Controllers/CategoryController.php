<?php
 namespace App\Http\Controllers;
 use Illuminate\Support\Facades\Auth;
 use App\Models\Category;
 use Illuminate\Http\Request;
 
class CategoryController extends Controller{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        $categories = Category::where('user_id', Auth::id())->paginate();//typically 15 items per page(default value)
       return view('admin.categories.index',compact('categories'));
    }

    public function create(){
        return view('admin.categories.create');
    }
    /**
     * @param \Illuminate\Http\Request $request;
     * @return \Illuminate\Http\Response;
     * 
     * 
     */


    public function store( Request $request)
    
    {
        $category  = new Category();

        $category->name = $request->name;
        $category->user_id = Auth::id();
        $category ->save();
     return redirect()->back();
     /* $category->quantity = $request->quantity;
    $category->price = $request->price;
     $category->category_id = $request->category_id;
     $category->description = $request->description; */

     

    }
/**
 * @param\App\Models\Admin\Category $categorie
 *  @return \Illuminate\Http\Response 
 * 
 */



    public function edit($id){
        $category = Category::find($id);
        return view('admin.categories.edit',compact('category'));

    }

/**
 * @param \Illuminate\Http\Request $request
 * @param \App\Models\Admin\Category $category
 * @return \Illuminate\Http\Response 
 * 
 * 
 * 
 */
    public function update(Request $request,$id)
    {
         $category = Category::find($id);
         $category->name = $request->name;
         $category->user_id = Auth::id();
         $category->save();
       // return redirect('categories'); or
       return redirect()->back();

    }

/**
 * @param \Illuminate\Http\Product $product
 * @return \Illuminate\Http\Response
 */
    public function destroy($id){
        $category =Category::find($id)->delete();
return redirect()->back();

    }
}