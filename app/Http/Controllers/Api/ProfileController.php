<?php

namespace App\Http\Controllers\Api;

use App\Data\Models\UserAddress;
use App\Data\Models\UserBucketList;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = User::with('user_bucket_list')->findOrFail($request->user()->id);
//        return response()->json($user,200);

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
            'name' => ['required'],
        ]);
        $photo = null;
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo')->store('images/avatars', [
                'disk' => 'public'
            ]);
        }
        $request['photo'] = $photo;
        $user = User::findOrfail($request->user()->id);
        $user->update($request->only('photo', 'name', 'email'));
        collect($request->sub_activities)->each(function ($item) {
            UserBucketList::updateOrCreate([
                'user_id' => Auth::id(),
                'activity_id' => $item['activity_id'],
                'sub_activity_id' => $item['sub_activity_id'],
                'complete' => false
            ]);
        });
        collect($request->user_addresses)->each(function ($item) {
            UserAddress::updateOrCreate([
                'user_id' => Auth::id(),
                'address' => $request->address ?? 'Unknown',
                'latitude' => $item['latitude'],
                'longitude' => $item['longitude'],
                'type' => 'Primary'
            ]);
        });
        return response()->json(['user' => $user, 'message' => 'success']);
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
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
