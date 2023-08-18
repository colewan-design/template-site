<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\lib_baskets;

class displayBasketController extends Controller
{
    public function index(Request $request)
    {
        $currentDate = Carbon::now();

        $items = lib_baskets::where('from', '<=', $currentDate)
            ->where('to', '>=', $currentDate)
            ->get()
            ->map(function ($item) use ($currentDate) {
                $toDate = Carbon::parse($item->to);
                $daysLeft = $currentDate->diffInDays($toDate);
                $item->daysLeft = $daysLeft;
                return $item;
            });

        return response()->json($items);
    }
}

