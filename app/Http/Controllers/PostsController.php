<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Category;
use App\Models\Like;
class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',['except'=>['index','show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at','desc')->simplePaginate(10);
        return view('posts.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cat = Category::pluck('category_name','id')->toArray();
        $selectedID = 4;
        return view('posts.create')->with('cat',$cat)->with('selectedID',$selectedID);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $adm_id = DB::table('categories')->where('category_name','Administration')->pluck('id');
        $this->validate($request,[
            'title'=>'required',
            'category'=>'nullable',
            'body'=>'required',
            'post_image'=>'image|nullable|max:1999'
        ]);
        if($request->hasFile('post_image')){
            $fileNameWithExt = $request->file('post_image')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            $ext_type = $request->file('post_image')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$ext_type;
            $path = $request->file('post_image')->storeAs('public/cover_images/',$fileNameToStore);
        }
        if ($request->input('category')==1) {
            return back()->with('danger','You are not allowed to enter a post in this community');
        } else {
        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->category_id = $request->input('category');
        $post->post_image = $fileNameToStore;
        $post->save();
        return redirect('home')->with('success','Posts Created'); 
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
        $posts = Post::find($id);
        $uid = DB::table('posts')->where('id',$id)->value('user_id');
        $uname = DB::table('users')->where('id',$uid)->value('username');
        return view('posts.show')->with('posts',$posts)->with('comments',$posts->comments)->with('uname',$uname);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posts = Post::find($id);
        $cat = Category::pluck('category_name','id')->toArray();
        $selectedID = 1;
        //Check for Correct user
        if(auth()->user()->id !== $posts->user_id){
            return redirect('/posts')->with('danger','Unauthorized Page');
        }else{
            return view('posts.edit')->with('posts',$posts)->with('cat',$cat)->with('selectedID',$selectedID);
        }
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
        $this->validate($request,[
            'title'=>'required',
            'category'=>'required',
            'body'=>'required'
        ]);
        if ($request->input('category')==3) {
            return redirect('/posts')->with('danger','You are not allowed to enter a post in this community');
        } else {
        $posts = Post::find($id);
        $posts->title=$request->input('title');
        $posts->body=$request->input('body');
        $posts->category_id = $request->input('category');
        $posts->save();
        return redirect('/posts')->with('success','Post Has Been Successfuly Updated!');
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
        $posts=Post::find($id);
        $posts->delete();
        return redirect('/posts')->with('success','Post Has Been Successfuly Deleted!');
    }
}
