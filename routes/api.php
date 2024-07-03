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
    ->middleware(['guest:' . config('fortify.guard')])
    ->name('api.password.reset');

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/get-token', function (Request $request) {
        //get currently authenticated user
        $user = $request->user();
        //create a token for the user
        // Check the user role
        switch ($user()->role()) {
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
