<?php

namespace App\Http\Controllers\Api;

use App\Data\Models\Package;
use App\Data\Models\PackageCost;
use App\Data\Models\PackageExclusive;
use App\Data\Models\PackageFeedback;
use App\Data\Models\PackageInclusive;
use App\Data\Models\PackageItinerary;
use App\Data\Models\PackagePolicy;
use App\Data\Models\PackageRating;
use App\Data\Models\PackageRequirement;
use App\Data\Models\PackageSubActivity;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $this->validate($request, [
            'travel_destination_id' => ['required']
        ]);
        $packages = Package::with('travel_destination', 'package_cost', 'package_exclusive', 'package_inclusive', 'package_feedback', 'package_itinerary', 'package_policy', 'package_requirement', 'package_sub_activity')
            ->where('travel_destination_id', $request->travel_destination_id)->get();
        return response()->json($packages, 200);
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
            'travel_destination_id' => 'required',
            'description' => 'required',
            'cover_photo' => 'required',
            'package_cost' => 'array',
            'package_exclusive' => 'array',
            'package_feedback' => 'array',
            'package_inclusive' => 'array',
            'package_itinerary' => 'array',
            'package_policy' => 'array',
            'package_requirement' => 'array',
            'package_sub_activity' => 'array',
        ]);
        $path = '';
        if ($request->hasFile('cover_photo')) {
            $path = $request->file('cover_photo')->store('images/packages', [
                'disk' => 'public'
            ]);
        }
        $package = Package::create([
            'travel_destination_id' => $request->travel_destination_id,
            'description' => $request->description,
            'cover_photo' => $path,
            'added_by' => Auth::id()
        ]);

        collect($request->package_cost)->each(function ($cost) use ($package, $request) {
            PackageCost::updateOrCreate([
                'package_id' => $package->id,
                'description' => $cost['description'],
                'cost' => $cost['cost'],
                'minimum_deposit' => $cost['minimum_deposit'],
                'added_by' => $request->user()->id
            ]);
        });
        collect($request->package_exclusive)->each(function ($exclusive) use ($package, $request) {
            PackageExclusive::updateOrCreate([
                'package_id' => $package->id,
                'exclusive' => $exclusive['exclusive'],
                'added_by' => $request->user()->id
            ]);
        });
        collect($request->package_feedback)->each(function ($feedback) use ($package, $request) {
            PackageFeedback::updateOrCreate([
                'package_id' => $package->id,
                'user_id' => $request->user()->id,
                'comment' => $feedback['comment'],
            ]);
        });
        collect($request->package_inclusive)->each(function ($inclusive) use ($package, $request) {
            PackageInclusive::updateOrCreate([
                'package_id' => $package->id,
                'added_by' => $request->user()->id,
                'inclusive' => $inclusive['inclusive'],
            ]);
        });
        collect($request->package_itinerary)->each(function ($itinerary) use ($package, $request) {
            PackageItinerary::updateOrCreate([
                'package_id' => $package->id,
                'added_by' => $request->user()->id,
                'itinerary' => $itinerary['inclusive'],
            ]);
        });
        collect($request->package_policy)->each(function ($policy) use ($package, $request) {
            PackagePolicy::updateOrCreate([
                'package_id' => $package->id,
                'added_by' => $request->user()->id,
                'policy' => $policy['policy'],
            ]);
        });

        collect($request->package_requirement)->each(function ($requirement) use ($package, $request) {
            PackageRequirement::updateOrCreate([
                'package_id' => $package->id,
                'added_by' => $request->user()->id,
                'requirements' => $requirement['requirements'],
            ]);
        });
        collect($request->package_sub_activity)->each(function ($sub_activity) use ($package, $request) {
            PackageSubActivity::updateOrCreate([
                'package_id' => $package->id,
                'added_by' => $request->user()->id,
                'sub_activity_id' => $sub_activity['sub_activity_id'],
            ]);
        });
        return response()->json($package, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
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
            'travel_destination_id' => 'required',
            'description' => 'required',
            'cover_photo' => 'required',

        ]);
        $path = '';
        if ($request->hasFile('cover_photo')) {
            $path = $request->file('cover_photo')->store('images/packages', [
                'disk' => 'public'
            ]);
        }
        $package = Package::findOrFail($id);
        $package->update([
            'travel_destination_id' => $request->travel_destination_id,
            'description' => $request->description,
            'cover_photo' => $path,
        ]);
        return response()->json(['message' => 'updated'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $package = Package::findOrFail($id);
        $package->delete();
        return response()->json(['message' => 'deleted'], 200);
    }
}
