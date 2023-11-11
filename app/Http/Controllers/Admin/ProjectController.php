<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = DB::table('projects')->paginate(5);
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
        $request->validated();

        $data = $request->all();
        $slug  = Str::slug($request->all()["title"], '-');
        $data += ['slug' => $slug];

        if ($request->has('preview')) {
            $file_path = Storage::put('projects_previews', $request->preview);
            $data['preview'] = $file_path;
        }

        Project::create($data);

        return to_route('admin.projects.index')->with('message', 'project successfully created!');
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

        $data = $request->all();
        $slug  = Str::slug($request->all()["title"], '-');
        $data += ['slug' => $slug];

        if ($request->has('preview')) {
            $file_path = Storage::put('projects_previews', $request->preview);
            $data['preview'] = $file_path;

            if ($project->preview) {
                Storage::delete($project->preview);
            }
        }

        $project->update($data);

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
