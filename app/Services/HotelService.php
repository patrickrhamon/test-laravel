<?php

declare(strict_types=1);


namespace App\Services;

use App\Models\Hotel;
use Illuminate\Support\Facades\DB;

class HotelService
{
    private $model;
    public function __construct()
    {
        $this->model = DB::table('hotels');
    }

    public function getHotelsPaginated()
    {
        $hotels = Hotel::orderBy('name')->cursorPaginate(5);
        return $hotels;
    }
}