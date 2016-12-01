<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Image;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Post;
use App\Category;
use App\Tag;
use Mews\Purifier\Facades\Purifier;
use Session;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$posts = Post::all();
        $posts=Post::orderby('id','desc')->paginate(3);
        return view('posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.create',compact('categories','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // dd($request);
        $this->validate($request, array(
            'title' => 'required|max:60|min:5',
            'slug' => 'required|max:70|min:5|alpha_dash|unique:posts,slug',
            'category_id' => 'required|integer',
            'body' => 'required',
            'featured_image'=>'Sometimes|Image'

        ));
        $post = new Post;
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->category_id = $request->category_id;
        if($request->hasFile('featured_image'))
        {
            $images = $request->file('featured_image');
            $fileName = time().'.'.$images->getClientOriginalExtension();
            $location = public_path('images/'.$fileName);
            Image::make($images)->resize(800,400)->save($location);
            $post->images = $fileName;
        }
        $post->body = Purifier::clean($request->body);
        $post->save();
        $post->tags()->sync($request->tags,false);
        Session::flash('success','Post Successfully Store');
        return redirect()->route('posts.show',$post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $category_objects =Category::all();//objects data collection '$category_objects' variable
        $categories = array();
        foreach ($category_objects as $category)
        {
            $categories[$category->id] = $category->name;
        }
        //dd($category_objects);
        $tags = Tag::all();
        $tags2= array();
        foreach ($tags as $tag)
        {
            $tags2[$tag->id] = $tag->name;
        }
        //dd($tags2);
        return view('posts.edit',compact('post','categories','tags2'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Post $post)
    {
        //dd($request);
        if ($request->slug == $post->slug) {
            $this->validate($request, array(
                'title' => 'required|max:60|min:5',
                'category_id' => 'required|integer',
                'body' => 'required',
                'featured_image'=>'Image'
            ));
        }else{
            $this->validate($request, array(
                'title' => 'required|max:60|min:5',
                'slug' => 'required|max:70|min:5|alpha_dash|unique:posts,slug',
                'category_id' => 'required|integer',
                'featured_image'=>'Image',
                'body' => 'required'
            ));
        }
        //$post->update($request->all());
        $post = Post::find($post->id);
        $post->title = $request->input('title');
        $post->slug = $request->input('slug');
        $post->category_id = $request->input('category_id');
        $post->body = $request->input('body');
        if($request->hasFile('featured_image'))
        {
            $image = $request->featured_image;
            $filename = time().'.'.$image->getClientOriginalExtension();
            $location = public_path('images/'.$filename);
            Image::make($image)->resize(800,400)->save($location);
            $oldFilename = $post->images;
            $post->images = $filename;
            Storage::delete($oldFilename);
        }
        $post->save();

        if(isset($request->tags)){
            $post->tags()->sync($request->tags);
        }else{
            $post->tags()->sync(array());
        }
        Session::flash('success','Update Successfully');
        return redirect()->route('posts.show',$post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->tags()->detach();
        Storage::delete($post->images);
       // dd($id);
        $post->delete();
        Session::flash('success','Delete Successfully');
        return redirect()->route('posts.index');

    }
}
