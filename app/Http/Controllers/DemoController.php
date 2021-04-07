<?php

namespace App\Http\Controllers;

use App\Demo;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
class DemoController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('guest');
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
       
    //     // $info="Đây là trang demo";
    //     // $arr= ['username','email'];
    //     //  return view('demo', compact('info','arr'));
    //     $data['user'] ='Dang thien bao';
    //     $data['year'] = '1987';
    //     return view('demo', compact('data'));
    // }
    public function GetLogin(){
        return view('dangnhap');

    }
    public function PostLogin(LoginRequest $request){
        $project = new Demo;
        $project->name = $request->name; 
        $project->email = $request->username;
        $project->password = $request->password;

        if($project->save()){
            return redirect('/profile');
        }
        
       
    }
    // public function PostLogin(Request $request)
    // {
    //     $this->validate($request,
    //     [ 
    //         'username'=>'required|max:20',
    //         'password'=> 'required|max:20'
    //     ],
    //     [
    //         'required'=>': attribute không được để trống',
    //         'max'=>': attribute không được quá : max ký tự'
    //     ]
    //     );
    //     echo $request->username."----";
    //        echo $request->password;
    // }
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Demo  $demo
     * @return \Illuminate\Http\Response
     */
    public function show(Demo $demo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Demo  $demo
     * @return \Illuminate\Http\Response
     */
    public function edit(Demo $demo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Demo  $demo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Demo $demo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Demo  $demo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Demo $demo)
    {
        //
    }
}
