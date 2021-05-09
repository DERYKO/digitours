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
            'exclusive' => 'required',
            'inclusive' => 'required',
            'itinerary' => 'required',
            'policy' => 'required',
            'requirements' => 'required',
            'sub_activities' => ['required'],
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
            ],[
                'added_by' => $request->user()->id
            ]);
        });
        PackageExclusive::updateOrCreate([
            'package_id' => $package->id,
            'exclusive' => $request['exclusive'],
        ],[
            'added_by' => $request->user()->id
        ]);
        PackageInclusive::updateOrCreate([
            'package_id' => $package->id,
            'inclusive' => $request['inclusive'],
        ],[
            'added_by' => $request->user()->id,
        ]);
        PackageItinerary::updateOrCreate([
            'package_id' => $package->id,
            'itinerary' => $request['itinerary'],
        ],[
            'added_by' => $request->user()->id,
        ]);
        PackagePolicy::updateOrCreate([
            'package_id' => $package->id,
            'policy' => $request['policy'],
        ],[
            'added_by' => $request->user()->id,
        ]);
        PackageRequirement::updateOrCreate([
            'package_id' => $package->id,
            'requirements' => $request['requirements'],
        ],[
            'added_by' => $request->user()->id,
        ]);
        collect(explode(',',$request->sub_activities))->each(function ($sub_activity) use ($package, $request) {
            PackageSubActivity::updateOrCreate([
                'package_id' => $package->id,
                'sub_activity_id' => $sub_activity,
            ],[
                'added_by' => $request->user()->id,
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
        $package = Package::with('travel_destination', 'package_cost', 'package_exclusive', 'package_inclusive', 'package_feedback', 'package_itinerary', 'package_policy', 'package_requirement', 'package_sub_activity')->findOrFail($id);
        return \response()->json($package);
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
            'exclusive' => 'required',
            'inclusive' => 'required',
            'itinerary' => 'required',
            'policy' => 'required',
            'requirements' => 'required',
            'sub_activities' => ['required'],
        ]);
//        $path = '';
//        if ($request->hasFile('cover_photo')) {
//            $path = $request->file('cover_photo')->store('images/packages', [
//                'disk' => 'public'
//            ]);
//        }
        $package = Package::findOrFail($id);
        $package->update([
            'travel_destination_id' => $request->travel_destination_id,
            'description' => $request->description,
        ]);
        PackageCost::where('package_id',$package->id)->delete();
        collect($request->costs)->each(function ($cost) use ($package, $request) {
            PackageCost::updateOrCreate([
                'package_id' => $package->id,
                'description' => $cost['description'],
                'cost' => $cost['cost'],
                'minimum_deposit' => $cost['minimum_deposit'],
            ],[
                'added_by' => $request->user()->id
            ]);
        });
        PackageExclusive::updateOrCreate([
            'package_id' => $package->id,
        ],[
            'exclusive' => $request['exclusive'],
            'added_by' => $request->user()->id
        ]);
        PackageInclusive::updateOrCreate([
            'package_id' => $package->id,
        ],[
            'inclusive' => $request['inclusive'],
            'added_by' => $request->user()->id,
        ]);
        PackageItinerary::updateOrCreate([
            'package_id' => $package->id,
        ],[
            'itinerary' => $request['itinerary'],
            'added_by' => $request->user()->id,
        ]);
        PackagePolicy::updateOrCreate([
            'package_id' => $package->id,
        ],[
            'policy' => $request['policy'],
            'added_by' => $request->user()->id,
        ]);
        PackageRequirement::updateOrCreate([
            'package_id' => $package->id,
        ],[
            'requirements' => $request['requirements'],
            'added_by' => $request->user()->id,
        ]);
        PackageSubActivity::where('package_id',$package->id)->delete();
        collect($request->sub_activities)->each(function ($sub_activity) use ($package, $request) {
            PackageSubActivity::updateOrCreate([
                'package_id' => $package->id,
                'sub_activity_id' => $sub_activity,
            ],[
                'added_by' => $request->user()->id,
            ]);
        });
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
