<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Project::all();

        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
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
        Project::create($val_data);
        return to_route('admin.projects.index')->with('message', 'Post Created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $post)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $val_data = $request->validate([
            'title' => 'required|min:3|max:50',
            'cover_image' => 'nullable',
            'content' => 'nullable|image|max:600'

        ]);

        /* $data = $request->all(); */

        if ($request->has('cover_image') && $project->thumb) {
            Storage::delete($project->cover_image);
            $file_path = Storage::put('storage_img', $request->cover_image);
            $val_data['cover_image'] = $file_path;
        }

        //dd($file_path);
        //dd($val_data);

        $project->update($val_data);
        return to_route('projects.index')->with('message', 'Item successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        if (!is_null($project->thumb)) {
            Storage::delete($project->thumb);
        }

        $project->delete();
        return to_route('projects.index')->with('message', 'Item successfully deleted!');
    }
}
