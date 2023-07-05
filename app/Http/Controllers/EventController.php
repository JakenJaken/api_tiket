<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    //
    public function index()
    {
        $event = Event::all();
        return response()->json($event);
    }

    public function store(Request $request)
    {  
        $event = Event::create([
            'nama_event' => $request->nama_event,
            'penyelenggara' => $request->penyelenggara,
            'tanggal' => $request->tanggal,
            'lokasi' => $request->lokasi,
            'deskripsi' => $request->deskripsi,
        ]);

        return response()->json($event, 201);
    }

    public function show($id)
    {
        $event = Event::findOrFail($id);
        return response()->json($event);
    }

    public function update(Request $request, $id)
    {
        try {
            $event = Event::findOrFail($id);
            $event->update([
                'nama_event' => $request->nama_event,
                'penyelenggara' => $request->penyelenggara,
                'tanggal' => $request->tanggal,
                'lokasi' => $request->lokasi,
                'deskripsi' => $request->deskripsi,
            ]);
            return response()->json($event);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to update event'], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $event = Event::findOrFail($id);
            $event->delete();
            return response()->json(['message' => 'Event deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to delete event'], 500);
        }
    }
}
