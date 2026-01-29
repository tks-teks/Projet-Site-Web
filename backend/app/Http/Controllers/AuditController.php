<?php

namespace App\Http\Controllers;

use App\Models\AuditLog;

class AuditController extends Controller
{
    public function index()
    {
        return response()->json(AuditLog::latest()->paginate(50));
    }
}
