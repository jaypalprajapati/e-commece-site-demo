<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
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
    public function index(Request $request)
    {
        $data = Category::latest()->paginate(2);
        if ($request->has('trashed')) {

            $data1 = Category::onlyTrashed()->get();
        } else {

            $data1 = Category::get();
        }

        return view('category.index', compact('data', 'data1'))->with('i', (request()->input('page', 1) - 1) * 2);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
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
            'cname' => 'required|unique:categories',
            'active' => 'required',


        ], [
            'cname.required' => 'category is required',
            'active.required' => 'Select any one',


        ]);
        $category = $request->all();

        Category::create($category);

        return redirect()->route('category.index')
            ->with('success', 'Category Added successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @param \app\models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param \app\models\Category $category
     ** @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'cname' => 'required',
            'active' => 'required',


        ], [
            'cname.required' => 'category is required',
            'active.required' => 'Selecte any one',

        ]);
        //$admin->Update($request->all());
        //$category = $request->all();
        $category->update($request->all());
        return redirect()->route('category.index')
            ->with('success', 'Category updated successfully');
    }

    public function show()
    {
        // return view ('category.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param \app\models\Category $category
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * 
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('category.index')
            ->with('success', 'Category deleted successfully');
    }


    public function delete($id) //product + category delete
    {
        $data = DB::table('categories')
            ->Join('products', 'categories.id', '=', 'products.category_id')
            ->where('category_id', $id);
        $data->delete();

        DB::table('products')->where('category_id', $id)->delete();
        // $data->delete($jay);
        return redirect()->route('category.index')->with('success', 'Data Deleted');
    }


    /**

     * restore specific post

     *

     * @return void

     */

    public function restore($id)
    {
        Category::withTrashed()->find($id)->restore();
        return redirect()->back();
    }
    /**

     * restore all post

     *

     * @return response()

     */

    public function restoreAll()
    {
        Category::onlyTrashed()->restore();
        return redirect()->back();
    }
}
