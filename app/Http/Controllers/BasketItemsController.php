<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\{lib_basket_items,FileUpload};
use File;
use Illuminate\Support\Facades\Auth;

class BasketItemsController extends Controller
{
    // public function __construct() {
    //     $this->middleware('auth:api');
    // }
    
    public function index(Request $request) {
        // dd(Auth::user());
        $user_id = 1;

        if($user_id = 1){
        $lib_basket_items =  DB::table('lib_basket_items')
                            ->leftjoin('file_uploads', 'file_uploads.reference_id', '=', 'lib_basket_items.id')
                            ->orderByRaw('lib_basket_items.updated_at DESC NULLS LAST')
                            ->orderByRaw('lib_basket_items.created_at DESC NULLS LAST') 
                            ->whereNull('lib_basket_items.deleted_at')
                            ->get([
                                'lib_basket_items.id',
                                'lib_basket_items.basket_item_name', 
                                'lib_basket_items.category',  
                                'lib_basket_items.sku',   
                                'lib_basket_items.item_amount',       
                                'lib_basket_items.created_at',    
                                'file_uploads.reference_id',   
                                'file_uploads.name',  
                                'file_uploads.path', 
                            ]);
        }else{
            $lib_basket_items =  DB::table('lib_basket_items')
            ->leftjoin('file_uploads', 'file_uploads.reference_id', '=', 'lib_basket_items.id')
            ->orderByRaw('lib_basket_items.updated_at DESC NULLS LAST')
            ->orderByRaw('lib_basket_items.created_at DESC NULLS LAST') 
            ->whereNull('lib_basket_items.deleted_at')
            ->where('lib_basket_items.user_id' ,'=',$user_id)
            ->get([
                'lib_basket_items.id',
                'lib_basket_items.basket_item_name', 
                'lib_basket_items.category',    
                'lib_basket_items.created_at',    
                'file_uploads.reference_id',   
                'file_uploads.name',  
                'file_uploads.path', 
            ]);             
        }
              	
        $chunks_lib_basket_items = collect($lib_basket_items)->chunk(100);
        foreach($chunks_lib_basket_items as $chunk_lib_basket_item){
            return $chunk_lib_basket_item;
        }
        
    }

    public function userDashboardItems(Request $request) {
     
        $lib_basket_items =  DB::table('lib_basket_items')
                            ->leftjoin('file_uploads', 'file_uploads.reference_id', '=', 'lib_basket_items.id')
                            ->orderByRaw('lib_basket_items.updated_at DESC NULLS LAST')
                            ->orderByRaw('lib_basket_items.created_at DESC NULLS LAST') 
                            ->whereNull('lib_basket_items.deleted_at')
                            ->get([
                                'lib_basket_items.id',
                                'lib_basket_items.basket_item_name', 
                                'lib_basket_items.category',  
                                'lib_basket_items.sku',   
                                'lib_basket_items.item_amount',       
                                'lib_basket_items.created_at',    
                                'file_uploads.reference_id',   
                                'file_uploads.name',  
                                'file_uploads.path', 
                            ]);
        $chunks_lib_basket_items = collect($lib_basket_items)->chunk(100);
        foreach($chunks_lib_basket_items as $chunk_lib_basket_item){
            return $chunk_lib_basket_item;
        }
        
    }

    public function store(Request $request)
    {
       
        $lib_basket_items = new lib_basket_items();
        columnSetter($lib_basket_items, $request);
        $lib_basket_items->item_code = GenerateBasketItemCode();
        $lib_basket_items->sku = GenerateBasketItemCode();
        $lib_basket_items->save();

        $path = public_path('upload/basket_items');
        if(!File::isDirectory($path)){
            File::makeDirectory($path, 0777, true, true);
        }   
        $fileUpload = new FileUpload;
        if($request->file) {
            $file_name = time().'_'.$request->file->getClientOriginalName();
            $file_path =$request->file('file')->storeAs('upload/basket_items', $file_name, 'public');
            $fileUpload->name = time().'_'.$request->file->getClientOriginalName();
            $fileUpload->path =  $file_path;
            $fileUpload->reference_id = $lib_basket_items->id;
            $request->file->move($path,$file_name);
            $fileUpload->save();
        }
        return response()->json([
            'data' => $lib_basket_items
        ], 200);
        
    }

    public function update(Request $req, $id)
    {
        $lib_basket_items = lib_basket_items::find($id);
        $lib_basket_items->update($req->all());

        $path = public_path('upload/basket_items');
        if(!File::isDirectory($path)){
            File::makeDirectory($path, 0777, true, true);
        }   
        $fileUpload = FileUpload::where('reference_id',$id)->first();
     
        if($fileUpload == null) {
            $fileUpload = new FileUpload;
        }
        if($req->file) {
            $file_name = time().'_'.$req->file->getClientOriginalName();
            $file_path =$req->file('file')->storeAs('upload/basket_items', $file_name, 'public');
            $fileUpload->name = time().'_'.$req->file->getClientOriginalName();
            $fileUpload->path =  $file_path;
            $fileUpload->reference_id = $lib_basket_items->id;
            $req->file->move($path,$file_name);
            $fileUpload->save();
        }
        
        return response()->json([
            'data' => $lib_basket_items
        ], 200);
    }

    public function destroy($id)
    {
        $lib_basket_items = lib_basket_items::find($id);
        $lib_basket_items->delete();
        $fileUpload = FileUpload::where('reference_id',$id)->first();
        $fileUpload->delete();
        return $lib_basket_items;
    }

    public function search(Request $request){
        $searchWord = $request->get('s');
        $lib_basket_items = lib_basket_items::select(['lib_basket_items.*'])
        ->where(function($query) use ($searchWord){
            $query->where('basket_item_name', 'ILIKE', "%$searchWord%");
        })->get();

        return response()->json([
            'data' => $lib_basket_items
        ], 200);
    }
}
