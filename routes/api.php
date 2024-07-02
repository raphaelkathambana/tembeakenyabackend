<?php

use App\Http\Controllers\GroupController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppRedirectController;
use Laravel\Fortify\Http\Controllers\NewPasswordController;
use Laravel\Fortify\RoutePath;

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

Route::get(RoutePath::for('password.reset', 'v1/reset-password/{token}'), [NewPasswordController::class, 'create'])
->middleware(['guest:'.config('fortify.guard')])
->name('api.password.reset');

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/get-token', function (Request $request) {
        //get currently authenticated user
        $user = $request->user();
        //create a token for the user
        // Check the user role
        switch ($user()->role) {
            case '1':
                // Create a token for the authenticated user
                $token = $request->user()->createToken($request->device_name, ['hiker:functions'])->plainTextToken;
                // Store the token in the session
                session(['login_token' => $token]);
                break;
            case '2':
                // Create a token for the authenticated user
                $token = $request->user()->createToken($request->device_name, ['guide:functions'])->plainTextToken;
                // Store the token in the session
                session(['login_token' => $token]);
                break;
            case '3':
                // Create a token for the authenticated user
                $token = $request->user()->createToken($request->device_name, ['admin:functions'])->plainTextToken;
                // Store the token in the session
                session(['login_token' => $token]);
                break;
            default:
                // Create a token for the authenticated user
                $token = $request->user()->createToken($request->device_name, ['user:functions'])->plainTextToken;
                // Store the token in the session
                session(['login_token' => $token]);
                break;
        }
        //return the token
        return Response::json([
            'token' => $token
        ]);
    });

    Route::middleware('verified')->group(function () {
        Route::get('/go-to-app', [AppRedirectController::class, 'return']);
    });

    // Group Routes
    Route::apiResource('groups', GroupController::class);
    Route::post('/groups/{group}/update', [GroupController::class, 'update'])
    ->middleware('ability:admin:functions, guide:functions');

    Route::post('/groups/{group}/delete', [GroupController::class, 'destroy'])
    ->middleware('abilities:admin:functions');

    Route::post('/groups/create', [GroupController::class, 'store'])
    ->middleware('ability:admin:functions, guide:functions');

    Route::get('/groups/{group}', [GroupController::class, 'show']);

    Route::post('/groups/{group}/members/add', [GroupController::class, 'storeMember']);
    Route::post('/groups/{group}/members/remove', [GroupController::class, 'removeMember']);
    Route::post('/groups/{group}/members/remove-all', [GroupController::class, 'removeAllMembers']);
    Route::post('/groups/{group}/members/update', [GroupController::class, 'updateMember']);
    Route::post('/groups/{group}/members/{user}/update', [GroupController::class, 'updateMember']);
    Route::post('/groups/{group}/members/{user}/delete', [GroupController::class, 'destroyMember']);

    // Route::get('/groups/{group}/edit', [GroupController::class, 'edit']);
    // Route::get('/groups/create', [GroupController::class, 'create']);
    // Route::get('/groups', [GroupController::class, 'index']);
    // Route::get('/groups/{group}/members', [GroupController::class, 'members']);
    // Route::get('/groups/{group}/members/add', [GroupController::class, 'addMember']);
    // Route::get('/groups/{group}/members/{user}', [GroupController::class, 'showMember']);
    // Route::get('/groups/{group}/members/{user}/edit', [GroupController::class, 'editMember']);
    // Route::get('/groups/{group}/members/{user}/delete', [GroupController::class, 'deleteMember']);
    Route::post('/about', function () {
        return Response::json([
            'name' => 'Abigail',
            'state' => 'CA'
        ]);
    });
    Route::get('/meme', function () {
        return Response::json([
            'message' => 'huh',
        ]);
    });
});
