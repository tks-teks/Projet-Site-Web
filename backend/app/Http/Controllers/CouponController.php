<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index()
    {
        return response()->json(Coupon::with('usages')->paginate(20));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required|string|max:255|unique:coupons,code',
            'type' => 'required|in:fixed,percentage',
            'value' => 'required|numeric',
            'min_amount' => 'nullable|numeric',
            'usage_limit' => 'nullable|integer',
            'starts_at' => 'nullable|date',
            'ends_at' => 'nullable|date',
            'is_active' => 'boolean',
        ]);

        $coupon = Coupon::create($validated);

        return response()->json($coupon, 201);
    }

    public function show(Coupon $coupon)
    {
        return response()->json($coupon->load('usages'));
    }

    public function update(Request $request, Coupon $coupon)
    {
        $validated = $request->validate([
            'code' => 'sometimes|string|max:255|unique:coupons,code,' . $coupon->id,
            'type' => 'sometimes|in:fixed,percentage',
            'value' => 'sometimes|numeric',
            'min_amount' => 'nullable|numeric',
            'usage_limit' => 'nullable|integer',
            'starts_at' => 'nullable|date',
            'ends_at' => 'nullable|date',
            'is_active' => 'boolean',
        ]);

        $coupon->update($validated);

        return response()->json($coupon->refresh());
    }

    public function destroy(Coupon $coupon)
    {
        $coupon->delete();

        return response()->json(['message' => 'Coupon supprimé.']);
    }
}
