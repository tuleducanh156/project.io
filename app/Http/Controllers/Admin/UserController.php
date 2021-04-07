<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
   /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $listCountry = DB::table('countries')->select('*');
        $listCountry = $listCountry->get();
        return view('Admin\profile\page-profile',['users'=>Auth::user()],compact('listCountry'));
    }
     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request)
    {
      
        $userId = Auth::id();
        $user = User::findOrFail($userId);

        $data = $request->all();
        // dd($data);
        $file = $request->avatar;
        if(!empty($file)){
            $data['avatar'] = $file->getClientOriginalName();
        }
        
        if ($data['password']!='') {
            $data['password'] = bcrypt($data['password']);
        }else{
            $data['password'] = $user->password;
        }
        // echo $data['country'];
    //    dd($data);
        if ($user->update($data)) {
            if(!empty($file)){
                $file->move('upload/user/avatar', $file->getClientOriginalName());
            }
            return redirect()->back()->with('success', __('Update profile success.'));
        } else {
            return redirect()->back()->withErrors('Update profile error.');
        }

    }
   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function Login(Request $request)
    // {
    //     $email = $request['email'];
    //     $password = $request['password'];
    //     if(Auth::attempt(['email'=>$email,'password'=>$password]))
    //     {
    //         return view('Admin\profile\page-profile',['user'=>Auth::user()]);
    //     }
    //     else{
    //         return view('dangnhap',['error'=>'đăng nhập không thành công']);
    //     }
    // }
    // public function getRegister(){
    //     return view('dangki');

    // }
    // public function postRegister(LoginRequest $request){
    //     $users = new Users;
    //     $users->name = $request->name; 
    //     $users->email = $request->email;
    //     $users->password = bcrypt($request->password);
    //     $users->phone = $request->phone;
    //     $users->message = $request->message;
        
    //     if($users->save()){
    //         return redirect('/dangnhap');;
    //     }
        
    // }
    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, User $user)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
