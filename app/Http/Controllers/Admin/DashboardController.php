<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\User;



class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [

        'total_projects' => Project::all()->count(),
        'total_users' => User::all()->count(),
        'last_projects' => Project::orderByDesc('id')->limit(3)->get(),

        ]);

    }
}
