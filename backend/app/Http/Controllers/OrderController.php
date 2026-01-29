<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return response()->json(Order::with(['payments', 'shipments', 'items'])->paginate(20));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'nullable|integer',
            'status' => 'nullable|string',
            'total_amount' => 'required|numeric',
            'currency' => 'nullable|string|max:10',
            'channel' => 'nullable|string|max:50',
            'items' => 'required|array|min:1',
            'items.*.product_id' => 'required|integer',
            'items.*.variant_id' => 'nullable|integer',
            'items.*.quantity' => 'required|integer|min:1',
            'items.*.unit_price' => 'required|numeric',
            'items.*.total_price' => 'required|numeric',
        ]);

        $order = Order::create([
            'user_id' => $validated['user_id'] ?? null,
            'status' => $validated['status'] ?? 'pending',
            'total_amount' => $validated['total_amount'],
            'currency' => $validated['currency'] ?? 'XOF',
            'channel' => $validated['channel'] ?? 'web',
        ]);

        $order->items()->createMany($validated['items']);

        return response()->json($order->load(['items', 'payments', 'shipments']), 201);
    }

    public function show(Order $order)
    {
        return response()->json($order->load(['payments', 'shipments', 'items']));
    }

    public function update(Request $request, Order $order)
    {
        return response()->json([
            'message' => 'Mise à jour commande à implémenter.',
        ]);
    }

    public function destroy(Order $order)
    {
        return response()->json([
            'message' => 'Annulation / suppression commande à implémenter.',
        ]);
    }
}
