<?php

namespace App\Http\Controllers;

use App\Models\Tiket;
use Illuminate\Http\Request;

class TiketController extends Controller
{
    //
    public function index()
    {
        $tiket = Tiket::all();
        return response()->json($tiket);
    }

    public function store(Request $request)
    {
        try {
            $tiket = Tiket::create([
                'id_user' => $request->id_user,
                'id_event' => $request->id_event,
                'harga' => $request->harga,
            ]);

            return response()->json($tiket, 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to insert tiket'], 500);
        }
    }

    public function show($id)
    {
        $tiket = Tiket::findOrFail($id);
        return response()->json($tiket);
    }

    public function update(Request $request, $id)
    {
        try {
            $tiket = Tiket::findOrFail($id);
            $tiket->update([
                'id_user' => $request->id_user,
                'id_event' => $request->id_event,
                'harga' => $request->harga,
            ]);
            return response()->json($tiket);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to update tiket'], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $tiket = Tiket::findOrFail($id);
            $tiket->delete();
            return response()->json(['message' => 'Tiket deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to delete tiket'], 500);
        }
    }
}
