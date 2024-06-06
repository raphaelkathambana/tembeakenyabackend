<?php
namespace App\Actions\Fortify;

use Illuminate\Http\Request;
use Laravel\Sanctum\HasApiTokens;
use App\Models\User;

class CreateUserToken
{
    public function __invoke(Request $request, $next)
    {
        // Ensure the user model uses the HasApiTokens trait
        if (! in_array(HasApiTokens::class, class_uses(User::class))) {
            throw new \Exception('User model does not use HasApiTokens trait.');
        }

        // Create a token for the authenticated user
        $token = $request->user()->createToken('login-token')->plainTextToken;

        // Store the token in the session
        session(['login_token' => $token]);

        // Call the next class in the pipeline
        return $next($request);
    }
}
