<?php

namespace App\Http\Controllers\Backend;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id','desc')->get();
        return view('backend.posts.index')->with([
            'posts'=>$posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('backend.posts.create')->with([
            'categories'=>$categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
            'body'=>'required',
            'image_post'=>'required',
            'category_id'=>'required'
        ]);

        if ($request->hasFile('image_post')) {
            $filename = $request->image_post->getClientOriginalName();
            $img = Image::make(request()->file('image_post'))->fit(190,105)->save(public_path('/storage/posts/'.$filename),80,'jpg');

            $post = new Post();

            $slug = str_slug($request->title,'-','en');
            $post->title = $request->title;
            $post->body = $request->body;
            $post->slug = $slug;
            $post->category_id = $request->category_id;
            $post->image = $filename;
            $post->lien_video = $request->lien_video;

            $post->save();

            $response = ['success',"Le post a été ajouté avec succès"];

        }

        return response()->json($response,200);


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
        $categories = Category::all();
        return view('backend.posts.edit')->with([
            'post'=>$post,
            'categories'=>$categories
        ]);
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
        if ($request->hasFile('image_projet')) {
            $filename = $request->image_projet->getClientOriginalName();
            $img = Image::make(request()->file('image_projet'))->fit(190,105)->save(public_path('/storage/projets/'.$filename),80,'jpg');

            $post->image = $filename;
        }

        $slug = str_slug($request->title,'-','en');
        $post->title = $request->title;
        $post->body = $request->body;
        $post->slug = $slug;
        $post->category_id = $request->category_id;
        $post->lien_video = $request->lien_video;

        $post->update();

        session()->flash('success',"Le post a été modifié avec succès");
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        unlink($post->image);
        $post->delete();
        session()->flash('success',"Le post a été supprimé avec succès");
        return redirect()->back();
    }
}
