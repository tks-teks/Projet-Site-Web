<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        return response()->json([
            'message' => 'Authentification à implémenter avec Sanctum ou Passport.',
        ]);
    }

    public function logout(Request $request)
    {
        return response()->json([
            'message' => 'Déconnexion à implémenter (révocation du token).',
        ]);
    }
}
