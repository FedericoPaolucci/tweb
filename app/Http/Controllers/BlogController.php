<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $myid = Auth::id();
        $myblog = Blog::where('id_owner', $myid)->first();
        
        return view('blog.index', compact('myid'),compact('myblog'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'subject' => 'required|max:50',
            'about' => 'required|max:400'
        ]);
        $myid=Auth::id();
        
        if (Blog::withTrashed()->where('id_owner', $myid)->exists()){
            $oldblog=Blog::withTrashed()->where('id_owner',$myid)->first();
            $oldblog->forcedelete();
        }
        $blog = new Blog();
        
        $blog->subject = $request->input('subject');
        $blog->about = $request->input('about');
        $blog->id_owner = $myid;
              
        $blog->save();
        
        return redirect()->route('blog.show',$blog->id_owner); //REDIRECT
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        $posts = $blog->posts()->orderby('posted_at','desc')->paginate(10);
        return view('blog.show')
                ->with('posts',$posts)
                ->with('blog',$blog);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect()->route('blog.index'); //REDIRECT
    }
    
    public function __construct() {
                $this->middleware('user')->except('show');
    }
}
