<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use App\Http\Requests\Posts\CreatePostsRequest;
use App\Http\Requests\Posts\UpdatePostRequest;




class PostsController extends Controller
{

    public function __construct(){
        $this->middleware('VerifyCategoryCount')->only(['create','store']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create')->with('categories', Category::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostsRequest $request)
    {
        //dd($request->image->store('posts'));
        //dd($request->all());
     $image =  $request->image->store('posts');
     
     Post::create([
         'title'         => $request->title,
         'description'   => $request->description,
         'content'       => $request->content,
         'published_at'  => $request->published_at,
         'category_id'   => $request->category,
         'image'         => $image
     ]);

     session()->flash('success','Post created successfully');

     return redirect(route('posts.index'));

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
        //assign first before die dump
        $data = Post::find($id);
        // /dd($data->title);

        return view('posts.create')->with('post', $data)->with('categories',Category::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        //dd($request->all());
        $data = $request->only(['title','description','content','published_at']);
        if($request->hasFile('image')){
            //upload image
            $image = $request->image->store('posts');
            //delete old image
            $post->deleteImage();
            //copy image path
            $data['image'] = $image;
        }

        //update attributes
        $post->update($data);
        
        session()->flash('success', 'Has been successfully updated');

        return redirect(route('posts.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::withTrashed()->where('id', $id)->firstOrFail();

        if ($post->trashed()){
            $post->deleteImage();
            $post->forceDelete();
            session()->flash('success','Permanently deleted.');
            return redirect(route('trashed-posts.index'));
        }else{
            $post->delete();
            session()->flash('success','Successfully trashed.');
            return redirect(route('posts.index'));
        }
    }

    /**
     * List of all trashed posts.
     *
     * @return \Illuminate\Http\Response
     */
    public function trashed()
    {
        $trashed = Post::onlyTrashed()->get();
        return view('posts.index')->with('posts',$trashed);
    }

    /**
     * List of all trashed posts.
     *
     * @return \Illuminate\Http\Response
     */

    public function restore($id){

        $post = Post::withTrashed()->where('id', $id)->firstOrFail();
        $post->restore();
        session()->flash('success','Post has been restored');
        return redirect(route('trashed-posts.index'));
    }
}
