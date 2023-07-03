<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    //
    public function show($id)
    {
        $addresses = Address::where('user_id', $id)->get();

        if ($addresses->isEmpty()) {
            return response([
                'message' => 'No addresses found for the user.'
            ], 404);
        }

        return response([
            'addresses' => $addresses,
        ], 200);
    }

    public function store(Request $request){
        $address = new Address();
        $attrs = $request;
        $address->addressType = $attrs->input('addressType');
        $address->contact_person_number = $attrs->input('contact_person_number');
        $address->contact_person_name = $attrs->input('contact_person_name');
        $address->address = $attrs->input('address');
        $address->latitude = $attrs->input('latitude');
        $address->longitude = $attrs->input('longitude');
        $address->user_id = $attrs->input('user_id');

        $address->save();

        return response()->json([
            'message' => 'Address created successfully',
            'address' => $address
        ]);

    }
    public function destroy($id){
        $address = Address::find($id);

        if(!$address){
            return response([
                'message' => 'Address not found.'
            ], 404);
        }

        $address->delete();

        return response([
            'message' => 'Address deleted.',
        ], 200);
    }

    public function update(Request $request, $id)
    {

        $address = Address::find($id);

        if (!$address) {
            return response([
                'message' => 'Address not found.'
            ], 404);
        }

        $address->update([
            'addressType' => $request['addressType'] ?? $address->addressType,
            'contact_person_number' => $request['contact_person_number'] ?? $address->contact_person_number,
            'contact_person_name' => $request['contact_person_name'] ?? $address->contact_person_name,
            'address' => $request['address'] ?? $address->address,
            'latitude' => $request['latitude'] ?? $address->latitude,
            'longitude' => $request['longitude'] ?? $address->longitude,
        ]);

        return response([
            'address' => $address,
            'message' => 'Address updated.',
        ], 200);
    }

}
