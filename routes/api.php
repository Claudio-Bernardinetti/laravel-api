<?php

use App\Http\Controllers\API\TypeController;
use App\Http\Controllers\API\ProjectController;
use App\Http\Controllers\API\TechnologyController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
/* use App\Models\Project;
use App\Models\Technology;
use App\Models\Type; */

/* 
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/* Route::get('projects', function () {
    return response()->json([
        'succsess' => true,
        'claudio' => 'caludio',
        'result' => Project::with('type', 'technologies')->orderBy('id')->paginate(18)
    ]);
});

Route::get('types', function () {
    return response()->json([
        'status' => 'success',
        'result' => App\Models\Type::all()
    ]);
});


Route::get('technologies', function () {
    return response()->json([
        'status' => 'success',
        'result' => App\Models\Technology::all()
    ]);
}); */

Route::get('projects', [ProjectController::class, 'index']);
Route::get('projects/latest', [ProjectController::class, 'latest']);
Route::get('projects/{project:id}', [ProjectController::class, 'show']);


Route::get('types', [TypeController::class, 'index']);
Route::get('technologies', [TechnologyController::class, 'index']);
