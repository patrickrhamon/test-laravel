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

    public function getHotelsPaginated(?string $cursor)
    {
//        dd($cursor);
        $items = Hotel::orderBy('name')->cursorPaginate(5)->withQueryString($cursor);
        $data['hotels'] = $items->items();
        $data['cursor'] = $items->nextPageUrl();
        $data['total'] = Hotel::get()->count();
        dd($data);
        return $hotels;
    }
}
