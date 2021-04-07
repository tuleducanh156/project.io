<?php

namespace App\Http\Controllers\frontend;
use App\Category;
use App\Brand;
use App\Product;
use App\User;
use App\Checkouts;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Member\ProductRequest;
use App\Http\Requests\Member\MemberRequest;
use Illuminate\Support\Facades\Auth;
use Image;
use Illuminate\Support\Facades\Mail;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id_member= Auth::id();
        $listProduct = DB::table('products')->where('id_member', $id_member);
        $listProduct = $listProduct->get()->toArray();
        // // dd($listProduct);
        // $getProducts=[];
        // $getArrImage=[];
        // $datagetImage=[];
       
        // //  dd($datagetImage);
       return view('frontend\product\product',compact('listProduct'));
    }
    public function home()
    {
        
        $ShowProduct = DB::table('products')->select('*');
        $ShowProduct = $ShowProduct->get();
        // dd($ShowProduct);
        // $getProducts="";
        // $getArrImage="";
    
        // foreach($ShowProduct as $row ){
        //     $getProducts = Product::find($row->id)->toArray();
        //     $getArrImage = json_decode($getProducts['image'], true);
        // }
        //  dd($getArrImage);
       return view('frontend\product\home-product',compact('ShowProduct'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
       
        $listCategory = DB::table('categories')->select('*');
        $listCategory = $listCategory->get();
        $listBrand = DB::table('brands')->select('*');
        $listBrand = $listBrand->get();
        return view('frontend\product\add-product',compact('listCategory','listBrand'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $id_member= Auth::id();
        $Product= new Product;
        $dataImage=[];
        
        if($request->hasfile('image')){
            $count= count($request->file('image'));

            if($count > 3){
                return redirect()->back()->withErrors('hình ảnh không đúng kích thước or quá số lương hình.');
            } else {
                foreach($request->file('image') as $image)
                {
    
                    $namefile = $image->getClientOriginalName();
                    $namefile_2 = "2".$image->getClientOriginalName();
                    $namefile_3 = "3".$image->getClientOriginalName();
    
                   // $image->move('upload/product/', $namefile);
                    
                    $path = public_path('upload/product/' . $namefile);
                    $path2 = public_path('upload/product/' . $namefile_2);
                    $path3 = public_path('upload/product/' . $namefile_3);
    
                    Image::make($image->getRealPath())->save($path);
                    Image::make($image->getRealPath())->resize(50, 70)->save($path2);
                    Image::make($image->getRealPath())->resize(200, 300)->save($path3);
                    
                    $dataImage[] = $namefile;
                }
            }
        
          
        }
        // dd($dataImage);
        $Product->id_member =$id_member;
        $Product->name = $request->name;
        $Product->price = $request->price;
        $Product->category = $request->category;
        $Product->brand = $request->brand;
        $Product->sale = $request->sale;
        $Product->num_sale= $request->num_sale;
        $Product->namecompany= $request->namecompany;
        $Product->detail = $request->detail;

        $Product->image=json_encode($dataImage);
        if($Product->save()){
            return redirect()->back()->with('success','thêm dữ liệu thành công.');
        }
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
        $listCategory = DB::table('categories')->select('*');
        $listCategory = $listCategory->get();

        $listBrand = DB::table('brands')->select('*');
        $listBrand = $listBrand->get();

        $EditProduct =  $EditProduct = Product::findOrFail($id);
         $ProductSinger = Product::find($id)->toArray();
         $getImage = json_decode($ProductSinger['image'], true);
        
        //  dd($getArrImage);
       return view('frontend\product\edit-product',compact('EditProduct','getImage','listCategory','listBrand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $EditProduct =  $EditProduct = Product::findOrFail($id);
        
        $id_member= Auth::id();
        $dataImage=[];
        $data = $request->all();
        // $data= $data->except('_token');
        // dd($data);
        if($request->hasfile('image')){
           
            foreach($request->file('image') as $image)
            {

                $namefile = $image->getClientOriginalName();
                $namefile_2 = "2".$image->getClientOriginalName();
                $namefile_3 = "3".$image->getClientOriginalName();

               // $image->move('upload/product/', $namefile);
                
                $path = public_path('upload/product/' . $namefile);
                $path2 = public_path('upload/product/' . $namefile_2);
                $path3 = public_path('upload/product/' . $namefile_3);

                Image::make($image->getRealPath())->save($path);
                Image::make($image->getRealPath())->resize(50, 70)->save($path2);
                Image::make($image->getRealPath())->resize(200, 300)->save($path3);
                
                $dataImage[] = $namefile;
            }
            $data['image'] =json_encode($dataImage);
        }
        $data['id_member']=$id_member;
        // dd($dataImage);
        // $UpdateProduct->id_member =$id_member;
        // $UpdateProduct->name = $request->name;
        // $UpdateProduct->price = $request->price;
        // $UpdateProduct->category = $request->category;
        // $UpdateProduct->brand = $request->brand;
        // $UpdateProduct->sale = $request->sale;
        // $UpdateProduct->num_sale= $request->num_sale;
        // $UpdateProduct->namecompany= $request->namecompany;
        // $UpdateProduct->detail = $request->detail;

       
        if($EditProduct->update($data)){
            return redirect()->back()->with('success','update dữ liệu thành công.');
        }

    }
     public function checkout(){
        $listCountry = DB::table('countries')->select('*');
        $listCountry = $listCountry->get();
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
        return view('/frontend/checkout/checkout',compact('listCountry','listAddCart'));
     }
  
    public function UpToCheckout(Request $request)
    {
     if(!empty($_POST['id_item']))   {
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
        }  
        // return redirect()->back(compact('quantity'));
    }
    public function signup(memberRequest $request){
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
            return redirect()->back()->with('success', __('News Member success.please user login and checkout'));
        }
    }
    public function MailCheckout(){
        $id_user= Auth::id();
        $Email= Auth::user()->email;
        $Name= Auth::user()->name;
        $Phone= Auth::user()->phone;
        $data = session()->get('cart');
        $totalall= 0;
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
         foreach($listAddCart as $key=>$value){
            $totalall= $totalall+ $value->price*$value->qty;
         }
    
        $Check = new Checkouts;
        $Check->email = $Email;
        $Check->name = $Name;
        $Check->phone = $Phone;
        $Check->id_user= $id_user;
        $Check->price = $totalall;
        if($Check->save()){
            Mail::send('frontend.mail', 
            ['content' => $listAddCart, ],
            function ($message) {
                $message->from('tuleducanh06@gmail.com', 'Testmail');
                $message->to('tuleducanh06@gmail.com');
                $message->subject ('Chủ đề Email');
             });

            return redirect()->back()->with('success','Đã gửi mail thanh toán.Vui lòng check mail');
        }
        
    }
    public function Search( Request $request){
        $search = $request->search;
        $filterData = DB::table('products')->where('name','LIKE','%'.$search.'%')
                      ->get();

        dd($filterData);
        return view('frontend\search\search');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $DeleteProduct = Product::find($id);

        $DeleteProduct->delete();
        return redirect()->action('frontend\ProductController@index')->with('success','Dữ liệu xóa thành công.');
    }
}
