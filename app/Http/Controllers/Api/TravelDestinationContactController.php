<?php

namespace App\Http\Controllers\Api;

use App\Data\Models\TravelDestinationContact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TravelDestinationContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
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
            'travel_destination_id' => ['required'],
            'contact_type_id' => ['required'],
            'value' => ['required']
        ]);
        TravelDestinationContact::updateOrCreate([
            'travel_destination_id' => $request->travel_destination_id,
            'contact_type_id' => $request->contact_type_id,
            'value' => $request->value,
        ],[
            'added_by' => $request->user()->id
        ]);
        return \response()->json(['message' => 'Contact added succesfully'],200);
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
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'travel_destination_id' => ['required'],
            'contact_type_id' => ['required'],
            'value' => ['required']
        ]);
        $contact = TravelDestinationContact::findOrFail($id);
        $contact->update([
            'travel_destination_id' => $request->travel_destination_id,
            'contact_type_id' => $request->contact_type_id,
            'value' => $request->value,
        ]);
        return \response()->json(['message' => 'Contact updated succesfully'],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
