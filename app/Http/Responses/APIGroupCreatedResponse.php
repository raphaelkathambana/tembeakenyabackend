<?php

namespace App\Http\Responses;

class APIGroupCreatedResponse
{
    public function toResponse($request)
    {
        return response()->json([
            'message' => 'Successfully created a new group',
            'group' => $request->group,
            'is_authorized' => $request->user()->tokenCan('admin:functions'),
            'user_role' => $request->user()->role,
        ], 200);
    }
}
