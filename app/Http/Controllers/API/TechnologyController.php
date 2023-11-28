<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Technology;
use Illuminate\Http\Request;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'status' => 'success',
            'result' => Technology::all()
        ]);
    }

    public function show($id)
    {
        $technology = Technology::with('projects')->where('id', $id)->first();
        if ($technology) {
            return response()->json([
                'success' => true,
                'result' => $technology
            ]);
        } else {
            return response()->json([
                'success' => false,
                'result' => 'Ops! Page not found'
            ]);
        }
    }

    
}
