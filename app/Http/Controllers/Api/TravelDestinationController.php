<?php

namespace App\Http\Controllers\Api;

use App\Data\Models\TravelDestination;
use App\Data\Models\TravelDestinationContact;
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
        $travel_destination = TravelDestination::with('travel_destination_contacts:id,contact_type_id,value','travel_destination_contacts.contact_type:id,name')
            ->select('id', 'name', 'logo', 'address', 'latitude', 'longitude', 'website')
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
            'address' => 'required',
            'destination_contacts' => 'array',
            'destination_policies' => 'array'
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
        collect($request->destination_contacts)->each(function ($contact) use ($travel_destination, $request) {
            TravelDestinationContact::updateOrCreate([
                'travel_destination_id' => $travel_destination->id,
                'contact_type_id' => $contact['contact_type_id'],
                'value' => $contact['value'],
                'added_by' => $request->user()->id
            ]);
        });

        collect($request->destination_policies)->each(function ($policy) use ($travel_destination, $request) {
            TravelDestinationContact::updateOrCreate([
                'travel_destination_id' => $travel_destination->id,
                'policy' => $policy['policy'],
                'added_by' => $request->user()->id
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
            'name' => 'required',
            'logo' => 'required',
            'address' => 'required'
        ]);
        $path = '';
        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('images/logos', [
                'disk' => 'public'
            ]);
        }
        $travel_destination = TravelDestination::findOrFail($id);
        $travel_destination->update([
            'name' => $request->name,
            'logo' => $path,
            'address' => $request->address,
            'website' => $request->website,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ]);
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
