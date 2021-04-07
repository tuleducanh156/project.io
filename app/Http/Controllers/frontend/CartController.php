<?php

namespace App\Http\Controllers\frontend;
use App\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listCart=[];
        $listAddCart=[];
        $data = session()->get('cart');
        // dd($data);
        if(!empty($data)){
       foreach($data as $row){
            $listCart =DB::table('products')->where('id', $row['id']);
            $listCart = $listCart->get()->toArray();
            $listCart = $listCart[0];
            $listCart->qty = $row['qty'];
            $listAddCart[$row['id']]=$listCart;
     
       }
    }
    //    dd($listAddCart);
         return view('frontend\Cart\cart',compact('listAddCart'));
    }
    
    public function addToCart(Request $request)
    {
        
       
        $id_item = $_POST['id_item'];
        // echo $id_item;
        $array = [];
        $array['id'] = $id_item;
        $array['qty'] = 1;
        
        if (session()->has('cart')) {
                  
            $getSession = session()->get('cart');
            $flag = 1;
            foreach ($getSession as $key => $value) {
                if ($id_item == $value['id']) {
                    
                    $getSession[$key]['qty'] += 1;
                    session()->put('cart',$getSession);
                    $flag = 0;
                    break;
                }
            }
            
            if ($flag == 1) {
                session()->push('cart',$array);
            }
            
        } else {
            session()->push('cart',$array);

        }
        // 
        return response()->json(['success'=>'Add product to your cart successfully.']);
    }
    public function UpToCart(Request $request)
    {
        
        $id_item = $_POST['id_item'];

            $getSession = session()->get('cart');
            // 
            $flag = 1;
            foreach ($getSession as $key => $value) {
                if ($id_item == $value['id']) {
                    
                    if($_POST['type'] == 'up'){
                        $getSession[$key]['qty'] = $getSession[$key]['qty'] +1;
                    }
                     if($_POST['type'] == 'down') {
                        $getSession[$key]['qty'] =  $getSession[$key]['qty'] -1;    
                    }
                     $quantity =  $getSession[$key]['qty'];
                    if($quantity<1){
                        unset($getSession[$key]);
                    }
                    if($_POST['type'] == 'delete'){
                        unset($getSession[$key]);
                    }
                }
                session()->put('cart',$getSession);
            }
            echo $quantity;
            
        // return redirect()->back(compact('quantity'));
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
    public function store(Request $request)
    {
        //
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
