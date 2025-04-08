<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Hobby;
use App\Models\Nisn;
use App\Models\PhoneNumber;
use App\Models\Siswa;
use App\Models\SiswaHobby;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { 

        $data = Siswa::with(['nisn', 'phoneNumbers', 'hobbies'])->get();
        return response()->json([
            'status' => 200,
            'message' => 'success',
            'data' => $data,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'nisn' => 'required|min:10',
            'phone_number' => 'required|array|min:1', 
            'phone_number.*' => 'distinct|unique:phone_numbers,phone_number', 
            'hobbies' => 'required|array|min:1',
        ]);

        $siswa = Siswa::create([
            'name' => $request->name,
        ]);

        Nisn::create([
            'siswa_id' => $siswa->id,
            'nisn' => $request->nisn,
        ]);

        foreach ($request->phone_number as $phone) {
            PhoneNumber::create([
                'siswa_id' => $siswa->id,
                'phone_number' => $phone,
            ]);
        };
        

        foreach ($request->hobbies as $hobby) {
            SiswaHobby::create([
                'siswa_id' => $siswa->id,
                'hobby_id' => $hobby,
            ]);
        }

        $data = Siswa::with(['nisn', 'phoneNumbers', 'hobbies'])->find($siswa->id);

        return response()->json([
            'status' => 201,
            'message' => 'success',
            'data' => $data,
        ], 201);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $siswa = Siswa::with(['nisn', 'phoneNumbers', 'hobbies'])->find($id);

        return response()->json([
            'status' => 200,
            'message' => 'success',
            'data' => $siswa,
        ],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|min:3',
            'nisn' => 'required|min:10',
            'phone_number' => 'required|array|min:1',
            'phone_number.*' => 'distinct|unique:phone_numbers,phone_number',
            'hobbies' => 'required|array|min:1',
        ]);

        $siswa = Siswa::find($id);
        if (!$siswa) {
            return response()->json([
                'status' => 404,
                'message' => 'Siswa not found',
            ], 404);
        }

        $siswa->update([
            'name' => $request->name,
        ]);

        // Update nisn
        Nisn::where('siswa_id', '=', $id)->update([
            'nisn' => $request->nisn
        ]);

        // Update phone numbers
        PhoneNumber::where('siswa_id', '=', $id)->delete();
        foreach ($request->phone_number as $phone) {
            PhoneNumber::create([
                'siswa_id' => $id,
                'phone_number' => $phone,
            ]);
        }

        // Update hobbies (pivot table)
        SiswaHobby::where('siswa_id', '=', $id)->delete();
        foreach ($request->hobbies as $hobby) {
            SiswaHobby::create([
                'siswa_id' => $id,
                'hobby_id' => $hobby,
            ]);
        }

        return response()->json([
            'status' => 200,
            'message' => 'success',
            'data' => Siswa::with(['nisn', 'phoneNumbers', 'hobbies'])->find($id),
        ]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $siswa = Siswa::find($id)->delete();
        if (!$siswa) {
            return response()->json([
                'status' => 404,
                'message' => 'Siswa not found',
            ], 404);
        }

        return response()->json([
            'status' => 200,
            'message' => 'Siswa deleted successfully',
        ]);
            
    }
}
