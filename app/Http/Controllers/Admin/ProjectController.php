<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = DB::table('projects')->paginate(7);
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
        $val_data = $request->all();
        
        // generate the post slug
        $val_data['slug'] = Str::slug($request->github_link, '-');
        //$val_data = ($request->description);
        //dd($val_data);
        


        // add the cover image if passed in the request
        if ($request->has('cover_image')) {
            $file_path = Storage::put('storage_img', $request->cover_image);
            $val_data['cover_image'] = $file_path;
        }

        
        // create the new article
        Project::create($val_data);
        //dd($val_data);
        return to_route('admin.projects.index')->with('message', 'Post Created successfully');
    }
    /**
     * Display the specified resource.
     */
    public function show(Project $project)
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
        $request->validated();

        

        $val_data = $request->all();
        $slug  = Str::slug($request->all()["description"], '-');
        $val_data += ['slug' => $slug];


        if ($request->has('cover_image')) {
            $file_path = Storage::put('storage_img', $request->cover_image);
            $val_data['cover_image'] = asset($file_path);

            if ($project->preview) {
                Storage::delete($project->cover_image);
            }
        }

        $project->update($val_data);

        //dd($val_data);
        return to_route('admin.projects.index')->with('message', 'project successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        if (!is_null($project->cover_image)) {
            Storage::delete($project->cover_image);
        }

        $project->delete();
        return to_route('admin.projects.index')->with('message', 'Item successfully deleted!');
    }
}
