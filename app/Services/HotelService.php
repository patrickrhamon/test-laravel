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

    public function getHotelsPaginated(?string $cursor, ?string $name)
    {
//        dd($cursor);
        $items = Hotel::query()
            ->when($name, function ($query, $name) {
                return $query->where('name', 'ilike', '%'.$name.'%');
            })
            ->orderBy('name')
            ->cursorPaginate(25)
            ->appends($cursor);
        $data['hotels'] = $items->items();
        $data['cursor'] = $items->nextPageUrl();
        $data['total'] = Hotel::get()->count();
        $data['ids'] = array_map(function (Hotel $hotel) {
            return $hotel->id;
        }, $items->items());
        dd($data);
        return $hotels;
    }
}
