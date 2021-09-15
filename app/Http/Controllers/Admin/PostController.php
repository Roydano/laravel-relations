<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
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
            'title' => 'required',
            'description' => 'required',
            'author'=> 'required'
       ]); 

        $data = $request->all( );

        $newPost = new Post( );
        $slug = Str::slug($data['title'], '-');
        $slugBase = $slug;
        $slugAttuale = Post::where('slug', $slug)->first();
        $count = 1;

        while($slugAttuale){
            $slug = $slugBase . '-' . $count;
            $slugAttuale = Post::where('slug', $slug)->first();
            $count++;
        }
        $newPost->slug = $slug;
        $newPost->fill($data);

        $newPost->save( );

        return redirect( )->route('admin.posts.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);

        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'author'=> 'required'
       ]);
       
        $data = $request->all();
        if($data['title'] != $post->title){
            $data['slug'] = Str::slug($data['title'], '-');
            $slugBase = $data['slug'];
            $slugAttuale = Post::where('slug', $data['slug'])->first();
            $count = 1;
            while($slugAttuale){
                $slug = $slugBase. '-' . $count;
                $slugAttuale = Post::where('slug', $slug)->first();
                $count++;
            }

            $data ['slug']=$slug;        }

        $post->update($data);

        return redirect()->route('admin.posts.index')->with('edit', 'Il post numero ' . $post->id . ' è stato modificato con successo!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('admin.posts.index')->with('delete', 'Il post numero ' . $post->id . ' è stato cancellato');
    }
}
