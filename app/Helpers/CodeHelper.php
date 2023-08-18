<?php
use Illuminate\Support\Facades\Schema as FacadesSchema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Models\{lib_baskets,lib_additionals,lib_basket_items};

function GenerateBasketCode()
{

    $date = Carbon::today()->format('Y-m-d');
    $count = lib_baskets::whereDate('created_at', '=', $date)->count();
    $date_created = Carbon::now();
    $counted = substr(str_repeat(0, 4).($count + 1), - 4);
    return
        'B'.
        $counted.
        $date_created->format('m').
        $date_created->format('d').
        $date_created->format('Y');
}

function GenerateBasketItemCode()
{

    $date = Carbon::today()->format('Y-m-d');
    $count = lib_basket_items::whereDate('created_at', '=', $date)->count();
    $date_created = Carbon::now();
    $counted = substr(str_repeat(0, 4).($count + 1), - 4);
    return
        'I'.
        $counted.
        $date_created->format('m').
        $date_created->format('d').
        $date_created->format('Y');
}

function GenerateAdditionalCode()
{

    $date = Carbon::today()->format('Y-m-d');
    $count = lib_additionals::whereDate('created_at', '=', $date)->count();
    $date_created = Carbon::now();
    $counted = substr(str_repeat(0, 4).($count + 1), - 4);
    return
        'A'.
        $counted.
        $date_created->format('m').
        $date_created->format('d').
        $date_created->format('Y');
}



?>