<?php

namespace App\Http\Controllers\Api;

use App\Data\Models\TravelDestination;
use App\Data\Models\TravelDestinationContact;
use App\Data\Models\TravelDestinationPolicy;
use App\Data\Models\TravelDestinationSubActivity;
use App\Data\Models\TravelDestinationTag;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class TravelDestinationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $travel_destination = TravelDestination::with('travel_destination_contacts:id,contact_type_id,travel_destination_id,value', 'travel_destination_contacts.contact_type:id,name')
            ->select('id', 'name', 'logo', 'address', 'latitude', 'longitude', 'website', 'created_at')
            ->filterBy($request->all())
            ->get();
        return response()->json($travel_destination, 200);
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
            'name' => 'required',
            'logo' => 'required',
            'destination_policy' => 'array'
        ]);
        $path = '';
        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('images/logos', [
                'disk' => 'public'
            ]);
        }
        $travel_destination = TravelDestination::create([
            'name' => $request->name,
            'logo' => $path,
            'address' => $request->address,
            'website' => $request->website,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'added_by' => Auth::id()
        ]);
        TravelDestinationPolicy::updateOrCreate([
            'travel_destination_id' => $travel_destination->id,
            'policy' => $request->policy,
            'added_by' => $request->user()->id
        ]);
        collect($request->sub_activities)->each(function ($item) use ($travel_destination) {
            TravelDestinationSubActivity::updateOrCreate([
                'travel_destination_id' => $travel_destination->id,
                'sub_activity_id' => $item,
                'added_by' => Auth::id()
            ]);
        });
        collect($request->tags)->each(function ($item) use ($travel_destination) {
            TravelDestinationTag::updateOrCreate([
                'travel_destination_id' => $travel_destination->id,
                'activity_id' => $item
            ]);
        });

        return response()->json($travel_destination, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $travel_destination = TravelDestination::with('policy', 'gallery', 'contacts.contact_type:id,name', 'tags','sub_activities')->findOrFail($id);
        return \response()->json($travel_destination);
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
            'name' => 'required',
            'logo' => 'required',
            'policy' => 'required'
        ]);
        $travel_destination = TravelDestination::findOrFail($id);
        $travel_destination->update([
            'name' => $request->name,
            'address' => $request->address,
            'website' => $request->website,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ]);
        TravelDestinationPolicy::updateOrCreate([
            'travel_destination_id' => $travel_destination->id,
        ], [
            'policy' => $request->policy,
        ]);
        TravelDestinationTag::where('travel_destination_id', $id)->delete();
        collect($request->tags)->each(function ($item) use ($id) {
            TravelDestinationTag::updateOrCreate([
                'travel_destination_id' => $id,
                'activity_id' => $item,
                'added_by' => Auth::id()
            ]);
        });
        TravelDestinationSubActivity::where('travel_destination_id', $id)->delete();
        collect($request->sub_activities)->each(function ($item) use ($id) {
            TravelDestinationSubActivity::updateOrCreate([
                'travel_destination_id' => $id,
                'sub_activity_id' => $item,
                'added_by' => Auth::id()
            ]);
        });
        return response()->json(['message' => ' updated'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $travel_destination = TravelDestination::findOrFail($id);
        $travel_destination->delete();
        return response()->json(['message' => 'deleted'], 200);
    }
}
