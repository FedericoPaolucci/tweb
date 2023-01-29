<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    
    public function store(Request $request)
    {
        $request->validate([
            'body' => 'required|max:500'
        ]);
        
        if(Auth::check()){
            $blog = Blog::where('id_owner', $request->id_blog_owner)->first(); 
            if ($blog){
                $post = new Post();
        
                $post->body = $request->input('body');
                $post->id_blog_owner = $request->input('id_blog_owner');
                $post->id_writer=Auth::id();
              
                $post->save();
            }
            else{
                return redirect()->back();
            }
            
        }
        else{
            return redirect()->back();
        }
        
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if(Auth::check()){
            $post = Post::where('id',$request->id)->where('id_writer',Auth::id())->first();
            $post->delete();
            
            return response()->json([
                'status' => 200,
                'message' => 'Post eliminato correttamente'
            ]);
        }
        else{
            return response()->json([
                'status' => 401,
                'message' => 'Errore'
            ]);
        }
    }
}
