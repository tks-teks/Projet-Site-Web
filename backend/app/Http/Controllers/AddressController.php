<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function index()
    {
        return response()->json(Address::paginate(20));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|integer',
            'label' => 'nullable|string|max:255',
            'address_line' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'postal_code' => 'nullable|string|max:50',
            'country' => 'required|string|max:100',
            'phone' => 'nullable|string|max:50',
            'is_default' => 'boolean',
        ]);

        $address = Address::create($validated);

        return response()->json($address, 201);
    }

    public function show(Address $address)
    {
        return response()->json($address);
    }

    public function update(Request $request, Address $address)
    {
        $validated = $request->validate([
            'label' => 'nullable|string|max:255',
            'address_line' => 'sometimes|string|max:255',
            'city' => 'sometimes|string|max:255',
            'postal_code' => 'nullable|string|max:50',
            'country' => 'sometimes|string|max:100',
            'phone' => 'nullable|string|max:50',
            'is_default' => 'boolean',
        ]);

        $address->update($validated);

        return response()->json($address->refresh());
    }

    public function destroy(Address $address)
    {
        $address->delete();

        return response()->json(['message' => 'Adresse supprimée.']);
    }
}
