<?php

namespace App\Http\Controllers\Admin;
use App\Blogs;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
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
       return view('Admin/blog/blog',compact('listBlogs'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin/blog/add-blog');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $blogs = new Blogs;

        $blogs->title= $request->create_blog;
        
        $file = $request->file_blog;
        if(!empty($file)){
            $blogs->image= $file->getClientOriginalName();
        }
        // dd($file);
        // exit;
        $blogs->description= $request->description;
        $blogs->content= $request->txtContent;
        if($blogs->save()){
            if(!empty($file)){
                $file->move('upload/user/blogs', $file->getClientOriginalName());
            
            }
            return redirect()->back()->with('success', __('update blogs success.'));
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
        
        $Blogs = Blogs::findOrFail($id);
        $pageBlogs='Blogs - update';
        return view('Admin/blog/edit-blog',compact('Blogs'));
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
        // $updateBlogs = Blogs::findOrFail($id);
        // $data = $request->all();
        
        // $file = $request->file_blog;
        // if(!empty($file)){
        //     $data['file_blog'] = $file->getClientOriginalName();
        // }
        
        // dd($data);
        // if ($updateBlogs->update($data)) {
        //     if(!empty($file)){
        //         $file->move('upload/user/avatar', $file->getClientOriginalName());
        //     }
        //     return redirect('/blog')->with('success', __('Update blogs success.'));
        // } else {
        //     return redirect('/blog')->withErrors('Update blogs error.');
        // }
        $updateBlogs = Blogs::find($id);

        $updateBlogs->title= $request->create_blog;
        
        $updatefile = $request->file_blog;
        if(!empty($file)){
            $updateBlogs->image= $updatefile->getClientOriginalName();
        }
        // dd($file);
        // exit;
        $updateBlogs->description= $request->description;
        $updateBlogs->content= $request->txtContent;
        if($updateBlogs->save()){
            if(!empty($updatefile)){
                $updatefile->move('upload/user/blogs', $updatefile->getClientOriginalName());
            
            }
            return redirect()->back()->with('success', __('update blogs success.'));
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $DeleteBlogs = Blogs::find($id);

        $DeleteBlogs->delete();
        return redirect()->action('Admin\BlogController@index')->with('success','Dữ liệu xóa thành công.');
    }
}
