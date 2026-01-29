<?php

namespace App\Http\Controllers;

class ReportController extends Controller
{
    public function overview()
    {
        return response()->json([
            'message' => 'Reporting avancé à implémenter (KPIs, exports).',
        ]);
    }
}
