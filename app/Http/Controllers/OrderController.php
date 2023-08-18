<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\{lib_cart_orders};
use File;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(Request $request) {
        $lib_cart_orders =  DB::table('lib_cart_orders')
        ->whereNull('lib_cart_orders.deleted_at')->get();

        // dd($lib_cart_orders);

        $chunks_lib_cart_orders = collect($lib_cart_orders)->chunk(100);
        foreach($chunks_lib_cart_orders as $chunk_lib_cart_orders){
        return $chunk_lib_cart_orders;
}
        
    }

    public function store(Request $request)
    {
        $orderedItems = $request->input('items');
        $insertedItems = [];
        
        foreach ($orderedItems as $item) {
            $cartItem = lib_cart_orders::create([
                'item_name' => $item['item_name'],
                'item_quantity' => $item['item_quantity'],
                'item_amount' => $item['item_amount'],
                // Other fields you want to set
            ]);
    
            $insertedItems[] = $cartItem;
        }
    
        return response()->json([
            'message' => 'Ordered items created successfully',
            'data' => $insertedItems,
        ], 201);
    }

    public function update(Request $req, $id)
    {
      
    }

    public function destroy($id)
    {
       
    }

    public function search(Request $request){
        $searchWord = $request->get('s');
        $lib_cart_orders = lib_cart_orders::select(['lib_cart_orders.*'])
        ->where(function($query) use ($searchWord){
            $query->where('cart_item_name', 'ILIKE', "%$searchWord%");
        })->get();

        return response()->json([
            'data' => $lib_cart_orders
        ], 200);
    }
}
