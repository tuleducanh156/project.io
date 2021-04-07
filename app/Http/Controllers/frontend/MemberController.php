<?php

namespace App\Http\Controllers\frontend;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Member\MemberRequest;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLogin()
    {
        return view('frontend/member/login');
    }
    public function postLogin(MemberRequest $request)
    {
        $login =[
            'email'=>$request->email,
            'password'=>$request->password,
            'level'=> 0
        ];
        $remember = false;
        if($request->remember_me){
            $remember=true;
        }
        
        if(Auth::attempt($login,$remember)){
            $users = Auth::user();
            return redirect('/index');
        }else{
            return redirect()->back()->withErrors('Email or Password is not correct');
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listCountry = DB::table('countries')->select('*');
        $listCountry = $listCountry->get();
        return view('/frontend/member/signup',compact('listCountry'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(memberRequest $request)
    {
        $member = new User;
        $member->name = $request->name; 
        $member->email = $request->email;
        $member->password =bcrypt($request->password);
        $member->phone =$request->phone;
        $member->address =$request->address;
        $file = $request->avatar;
        if(!empty($file)){
            $member->avatar= $file->getClientOriginalName();
        }
        // dd($file);
        // exit;
        $member->id_country=$request->id_country;
        $member->level = 0;
        if($member->save()){
            if(!empty($file)){
                $file->move('upload/user/avatar', $file->getClientOriginalName());
            
            }
            return redirect()->back()->with('success', __('News Member success.'));
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/login_member');
        
        
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
