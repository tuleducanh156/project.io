<?php

namespace App\Http\Controllers\Admin;

use App\Country;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CountryController extends Controller
{
   
   /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function listCountry()
    {
        $listCountry = DB::table('countries')->select('*');
        $listCountry = $listCountry->get();
       return view('Admin\country\country-table',compact('listCountry'));
      
    }
   
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
         return view('Admin/country/add-country');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    //     $this->validate($request,
    //     [
    //         'country'=>'required'
    //     ],
    //     [
    //         'required'=>': không được để trống '
    //     ],
    //     [
    //         'country'=>'quốc gia'
    //     ]
    
    // );  
        $Country= new Country;
        $Country->country = $request->create_country;
        if($Country->save()){
            return redirect('/country')->with('success','thêm dữ liệu thành công.');
        }
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Country  
     * @return \Illuminate\Http\Response
     */
    public function show(Demo $demo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Country  
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
     * @param  \App\Country  
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Country $Country)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Country 
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $DeleteCountry = Country::find($id);

        $DeleteCountry->delete();
        return redirect()->action('Admin\CountryController@listCountry')->with('success','Dữ liệu xóa thành công.');
    }
}
