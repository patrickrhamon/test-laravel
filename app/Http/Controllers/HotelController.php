<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Services\HotelService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $service = new HotelService();
        $data = $service->getHotelsPaginated($request->get('cursor'), $request->get('name'));

        return view('hotel/index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('hotel/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Hotel::create([
            'name' => $request->name,
            'address' => $request->address,
            'city' => $request->city,
            'state' => $request->state,
            'zip_code' => $request->zip_code,
            'website' => $request->website,
        ]);

        return redirect()->route('hotel.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Hotel $hotel)
    {
        $data['hotel'] = $hotel;

        return view('hotel/show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hotel $hotel)
    {
        $data['hotel'] = $hotel;

        return view('hotel/edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Hotel $hotel)
    {
        $hotel->update([
            'name' => $request->name,
            'address' => $request->address,
            'city' => $request->city,
            'state' => $request->state,
            'zip_code' => $request->zip_code,
            'website' => $request->website,
        ]);

        return redirect()->route('hotel.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hotel $hotel)
    {
        $hotel->delete();

        return redirect()->route('hotel.index');
    }
}
