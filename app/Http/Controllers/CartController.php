<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\{lib_cart_items};
use File;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index(Request $request) {
        $lib_cart_items =  DB::table('lib_cart_items')
        ->whereNull('lib_cart_items.deleted_at')->get();

        // dd($lib_cart_items);

        $chunks_lib_cart_items = collect($lib_cart_items)->chunk(100);
        foreach($chunks_lib_cart_items as $chunk_lib_cart_items){
        return $chunk_lib_cart_items;
    }
        
    }

    public function store(Request $request)
    {
        // dd($request);
        $selectedItemName = $request->input('selectedItemName');
        $selectedItemPrice = $request->input('selectedItemPrice');
        $selectedItemQuantity = $request->input('selectedItemQuantity');
        $customerData = $request->input('customerData'); // Retrieve the customerData from the JSON
         // Fetch the customer token
        $customerToken = $customerData['token'];
        // dd($customerToken);
        $cartItem = lib_cart_items::create([
            'item_name' => $selectedItemName,
            'item_amount' => $selectedItemPrice,
            'item_quantity' => $selectedItemQuantity,
            'user_ref' => $customerToken, // Store user_ref in the cart item
        ]);

        return response()->json([
            'message' => 'Cart item created successfully',
            'data' => $cartItem,
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
        $lib_cart_items = lib_cart_items::select(['lib_cart_items.*'])
        ->where(function($query) use ($searchWord){
            $query->where('cart_item_name', 'ILIKE', "%$searchWord%");
        })->get();

        return response()->json([
            'data' => $lib_cart_items
        ], 200);
    }
}
