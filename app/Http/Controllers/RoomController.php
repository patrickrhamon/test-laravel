<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Hotel $hotel)
    {
        $data['hotel'] = $hotel;
        $data['rooms'] = $hotel->rooms;

        return view('hotel/room/index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Hotel $hotel)
    {
        $data['hotel'] = $hotel;

        return view('hotel/room/create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Hotel $hotel)
    {
        Room::create([
            'name' => $request->name,
            'description' => $request->description,
            'hotel_id' => $hotel->id,
        ]);

        return redirect()->route('room.index', [$hotel->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Hotel $hotel, Room $room)
    {
        if ($hotel->id !== $room->hotel_id) {
            dd('nao é igual');
        }

        $data['hotel'] = $hotel;
        $data['room'] = $room;

        return view('hotel/room/show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hotel $hotel, Room $room)
    {
        if ($hotel->id !== $room->hotel_id) {
            dd('nao é igual');
        }

        $data['hotel'] = $hotel;
        $data['room'] = $room;

        return view('hotel/room/edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Hotel $hotel, Room $room)
    {
        if ($hotel->id !== $room->hotel_id) {
            dd('nao é igual');
        }

        $room->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('room.index', [$hotel->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hotel $hotel, Room $room)
    {
        if ($hotel->id !== $room->hotel_id) {
            dd('nao é igual');
        }

        $room->delete();

        return redirect()->route('room.index', [$hotel->id]);
    }
}
