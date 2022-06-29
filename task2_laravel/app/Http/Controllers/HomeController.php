<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function dashboard()
    {
        $data =  Product::join('categories','categories.id','=','category_id')->get(['products.*','categories.cname']);
        $datanew['newdata'] = " ";
        $jay = Category::get();
        return view('dashboard', compact('data', 'datanew', 'jay'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function filterProduct(Request $request)
    {
        $query = Product::query();
        $categories = Category::all();
        if ($request->ajax()) {
            if (empty($request->category)) {
                $products = $query->get();
            } else {
                $products = $query->where(['category_id' => $request->category])->get();
            }
            return response()->json($products);
        }
    }
    public function create()
    {
        return view('user.create');
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

            'name' => 'required|min:2|max:15|unique:admins',
            'email' => 'required|email',
            'password' => 'required|min:4|max:9|',
            'gender' => 'required',
            'hobbies' => 'required',
        ]);
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->gender = $request->gender;
        $user->hobbies = $request->hobbies;
        $user->password = Hash::make($request->password);
        $user->type = 2;
        $user->save();
        $password = Hash::make('password');

        $data = product::latest()->paginate(5);
        $datanew['newdata'] = " ";
        $jay = Category::get('cname');
        return view('dashboard', compact('data', 'datanew', 'jay'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
