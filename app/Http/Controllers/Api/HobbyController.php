<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Hobby;
use Illuminate\Http\Request;

class HobbyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hobby = Hobby::all();

        return response()->json([
            'status' => 200,
            'message' => 'success',
            'data' => $hobby,

        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $hobby = Hobby::create([
            'name' => $request->name,
        ]);

        return response()->json([
            'status' => 200,
            'message' => 'success',
            'data' => [
                'id' => $hobby->id,
                'name' => $hobby->name,
                'created_at' => $hobby->created_at,
                'updated_at' => $hobby->updated_at,
            ],
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
