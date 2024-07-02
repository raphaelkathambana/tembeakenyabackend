<?php

namespace App\Http\Responses;

class APIGroupUpdatedResponse
{
    public function toResponse($request)
    {
        return response()->json([
            'message' => 'Group details updated successfully',
            'group' => $request->group
        ], 200);
    }
}
