<?php

namespace App\Http\Controllers;

use App\Models\ScanTask;
use Illuminate\Http\Request;
use App\Jobs\ExecutePenetrationTest;

class ScanController extends Controller
{
    public function index(Request $request)
    {
        $scans = $request->user()->scanTasks()->orderBy('created_at', 'desc')->get();
        
        return response()->json($scans);
    }

    public function store(Request $request)
    {
        $request->validate([
            'target_url' => 'required|url'
        ]);

        $scanTask = $request->user()->scanTasks()->create([
            'target_url' => $request->target_url,
            'status' => 'pending'
        ]);

        // Kirim tugas ke queue latar belakang
        ExecutePenetrationTest::dispatch($scanTask);

        return response()->json([
            'message' => 'Penetration test task started.',
            'data' => $scanTask
        ], 201);
    }

    public function show(Request $request, $id)
    {
        $scanTask = $request->user()->scanTasks()->findOrFail($id);
        
        return response()->json($scanTask);
    }
}
