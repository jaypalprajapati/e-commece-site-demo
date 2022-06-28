<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
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
   
     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = USer::latest()->paginate(3);
        $datanew['newdata'] = " ";

        return view('admin.index',compact('data','datanew'))
            ->with('i', (request()->input('page', 1) - 1) * 3);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
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
    $user->type = 0;
    $user->save();
    $password = Hash::make('password');
    // User::create($user);
    return redirect()->route('admin.index')->with('success', 'Admin Successfully Added.');

}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */ 
    public function edit(User $admin)
    {
        return view('admin.edit',compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id  
     * 
     * 
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $admin)
    {
        
        $request->validate([
            'name' => 'required|min:2|max:15',
            'email' => 'required|email|unique:users,email,'.$admin->id.',id',
            'gender' => 'required',
            //'hobbies' => 'required',
           
        ],[
                'name.required' => 'Name is required',
                'name.min' => 'Minimum 1 charachers require!!',
                'name.max' => 'Maximum 15 charachers require!!',
                'name.unique' => 'Name is already exists!!',
                'gender'=>'Gender is required',
                             
                
            ]);

         
        // $request_data = $request->all();
        // $request_data['gender'] = 'active'; 
         
         //$admin::Update($request->all());
        // $admin['hobbies'] = $request->input('hobbies');
        
        $admin->Update($request->all());
        return redirect()->route('admin.index')
                        ->with('success','admin updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id )
    {
        User::find($id)->delete();
        return redirect()->route('admin.index')
                        ->with('success','Admin deleted successfully');
    }
    public function show(User $admin)
    {   
        return redirect()->route('admin.index');    
                       
    }
    
}
