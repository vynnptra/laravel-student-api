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
        $hobby = Hobby::where('id', $id)->get();
        if (!$hobby) {
            return response()->json([
                'status' => 404,
                'message' => 'not found',
                ], 404);
        }
        
        return response()->json([
            'status' => 200,
            'message' => 'success',
            'data' => $hobby,
        ],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate([
            'name' => 'required|min:3',
        ]);

        $hobby = Hobby::find( $id);
        if (!$hobby) {
            return response()->json([
                'status' => 404,
                'message' => 'not found',
            ], 404);
        }

        $hobby->update([
            'name' => $request->name,
        ]);

        return response()->json([
            'status' => 200,
            'message' => 'success',
            'data' => $hobby,
            ],200);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $hobby = Hobby::find($id);

        if (!$hobby) {
            return response()->json([
                'status' => 404,
                'message' => 'not found',
            ], 404);
        }

        $hobby->delete();

        return response()->json([
            'status' => 200,
            'message' => 'success',
        ],200);


    }
}
