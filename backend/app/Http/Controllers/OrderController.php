<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return response()->json(Order::with(['payments', 'shipments'])->paginate(20));
    }

    public function store(Request $request)
    {
        return response()->json([
            'message' => 'Création commande à implémenter.',
        ], 201);
    }

    public function show(Order $order)
    {
        return response()->json($order->load(['payments', 'shipments']));
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
