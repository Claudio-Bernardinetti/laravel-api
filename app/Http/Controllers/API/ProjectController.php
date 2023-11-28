<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'succsess' => true,
            'result' => Project::with('type', 'technologies')->orderBy('id')->paginate(12)
        ]);
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $project = Project::with('type', 'technologies')->where('id', $id)->first();
        if ($project) {
            return response()->json([
                'success' => true,
                'result' => $project
            ]);
        } else {
            return response()->json([
                'success' => false,
                'result' => 'Ops! Page not found'
            ]);
        }
    }

    public function latest()
    {
        return response()->json([
            'success' => true,
            'result' => Project::with('type', 'technologies')->orderByDesc('id')->take(3)->get()
        ]);
    }
}
