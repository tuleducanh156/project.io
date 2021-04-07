<?php

namespace App\Http\Controllers\frontend;
use App\Blogs;
use App\RateBlogs;
use App\CommentBlogs;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BlogsIndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $listBlogs = DB::table('blogs')->select('*');
        $listBlogs = $listBlogs->get();
       return view('frontend/blogs/blogs',compact('listBlogs'));
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
       
        $BlogsSingle = Blogs::findOrFail($id);
        // $UserId= Auth::id();
        // $User = User::findOrFail($UserId);
        // $BlogsCmt = DB::table('comment_blosg')->select('*');
        // $BlogsCmt = $BlogsCmt->get();
        $BlogsCmt = DB::table('comment_blogs')
        ->where('id_blogs', $id)
        ->get()->toArray();
        // dd($BlogsCmt)    ;
        // if(!empty($BlogsCmt)){
        //     foreach($BlogsCmt as $value){
        //         $MemberId = array($value->id_member);
        //         // $User = User::findOrFail($UserId);    
        //     }
        // }
        // dd($BlogsCmt);
        $TotalRate= 0;
        $RatePonts = DB::table('rate_blogs')
            ->where('id_blogs', $id)
            ->get()->toArray();    
            $do_dai=count($RatePonts);

            if(!empty($RatePonts)){
                foreach($RatePonts as $row){
                    $TotalRate+=($row->rate);
                }
                $diem_rate_tb= round($TotalRate/$do_dai);

            }
            // echo round($diem_rate_tb);
        return view('frontend/blogs/blogs-single',compact('BlogsSingle','diem_rate_tb','BlogsCmt'));
    }

    public function PostRate()
    {
        
            $UserId= Auth::id();
            $id_blogs=$_POST['id_blogs'];
            $Values=$_POST['Values'];
           
            $Ratecheck = DB::table('rate_blogs')
                        ->where('id_blogs', $id_blogs)
                        ->where('id_member', $UserId)
                        ->get()->toArray();    
            
           
           
                if(empty($Ratecheck)){
                    $Rate= new RateBlogs;
                    $Rate->id_blogs= $id_blogs;
                    $Rate->id_member= $UserId;
                    $Rate->rate=$Values;
                    $Rate->save();
                    echo 'bạn đã bình chọn '.$Values.' sao cho bài viết ';
                 }else{
                        $errorRate='Bạn đã bình chọn điểm rồi ';
                       echo $errorRate;
                }
                
                

    }
     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function PostComment(Request $request)
    {
            $id_cha=$_POST['id_cha'];
            
            $UserId = Auth::id();
            $User = DB::table('users')
            ->where('id', $UserId)
            ->get()->toArray();
            foreach($User as $value){
                $avatar_user = $value->avatar;
                $name_user= $value->name;
            }
             
            $comment= new CommentBlogs;
            $comment->id_blogs= $request->id_blogs;
            $comment->id_member= $UserId;
            $comment->avatar_member= $avatar_user;
            $comment->name_member= $name_user;
            $comment->message=$request->message;
            if($id_cha!=''){
                $comment->level = $id_cha;
            }else{
                $comment->level = 0;
            }
            if($comment->save()){
                return redirect()->back()->with('success','thêm comment thành công.');
            } else {
                return redirect()->back()->withErrors('comment lỗi.');
            }
    
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
