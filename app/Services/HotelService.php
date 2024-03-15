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

    public function getHotelsPaginated(?string $cursor, ?string $name): array
    {
        $items = $this->prepareQuery($name);
        $items = $items->orderBy('name')
            ->cursorPaginate(25)
            ->appends($cursor);

        $data['hotels'] = $items->items();
        $data['cursor'] = $this->getCursor($items);

        $query = $this->prepareQuery($name);
        $data['total'] = $query->count();

        $data['ids'] = array_map(function (Hotel $hotel) {
            return $hotel->id;
        }, $items->items());

        return $data;
    }

    private function prepareQuery(?string $name): \Illuminate\Database\Eloquent\Builder
    {
        return Hotel::query()
            ->when($name, function ($query, $name) {
                return $query->where('name', 'ilike', '%'.$name.'%');
            });
    }

    private function getCursor(\Illuminate\Contracts\Pagination\CursorPaginator $paginator): string|null
    {
        if (is_null($paginator->nextPageUrl())) {
            return null;
        }

        return str_replace(
            search: [$paginator->path(), "?cursor="],
            replace: ['', ''],
            subject: $paginator->nextPageUrl()
        );
    }
}
