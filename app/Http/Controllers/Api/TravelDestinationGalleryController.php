<?php

namespace App\Http\Controllers\Api;

use App\Data\Models\TravelDestinationGallery;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TravelDestinationGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
           'travel_destination_id' => ['required'],
           'file' => ['file']
        ]);
        $path = '';
        $file_type = '';
        if ($request->hasFile('file')) {
            $file_type = explode('/',$request->file('file')->getClientMimeType())[0];
            $path = $request->file('file')->store('images/destination/gallery/', [
                'disk' => 'public'
            ]);
        }
        TravelDestinationGallery::create([
            'travel_destination_id' => $request->travel_destination_id,
            'file_type' => $file_type,
            'file_path' => $path,
            'added_by' => 1
        ]);
        response()->json(['message' => 'Image added successfully!'],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destination = TravelDestinationGallery::findOrFail($id);
        $destination->delete();
        return response()->json(['message' => 'deleted'],200);
    }
}
