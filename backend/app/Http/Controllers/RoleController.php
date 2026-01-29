<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        return response()->json(Role::with('permissions')->get());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'scope' => 'nullable|string|max:255',
            'permission_ids' => 'array',
            'permission_ids.*' => 'integer',
        ]);

        $role = Role::create([
            'name' => $validated['name'],
            'scope' => $validated['scope'] ?? null,
        ]);

        if (!empty($validated['permission_ids'])) {
            $role->permissions()->sync($validated['permission_ids']);
        }

        return response()->json($role->load('permissions'), 201);
    }

    public function show(Role $role)
    {
        return response()->json($role->load('permissions'));
    }

    public function update(Request $request, Role $role)
    {
        $validated = $request->validate([
            'name' => 'sometimes|string|max:255',
            'scope' => 'nullable|string|max:255',
            'permission_ids' => 'array',
            'permission_ids.*' => 'integer',
        ]);

        $role->update($validated);

        if (array_key_exists('permission_ids', $validated)) {
            $role->permissions()->sync($validated['permission_ids'] ?? []);
        }

        return response()->json($role->load('permissions'));
    }

    public function destroy(Role $role)
    {
        return response()->json([
            'message' => 'Suppression rôle à implémenter.',
        ]);
    }
}
