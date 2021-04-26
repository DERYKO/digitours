<?php

namespace App\Http\Controllers\Api;

use App\Data\Models\Activity;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $activities = Activity::with('sub_activity:id,activity_id,name,cover_photo')
            ->select('id', 'name', 'cover_photo')
            ->filterBy($request->all())
            ->get();
        return response()->json($activities, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'cover_photo' => 'required'
        ]);
        $path = '';
        if ($request->hasFile('cover_photo')) {
            $path = $request->file('cover_photo')->store('images/activities', [
                'disk' => 'public'
            ]);
        }
        $activity = Activity::create([
            'name' => $request->name,
            'cover_photo' => $path,
            'added_by' => Auth::id()
        ]);

        return response()->json($activity, 200);


    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'cover_photo' => 'required'
        ]);
        $path = '';
        if ($request->hasFile('cover_photo')) {
            $path = $request->file('cover_photo')->store('images/activities', [
                'disk' => 'public'
            ]);
        }
        $activity = Activity::findOrFail($id);
        $activity->update([
            'name' => $request->name,
            'cover_photo' => $path
        ]);
        return response()->json(['message' => 'updated'],200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $activity = Activity::findOrFail($id);
        $activity->delete();
        return response()->json(['message' => ' deleted'],200);
    }
}
