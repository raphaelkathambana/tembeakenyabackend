<?php

namespace App\Http\Controllers;

use App\Http\Responses\APIGroupCreatedResponse;
use App\Http\Responses\APIGroupUpdatedResponse;
use App\Models\Group;
use App\Http\Requests\StoreGroupRequest;
use App\Http\Requests\UpdateGroupRequest;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // get all groups
        $groups = Group::all();
        // return a response
        return response()->json($groups, 200);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGroupRequest $request)
    {
        // validate the request
        $request->validated();
        // create a new group
        $group = new Group();
        $group->groupName = $request->groupName;
        $group->save();
        // return a response
        return (new APIGroupCreatedResponse())->toResponse($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(Group $group)
    {
        // return the group
        return response()->json($group, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGroupRequest $request, Group $group)
    {
        // validate the request
        $request->validated();
        // update the group
        $group->forceFill([
            'groupName' => $request['groupName'],
        ])->save();
        // return a response
        return (new APIGroupUpdatedResponse())->toResponse($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Group $group)
    {
        // Delete the group
        $group->delete();
        // return a response
        return response()->json([
            'message' => 'Group deleted successfully'
        ], 200);
    }
}
