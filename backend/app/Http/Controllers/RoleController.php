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
        return response()->json([
            'message' => 'Création rôle à implémenter.',
        ], 201);
    }

    public function show(Role $role)
    {
        return response()->json($role->load('permissions'));
    }

    public function update(Request $request, Role $role)
    {
        return response()->json([
            'message' => 'Mise à jour rôle à implémenter.',
        ]);
    }

    public function destroy(Role $role)
    {
        return response()->json([
            'message' => 'Suppression rôle à implémenter.',
        ]);
    }
}
