<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function me(Request $request)
    {
        return response()->json([
            'user' => $request->user(),
            'roles' => $request->user()?->roles,
        ]);
    }

    public function index()
    {
        return response()->json(User::with('roles')->paginate(20));
    }

    public function store(Request $request)
    {
        return response()->json([
            'message' => 'Création utilisateur à implémenter (validation + hash).',
        ], 201);
    }

    public function show(User $user)
    {
        return response()->json($user->load('roles'));
    }

    public function update(Request $request, User $user)
    {
        return response()->json([
            'message' => 'Mise à jour utilisateur à implémenter.',
        ]);
    }

    public function destroy(User $user)
    {
        return response()->json([
            'message' => 'Désactivation / suppression à implémenter.',
        ]);
    }
}
