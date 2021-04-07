<?php

namespace App\Http\Controllers\frontend;
use App\Category;
use App\Brand;
use App\Product;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listCategory = DB::table('categories')->select('*');
        $listCategory = $listCategory->get();

        $listBrand = DB::table('brands')->select('*');
        $listBrand = $listBrand->get();
        return view('frontend\search\search_advanced',compact('listCategory','listBrand'));
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
    public function SearchProduct(Request $request)
    {
        $name = $request->name;
        $price = $request->price;
      
        $category= $request->category;
        $brand= $request->brand;
      
         $listSearch = DB::table('products');
         if (!empty($name))
            {

                $listSearch->where('name','LIKE','%'.$name.'%');
            }              
        
        if (!empty($price))
        {
            $price_ex= explode("-", $price );
            $min_price= $price_ex[0];
            $max_price= $price_ex[1];
            
            $listSearch->whereBetween('price',[$min_price , $max_price]);
        }
        if (!empty($category))
        {
            $listSearch->where('category', $category);
        }
        if (!empty($category))
        {
            $listSearch->where('category', $category);
        }
        if (!empty($brand))
        {
            $listSearch->where('brand', $brand);
        }
        $listSearch = $listSearch->get()->toArray();
        
        return view('frontend\search\search_product',compact('listSearch'));
         
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
