<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index()
    {
        return response()->json(Permission::all());
    }

    public function store(Request $request)
    {
        return response()->json([
            'message' => 'Création permission à implémenter.',
        ], 201);
    }

    public function show(Permission $permission)
    {
        return response()->json($permission);
    }

    public function update(Request $request, Permission $permission)
    {
        return response()->json([
            'message' => 'Mise à jour permission à implémenter.',
        ]);
    }

    public function destroy(Permission $permission)
    {
        return response()->json([
            'message' => 'Suppression permission à implémenter.',
        ]);
    }
}
