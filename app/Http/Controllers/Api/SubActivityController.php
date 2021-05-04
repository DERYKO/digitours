<?php

namespace App\Http\Controllers\Api;

use App\Data\Models\SubActivity;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class SubActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $sub_activities = SubActivity::with('activity:id,name,cover_photo')
            ->select('id', 'name', 'cover_photo', 'activity_id', 'created_at')
            ->get();
        return response()->json($sub_activities, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required'],
            'activity_id' => ['required'],
        ]);
        $path = '';
        if ($request->hasFile('cover_photo')) {
            $path = $request->file('cover_photo')->store('images/sub_activities', [
                'disk' => 'public'
            ]);
        }
        $activity = SubActivity::create([
            'name' => $request->name,
            'cover_photo' => $path,
            'activity_id' => $request->activity_id,
            'added_by' => Auth::id()
        ]);
        return response()->json($activity, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $sub_activity = SubActivity::findOrFail($id);
        return response()->json($sub_activity);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => ['required'],
            'activity_id' => ['required'],
        ]);
        $sub_activity = SubActivity::findOrFail($id);
        $sub_activity->update($request->only('name', 'activity_id'));
        return response()->json(['message' => 'updated successfully'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $sub_activity = SubActivity::findOrFail($id);
        $sub_activity->delete();
        return response()->json(['message' => 'deleted successfully'], 200);
    }
}
