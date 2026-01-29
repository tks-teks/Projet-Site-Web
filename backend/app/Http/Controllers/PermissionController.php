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
        $validated = $request->validate([
            'module' => 'required|string|max:255',
            'action' => 'required|string|max:255',
            'resource' => 'nullable|string|max:255',
        ]);

        $permission = Permission::create($validated);

        return response()->json($permission, 201);
    }

    public function show(Permission $permission)
    {
        return response()->json($permission);
    }

    public function update(Request $request, Permission $permission)
    {
        $validated = $request->validate([
            'module' => 'sometimes|string|max:255',
            'action' => 'sometimes|string|max:255',
            'resource' => 'nullable|string|max:255',
        ]);

        $permission->update($validated);

        return response()->json($permission);
    }

    public function destroy(Permission $permission)
    {
        return response()->json([
            'message' => 'Suppression permission à implémenter.',
        ]);
    }
}
