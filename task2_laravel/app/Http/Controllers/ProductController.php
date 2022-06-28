<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function filterProduct(Request $request)
    {
        $query = Product::query();
        $categories = Category::all();
        if ($request->ajax()) {
            if (empty($request->category)) {
                $products = $query->get();
            }
            else{
            $products = $query->where(['category_id' => $request->category])->get();
            }
            return response()->json($products);
        }
    }
    public function index(Request $request)
    {
        $data = Product::join('categories','categories.id','=','category_id')->get(['products.*','categories.cname']);
        // echo($data);
        // exit;
        $jay = Category::get();
        if ($request->has('trashed')) {

            $data1 = Product::onlyTrashed()->get();
        }else {
            $data1= Product::get();
        }    
        return view('product.index',compact('data','jay','data1')) ->with('i', (request()->input('page', 1) - 1) * 2);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        $jay = Category::get();

        
        return view('product.create', compact('jay'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required',
            'category_id'=>'required',
            'image'=>'required | image |max:20048',
            'active'=> 'required',
        ]);

       

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('public/images'), $imageName);
        $product=$request->all();
        $product['image'] = $imageName;
        Product::create($product);

        return redirect()->route('product.index')
                        ->with('success','product Added successfully.');
    
    }
    public function show()
    {
       // return view ('product.index');
    }    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *  @param \app\models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $jay = Category::get();
        return view('product.edit',compact('product','jay'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param \app\models\Product $product
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
        'name' => 'required',
           
            'category_id'=>'required',
            'active'=> 'required',
        ],[
            'name.required' => 'Product Name required',
                'category_id.required'=>'Category is Required',
                'active.required'=> 'Please select active',
            ]);
        if(!empty($request->image)) {

            unlink(public_path('public/images/'.$product->image));

            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('public/images'), $imageName);
            $product->name = $request->name;
            $product->category_id = $request->category_id;
            $product->active = $request->active;

            // $product=$request->all();

            // $product['createdbyuser']=$user->id;

            $product['image'] = $imageName;

            $product->update();

            return redirect('product')

                        ->with('success','Post Upadte successfully.');

        }else{

            $product->name = $request->name;

            $product->category_id = $request->category_id;

            $product->active = $request->active;

            // $product['createdbyuser']=$user->id;

            $product->update();

            return redirect('product') ->with('success','Post created successfully.');

        }
    }

    /**
     * Remove the specified resource from storage.
     *@param \app\models\Product $product
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        Product::find($id)->delete();
    
        return redirect()->route('product.index')
                        ->with('success','Product deleted successfully');
    }
     /**

     * restore specific post

     *

     * @return void

     */

    public function restore($id)

    {

        Product::withTrashed()->find($id)->restore();

 

        return redirect()->back();

    }



        /**

     * restore all post

     *

     * @return response()

     */

    public function restoreAll()

    {

        Product::onlyTrashed()->restore();

 

        return redirect()->back();

    }
}
