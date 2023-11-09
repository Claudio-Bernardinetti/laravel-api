<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        //dd($request->all());

        // validate the user input
        $val_data = $request->validated();
        //dd($val_data);

        // generate the post slug
        $val_data['slug'] = Str::slug($request->title, '-');


        // add the cover image if passed in the request
        if ($request->has('cover_image')) {
            $path = Storage::put('posts_images', $request->cover_image);
            $val_data['cover_image'] = $path;
        }

        //dd($val_data);
        // create the new article
        Post::create($val_data);
        return to_route('admin.posts.index')->with('message', 'Post Created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $val_data = $request->validate([
            'title' => 'required|min:3|max:50',
            'cover_image' => 'nullable',
            'content' => 'nullable|image|max:600'

        ]);

        /* $data = $request->all(); */

        if ($request->has('cover_image') && $post->thumb) {
            Storage::delete($post->cover_image);
            $file_path = Storage::put('storage_img', $request->cover_image);
            $val_data['cover_image'] = $file_path;
        }

        //dd($file_path);
        //dd($val_data);

        $post->update($val_data);
        return to_route('posts.index')->with('message', 'Item successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if (!is_null($post->thumb)) {
            Storage::delete($post->thumb);
        }

        $post->delete();
        return to_route('posts.index')->with('message', 'Item successfully deleted!');
    }
}
